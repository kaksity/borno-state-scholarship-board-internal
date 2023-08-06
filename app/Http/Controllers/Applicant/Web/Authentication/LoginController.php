<?php

namespace App\Http\Controllers\Applicant\Web\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\Web\Authentication\LoginRequest;
use App\Services\Interfaces\ApplicantServiceInterface;

class LoginController extends Controller
{
    public function __construct(
        private ApplicantServiceInterface $applicantServiceInterface
    )
    {}

    public function create()
    {
        return view('web.applicant.authentication.login');
    }

    public function store(LoginRequest $request)
    {
        
        if (
            !auth('applicant')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ], $request->remember_me)
        ) {
            return back()->with('status', 'Invalid login credentials');
        }

        return redirect()->route('show-applicant-bio-data-form');
    }
}
