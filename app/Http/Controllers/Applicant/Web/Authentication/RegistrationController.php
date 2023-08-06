<?php

namespace App\Http\Controllers\Applicant\Web\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\Web\Authentication\RegistrationRequest;
use App\Services\Interfaces\ApplicantServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function __construct(
        private ApplicantServiceInterface $applicantServiceInterface,
    )
    {}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        return redirect()->route('show-applicant-bio-data-form');
    }
}
