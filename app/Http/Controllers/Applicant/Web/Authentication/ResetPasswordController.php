<?php

namespace App\Http\Controllers\Applicant\Web\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\Web\Authentication\RequestResetPasswordRequest;
use App\Mail\SendResetPasswordMail;
use App\Services\Interfaces\ApplicantServiceInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

        $password = Str::random(8);

        $this->applicantServiceInterface->updateApplicantRecord([
            'password' => Hash::make($password)
        ], $applicant->id);

        Mail::to($applicant)->later(now()->addSeconds(5), new SendResetPasswordMail([
            'surname' => $applicant->surname,
            'other_names' => $applicant->other_names,
            'password' => $password
        ]));

        return back()->with(
            'success',
            'An email containing password reset instructions has been sent to the applicant'
        );
    }
}
