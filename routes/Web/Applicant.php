<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Applicant\Web\ApplicantBioDataController;
use App\Http\Controllers\Applicant\Web\ApplicantPaymentDataController;
use App\Http\Controllers\Applicant\Web\ApplicantPreviewDataController;
use App\Http\Controllers\Applicant\Web\ApplicantQualificationDataController;
use App\Http\Controllers\Applicant\Web\ApplicantSchoolDataController;
use App\Http\Controllers\Applicant\Web\ApplicantUploadedDocumentDataController;
use App\Http\Controllers\Applicant\Web\Authentication\ChangePasswordController;
use App\Http\Controllers\Applicant\Web\Authentication\LoginController;
use App\Http\Controllers\Applicant\Web\Authentication\LogoutController;
use App\Http\Controllers\Applicant\Web\Authentication\RegistrationController;
use App\Http\Controllers\Applicant\Web\Authentication\RequestResetPasswordController;

Route::group([], function () {

    Route::group(['prefix' => 'authentication'], function () {
        Route::get('/registration', [RegistrationController::class, 'create'])->name('show-registration');
        Route::post('/registration', [RegistrationController::class, 'store'])->name('process-registration');

        Route::get('/login', [LoginController::class, 'create'])->name('show-login');
        Route::post('/login', [LoginController::class, 'store'])->name('process-login');

        Route::get('/request-reset-password', [
            RequestResetPasswordController::class, 'create'
        ])->name('show-request-reset-password');
        Route::post('/process-reset-password', [
            RequestResetPasswordController::class, 'store'
        ])->name('process-request-reset-password');

        Route::post('/logout', [LogoutController::class, 'store'])->name('process-logout');

        Route::get('change-password', [
            ChangePasswordController::class, 'create'
        ])->name('show-change-password-form')->middleware('auth:applicant');
        Route::post('change-password', [
            ChangePasswordController::class, 'store'
        ])->name('process-change-password-form')->middleware('auth:applicant');
    });

    Route::group(['middleware' => ['auth:applicant']], function () {
        Route::group(['middleware' => ['verify.payment.status']], function () {
            Route::get('bio-data', [
                ApplicantBioDataController::class, 'create'
            ])->name('show-applicant-bio-data-form');
            Route::put('bio-data', [
                ApplicantBioDataController::class, 'update'
            ])->name('process-applicant-bio-data-form');

            Route::get('qualification-data', [
                ApplicantQualificationDataController::class, 'create'
            ])->name('show-applicant-qualification-form');
            Route::post('qualification-data', [
                ApplicantQualificationDataController::class, 'store'
            ])->name('process-applicant-qualification-form');
            Route::delete('qualification-data/{id}', [
                ApplicantQualificationDataController::class, 'destroy'
            ])->name('delete-applicant-qualification-form');

            Route::get('uploaded-document-data', [
                ApplicantUploadedDocumentDataController::class, 'create'
            ])->name('show-applicant-uploaded-document-form');
            Route::post('uploaded-document-data', [
                ApplicantUploadedDocumentDataController::class, 'store'
            ])->name('process-applicant-uploaded-document-form');
            Route::delete('uploaded-document-data/{id}', [
                ApplicantUploadedDocumentDataController::class, 'destroy'
            ])->name('delete-applicant-uploaded-document-form');

            Route::get('preview', [
                ApplicantPreviewDataController::class, 'create'
            ])->name('show-applicant-preview-data-form');
            Route::put('submit', [
                ApplicantPreviewDataController::class, 'update'
            ])->name('process-applicant-submit-form');
        });

        Route::get('payment-data', [
            ApplicantPaymentDataController::class, 'create'
        ])->name('show-applicant-payment-data');
        Route::post('initiate-transaction', [
            ApplicantPaymentDataController::class, 'store'
        ])->name('process-initiate-transaction');
    });
});
