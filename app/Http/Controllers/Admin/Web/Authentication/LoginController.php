<?php

namespace App\Http\Controllers\Admin\Web\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Web\Authentication\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('web.admin.authentications.login');
    }

    public function store(LoginRequest $request)
    {
        if (
            !auth('admin')->attempt([
                'email' => $request->email_address,
                'password' => $request->password
            ], $request->remember_me)
        ) {
            return back()->with('status', 'Invalid login credentials');
        }

        return redirect()->route('admin.dashboard.index');
    }
}
