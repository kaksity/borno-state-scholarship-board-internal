<?php

namespace App\Http\Controllers\Admin\Web\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store()
    {
        auth('admin')->logout();

        return redirect()->route('admin.login.index');
    }
}
