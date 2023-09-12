<?php

namespace App\Http\Controllers\Applicant\Web;

use App\Http\Controllers\Controller;
use App\Mail\AccountVerificationMail;
use App\Models\Applicant;
use App\Models\ApplicantVerification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ApplicantVerificationController extends Controller
{
    public function __construct(
    )
    {}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loggedInApplicant = auth('applicant')->user();
        Session::flash(
            'pending',
            "Your account is yet to be verified. Check your email({$loggedInApplicant->email}) for the verification link or click on the Resend Verification Mail to get a fresh email"
        );
        return view('web.applicant.applicant-verification');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $loggedInApplicant = auth('applicant')->user();
        
        ApplicantVerification::where([
            'applicant_id' => $loggedInApplicant->id,
            'purpose' => 'account-verification'
        ])->delete();
        
        $token = Str::random(200);

        ApplicantVerification::create([
            'applicant_id' => $loggedInApplicant->id,
            'purpose' => 'account-verification',
            'expires_at' => Carbon::now()->addMinutes(30),
            'token' => $token
        ]);

        Mail::to($loggedInApplicant)->later(now()->addSeconds(5), new AccountVerificationMail([
            'surname' => $loggedInApplicant->surname,
            'other_names' => $loggedInApplicant->other_names,
            'token' => $token
        ]));

        return back()->with(
            'success',
            "An email containing your verification link was just sent to your mail({$loggedInApplicant->email}). Click on the link to verify your account(Check your spam if you did not see the mail)"
        );
    }

    public function show($id)
    {
        $loggedInApplicant = auth('applicant')->user();

        $applicantVerification = ApplicantVerification::where([
            'token' => $id,
            'purpose' => 'account-verification',
            'applicant_id' => $loggedInApplicant->id
        ])->first();

        if (is_null($applicantVerification)) {
            return redirect()->route('applicant.applicant-verification.index')->with(
                'pending',
                "Your account is yet to be verified. Check your email({$loggedInApplicant->email}) for the verification link(Check your spam if you did not see the mail) or click on the Resend Verification Mail to get a fresh email."
            );
        }

        if ($applicantVerification->expires_at < Carbon::now()) {
            return redirect()->route('applicant.applicant-verification.index')->with(
                'pending',
                "Your Verification has expired. Click on the Resend Verification Mail to get a fresh email and then check your email({$loggedInApplicant->email}) for the verification link(Check your spam if you did not see the mail)"
            );
        }
        ApplicantVerification::where([
            'applicant_id' => $loggedInApplicant->id,
            'token' => $id,
        ])->delete();

        Applicant::where([
            'id' => $loggedInApplicant->id,
        ])->update([
            'verified_at' => Carbon::now()
        ]);

        return redirect()->route('applicant.applicant-bio-data.index');
    }
}