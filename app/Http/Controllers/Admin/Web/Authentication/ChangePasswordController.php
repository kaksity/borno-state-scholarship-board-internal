<?php

namespace App\Http\Controllers\Admin\Web\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Web\Authentication\ChangePasswordRequest;
use App\Services\Interfaces\AdminServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function __construct(
        private AdminServiceInterface $adminServiceInterface
    )
    {}

    public function index()
    {
        return view('web.admin.authentications.change-password');
    }

    public function store(ChangePasswordRequest $request)
    {
        $loggedInAdmin = auth('admin')->user();
        
        if (!Hash::check($request->old_password, $loggedInAdmin->password)) {
            return back()->with('error', 'Old password is not correct');
        }

        $this->adminServiceInterface->updateAdminRecord([
            'password' => Hash::make($request->new_password)
        ], $loggedInAdmin->id);

        return back()->with('success', 'Password was changed successfully');
    }
}
