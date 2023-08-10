<?php

namespace App\Http\Controllers\Applicant\Web\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\Web\Authentication\RequestResetPasswordRequest;
use App\Services\Interfaces\ApplicantServiceInterface;

class ResetPasswordController extends Controller
{
    public function __construct(
        private ApplicantServiceInterface $applicantServiceInterface
    )
    {}

    public function index()
    {
        return view('web.applicant.authentication.request-reset-password');
    }

    public function store(RequestResetPasswordRequest $request)
    {
        
        $applicant = $this->applicantServiceInterface->getApplicantByEmailAddress(
            $request->email
        );

        if (is_null($applicant)) {
            return back()->with('error', 'Applicant record does not exist');
        }

        return back()->with(
            'success',
            'An email containing password reset instructions has been sent to the applicant'
        );
    }
}
