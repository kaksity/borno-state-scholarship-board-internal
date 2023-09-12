<?php

namespace App\Http\Controllers\Applicant\Web\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\Web\Authentication\RegistrationRequest;
use App\Mail\AccountVerificationMail;
use App\Models\ApplicantVerification;
use App\Services\Interfaces\ApplicantServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function __construct(
        private ApplicantServiceInterface $applicantServiceInterface,
    )
    {}

    public function index()
    {
        return view('web.applicant.authentication.registration');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistrationRequest $request)
    {
        $applicant = $this->applicantServiceInterface->getApplicantByEmailAddress(
            $request->email
        );

        if (!is_null($applicant)) {
            return back()->with('status', 'Applicant record already exists');
        }

        $createApplicantOptions = $request->safe()->merge([
            'year' => Carbon::now()->year,
            'password' => Hash::make($request->password),
            'status' => 'Applying'
        ])->all();

        $this->applicantServiceInterface->createApplicantRecord(
            $createApplicantOptions
        );

        auth('applicant')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        $loggedInApplicant = auth('applicant')->user();

        $token = Str::random(200);

        ApplicantVerification::create([
            'applicant_id' => $loggedInApplicant->id,
            'expires_at' => Carbon::now()->addMinutes(30),
            'token' => $token
        ]);

        Mail::to($loggedInApplicant)->later(now()->addSeconds(5), new AccountVerificationMail([
            'surname' => $loggedInApplicant->surname,
            'other_names' => $loggedInApplicant->other_names,
            'token' => $token
        ]));

        return redirect()->route('applicant.applicant-bio-data.index');
    }
}
