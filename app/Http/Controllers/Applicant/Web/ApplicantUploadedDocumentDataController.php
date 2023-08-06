<?php

namespace App\Http\Controllers\Applicant\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\Web\UploadedDocumentData\CreateUploadedDocumentDataRequest;
use App\Services\Interfaces\DocumentTypeServiceInterface;
use App\Services\Interfaces\ApplicantUploadedDocumentDataServiceInterface;
use Illuminate\Http\Request;

class ApplicantUploadedDocumentDataController extends Controller
{
    public function __construct(
        private DocumentTypeServiceInterface $documentTypeServiceInterface,
        private ApplicantUploadedDocumentDataServiceInterface $applicantUploadedDocumentDataServiceInterface,
    )
    {}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documentTypes = $this->documentTypeServiceInterface->getDocumentTypes();

        $loggedInApplicant = auth('applicant')->user();

        $getApplicationQualificationFilterOptions = [
            'applicant_id' => $loggedInApplicant->id
        ];

        $relationships = ['documentType'];
        
        $applicantUploadDocuments = $this->applicantUploadedDocumentDataServiceInterface->getApplicantUploadedDocumentDataFiltered(
            $getApplicationQualificationFilterOptions,
            $relationships
        );
        
        $data = [
            'documentTypes' => $documentTypes,
            'applicantUploadDocuments' => $applicantUploadDocuments
        ];

        return view('web.applicant.uploaded-document-data')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUploadedDocumentDataRequest $request)
    {
        $loggedInApplicant = auth('applicant')->user();

        $extension = $request->file->getClientOriginalExtension();
        $fileNameToStore = time().uniqid().'.'.$extension;
        
        $path = $request->file->storeAs('public/documents', $fileNameToStore);


        $createUploadedOptions = $request->safe()->merge([
            'applicant_id' => $loggedInApplicant->id,
            'file_path' => $path
        ])->except('file');

        $this->applicantUploadedDocumentDataServiceInterface->createApplicantUploadedDocumentDataRecord(
            $createUploadedOptions
        );

        return back()->with('status', 'Applicant Uploaded Document record was created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->applicantUploadedDocumentDataServiceInterface->deleteApplicantUploadedDocumentDataRecord($id);
        return back()->with('status', 'Applicant Uploaded Document record was deleted successfully');
    }
}
