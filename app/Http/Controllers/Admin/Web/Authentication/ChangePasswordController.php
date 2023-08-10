<?php

namespace App\Http\Controllers\Admin\Web\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Web\Authentication\ChangePasswordRequest as AuthenticationChangePasswordRequest;
use App\Http\Requests\Web\Authentication\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('web.admin.authentications.change-password');
    }

    public function store(AuthenticationChangePasswordRequest $request)
    {
        $loggedInAdmin = auth('admin')->user();
        
        if (!Hash::check($request->old_password, $loggedInAdmin->password)) {
            return back()->with('error', 'Old password is not correct');
        }

        $loggedInAdmin->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with('success', 'Password was changed successfully');
    }
}
