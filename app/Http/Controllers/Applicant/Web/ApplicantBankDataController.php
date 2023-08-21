<?php

namespace App\Http\Controllers\Applicant\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\Web\BankData\CreateBankDataRequest;
use App\Services\Interfaces\BankServiceInterface;
use App\Services\Interfaces\ApplicantBankDataServiceInterface;
use Illuminate\Http\Request;

class ApplicantBankDataController extends Controller
{
    public function __construct(
        private BankServiceInterface $bankServiceInterface,
        private ApplicantBankDataServiceInterface $applicantBankDataServiceInterface,
    )
    {}

    public function index()
    {
        $banks = $this->bankServiceInterface->getBanks();

        $loggedInApplicant = auth('applicant')->user();

        $getApplicationBankFilterOptions = [
            'applicant_id' => $loggedInApplicant->id
        ];

        $relationships = ['bank'];
        
        $applicantBanks = $this->applicantBankDataServiceInterface->getApplicantBankDataFiltered(
            $getApplicationBankFilterOptions,
            $relationships
        );

        $data = [
            'banks' => $banks,
            'applicantBanks' => $applicantBanks
        ];

        return view('web.applicant.bank-data')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBankDataRequest $request)
    {
        $loggedInApplicant = auth('applicant')->user();

        $createQualificationOptions = $request->safe()->merge([
            'applicant_id' => $loggedInApplicant->id
        ])->all();

        $this->applicantBankDataServiceInterface->createApplicantBankDataRecord(
            $createQualificationOptions
        );

        return back()->with('status', 'Applicant Bank record was created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->applicantBankDataServiceInterface->deleteApplicantBankDataRecord($id);
        return back()->with('status', 'Applicant Bank record was deleted successfully');
    }
}
