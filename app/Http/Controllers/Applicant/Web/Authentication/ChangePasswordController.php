<?php

namespace App\Http\Controllers\Applicant\Web\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\Web\Authentication\ChangePasswordRequest;
use App\Services\Interfaces\ApplicantServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function __construct(
        private ApplicantServiceInterface $applicantServiceInterface,
    )
    {}

    public function index()
    {
        return view('web.applicant.change-password-data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChangePasswordRequest $request)
    {
        $loggedInApplicant = auth('applicant')->user();

        if (!Hash::check($request->old_password, $loggedInApplicant->password)) {
            return back()->with('error', 'Old Password was not correct');
        }

        $this->applicantServiceInterface->updateApplicantRecord([
            'password' => Hash::make($request->new_password)
        ], $loggedInApplicant->id);

        return back()->with('success', 'Password was changed successfully');
    }
}
