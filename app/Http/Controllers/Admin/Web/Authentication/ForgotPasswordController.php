<?php

namespace App\Http\Controllers\Admin\Web\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('web.admin.authentications.forgot-password');
    }
}
