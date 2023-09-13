<?php
    // $avatarUrl = env('APP_URL').'/storage/passports/'.$passport->file_path;
    // $arrContextOptions=array(
    //             "ssl"=>array(
    //                 "verify_peer"=>false,
    //                 "verify_peer_name"=>false,
    //             ),
    //         );
    // $type = pathinfo($avatarUrl, PATHINFO_EXTENSION);
    // $avatarData = file_get_contents($avatarUrl, false, stream_context_create($arrContextOptions));
    // $avatarBase64Data = base64_encode($avatarData);
    // $imageData = 'data:image/' . $type . ';base64,' . $avatarBase64Data;
    // echo $imageData;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href={{ asset('css/pdf.css') }} />
    <title>Application Form</title>
    <style>
        *{
            font-size: 10px;
            font-family: sans-serif;
        }
        .row {
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            display: flex;
            padding-right: calc(var(--cui-gutter-x) * 0.5);
            padding-left: calc(var(--cui-gutter-x) * 0.5);
        }

        .col-6 {
            flex: 0 0 auto;
            width: 50%;
        }

        .col-5 {
            flex: 0 0 auto;
            width: 41.66666667%;
        }

        .col-4 {
            flex: 0 0 auto;
            width: 33.33333333%;
        }

        .col-3 {
            flex: 0 0 auto;
            width: 25%;
        }

        .mt-2 {
            margin-top: 0.5rem !important;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            border-collapse: collapse;
        }

        th,
        td,
        tr {
            padding: 0.5rem;
        }

        .table-bordered {
            border: solid black 1px;
        }

        .bordered {
            border: solid black 1px;
        }
        .heading {
            text-align: center;
        }
        .heading-school-title {
            font-size: 150px;
        }
        .no-margin-and-padding {
            margin: 0px;
            padding: 0px;
        }
        .passport {
            height: 10rem;
            width: 10rem;
            object-fit: cover;
        }
        .logo {
            height: 10rem;
            width: 10rem;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div>
        <div class="row mt-2 table-responsive">
            <table class="table">
                <tbody class="">
                    <tr>
                        <td width="5%">
                            <img src="{{ public_path('assets/images/bssb-logo.png') }}" class="logo" alt="">
                        </td>
                        <td width="95%">
                            <div class="heading">
                                <div style="heading-school-title">
                                    <b>Borno State Scholarship Board</b>
                                </div>
                                <div class="no-margin-and-padding">
                                    <b>APPLICATION FOR SCHOLARSHIP</b>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr class="no-margin-and-padding">
    </div>
    <div class="row mt-2">
        <h2>Personal Information</h2>
    </div>
    <div>
        <div class="row table-responsive">
            <table class="table">
                <tbody class="">
                    <tr>
                        <td width="5%">
                            <img src="{{
                                $applicant->applicantBioData?->passport_path != null
                                    ? storage_path('app/'.$applicant->applicantBioData?->passport_path)
                                    : public_path('assets/images/placeholder/user-place-holder.jpg')
                            }}" alt="" class="passport">
                        </td>
                        <td width="95%">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <b>Surname</b>
                                            <div>{{ $applicant->surname }}</div>
                                        </td>
                                        <td>
                                            <b>Other Names</b>
                                            <div>{{ $applicant->other_names }}</div>
                                        </td>
                                        <td>
                                            <b>Guardian Full Name</b>
                                            <div>{{ $applicant->applicantBioData?->guardian_full_name }}</div>
                                        </td>
                                        <td>
                                            <b>Application Tracking Code</b>
                                            <div>{{ $applicant->tracking_code }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Phone Number</b>
                                            <div>{{ $applicant->applicantBioData?->phone_number }}</div>
                                        </td>
                                        <td>
                                            <b>Bank Verification Number(BVN)</b>
                                            <div>{{ $applicant->applicantBioData?->bvn }}</div>
                                        </td>
                                        <td>
                                            <b>National Identity Number(NIN)</b>
                                            <div>{{ $applicant->applicantBioData?->gender }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Date of Birth</b>
                                            <div>{{ $applicant->applicantBioData?->date_of_birth }}</div>
                                        </td>
                                        <td>
                                            <b>Place of Birth</b>
                                            <div>{{ $applicant->applicantBioData?->place_of_birth }}</div>
                                        </td>
                                        <td>
                                            <b>Contact Address</b>
                                            <div>{{ $applicant->applicantBioData?->contact_address }}</div>
                                        </td>
                                        <td>
                                            <b>Local Government Area</b>
                                            <div>{{ $applicant->applicantBioData?->lga?->name }}</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row mt-2">
            <h2>School Information</h2>
        </div>
        <div class="row table-responsive">
            <table class="table">
                <tbody class="">
                    <tr>
                        <td>
                            <b>Name of Institution</b>
                            <div>{{ $applicant->applicantSchoolData?->name_of_institution }}</div>
                        </td>
                        <td>
                            <b>Course of Study</b>
                            <div>{{ $applicant->applicantSchoolData?->course_of_study }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Identity Number</b>
                            <div>{{ $applicant->applicantSchoolData?->identity_number }}</div>
                        </td>
                        <td>
                            <b>Admission Date</b>
                            <div>{{ $applicant->applicantSchoolData?->date_of_admission }}</div>
                        </td>
                        <td>
                            <b>Graduation Date</b>
                            <div>{{ $applicant->applicantSchoolData?->date_of_graduation }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Current Level</b>
                            <div>{{ $applicant->applicantSchoolData?->current_level }}</div>
                        </td>
                        <td>
                            <b>Programme</b>
                            <div>{{ $applicant->programme }}</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row mt-2">
            <h2>Bank Information</h2>
        </div>
        <div class="row table-responsive">
            <table class="table table-bordered">
                <thead class="bordered">
                    <tr class="bordered">
                        <th class="bordered" scope="col"> Bank </th>
                        <th class="bordered" scope="col"> Account Name </th>
                        <th class="bordered" scope="col"> Account Number </th>
                    </tr>
                </thead>
                <tbody class="bordered">
                    @foreach ($applicant->applicantBankData as $applicantBank)
                        <tr>
                            {{-- {{ $applicantBank }} --}}
                            <td class="bordered">{{ $applicantBank->bank->name }}</td>
                            <td class="bordered">{{ $applicantBank->account_name }}</td>
                            <td class="bordered">{{ $applicantBank->account_number }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row mt-2">
            <h2>Institutions Attended</h2>
        </div>
        <div class="row table-responsive">
            <table class="table table-bordered">
                <thead class="bordered">
                    <tr>
                        <th class="bordered" scope="col">School Name</th>
                        <th class="bordered" scope="col">Qualification Obtained</th>
                        <th class="bordered" scope="col">From Date</th>
                        <th class="bordered" scope="col">To Date</th>
                    </tr>
                </thead>
                <tbody class="bordered">
                    @foreach ($applicant->applicantQualificationData as $applicantQualification)
                        <tr>
                            <td class="bordered">{{ $applicantQualification->school_attended }}</td>
                            <td class="bordered">{{ $applicantQualification->qualificationType->name }}</td>
                            <td class="bordered">{{ $applicantQualification->from_date }}</td>
                            <td class="bordered">{{ $applicantQualification->to_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row mt-2">
            <h2>Uploaded Documents</h2>
        </div>
        <div class="row table-responsive">
            <table class="table table-bordered">
                <thead class="bordered">
                    <tr>
                        <th class="bordered" scope="col">Uploaded Document</th>
                    </tr>
                </thead>
                <tbody class="bordered">
                    @foreach ($applicant->applicantUploadedDocumentData as $applicantUploadDocument)
                        <tr>
                            <td class="bordered">{{ $applicantUploadDocument->documentType->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row mt-2">
            <h2>Referees Information</h2>
        </div>
        <div class="row table-responsive">
            <table class="table table-bordered">
                <thead class="bordered">
                    <tr>
                        <th class="bordered" scope="col">Full Name</th>
                        <th class="bordered" scope="col">Occupation</th>
                        <th class="bordered" scope="col">Phone Number</th>
                    </tr>
                </thead>
                <tbody class="bordered">
                    @foreach ($applicant->applicantRefereeData as $applicantReferee)
                        <tr>
                            <td class="bordered">{{ $applicantReferee->full_name }}</td>
                            <td class="bordered">{{ $applicantReferee->occupation }}</td>
                            <td class="bordered">{{ $applicantReferee->phone_number }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="row mt-2">
            <div class="col-md-12">
                <div>
                    <h2>DECLARATION</h2>
                </div>
                <p> I <b><u>{{ $applicant->surname.' '.$applicant->other_names }}</u></b> hereby declare that the information provided above is to the best of my knowledge and belief accurate in every details </p>
                <p> If given this scholarship, I will also comply strictly with the Rules and Regulations of the Borno State Scholarship Board </p>
                <p>Sign ............................................</p>
            </div>
        </div>
</body>

</html>