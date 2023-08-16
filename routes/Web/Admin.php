<?php

use App\Http\Controllers\Admin\Web\ApplicantsController;
use App\Http\Controllers\Admin\Web\Authentication\ForgotPasswordController;
use App\Http\Controllers\Admin\Web\Authentication\LoginController;
use App\Http\Controllers\Admin\Web\Authentication\LogoutController;
use App\Http\Controllers\Admin\Web\DashboardController;
use App\Http\Controllers\Admin\Web\Authentication\ChangePasswordController;
use App\Http\Controllers\Admin\Web\Settings\CountriesController;
use App\Http\Controllers\Admin\Web\Settings\SchoolsController;
use Illuminate\Support\Facades\Route;

Route::group([], function () {
    Route::get('/', function() {
        return redirect()->route('admin.login.index');
    });
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::resource('/dashboard', DashboardController::class, [
            'names' => [
                'index' => 'admin.dashboard.index',
            ]
        ]);

        Route::group(['prefix' => 'settings'], function () {
            Route::resource('/countries', CountriesController::class, [
                'names' => [
                    'index' => 'admin.settings.countries.index',
                    'create' => 'admin.settings.countries.create',
                    'store' => 'admin.settings.countries.store',
                    'edit' => 'admin.settings.countries.edit',
                    'update' => 'admin.settings.countries.update',
                    'destroy' => 'admin.settings.countries.destroy',
                ]
            ]);

            Route::resource('/schools', SchoolsController::class, [
                'names' => [
                    'index' => 'admin.settings.schools.index',
                    'create' => 'admin.settings.schools.create',
                    'store' => 'admin.settings.schools.store',
                    'edit' => 'admin.settings.schools.edit',
                    'update' => 'admin.settings.schools.update',
                    'destroy' => 'admin.settings.schools.destroy',
                ]
            ]);
        });

        Route::resource('/applicants', ApplicantsController::class, [
            'names' => [
                'index' => 'admin.applicants.index',
                'show' => 'admin.applicants.show',
                'update' => 'admin.applicants.update',
                'destroy' => 'admin.applicants.destroy',
            ]
        ]);
    });
    Route::group(['prefix' => 'authentication'], function () {
        Route::resource('/login', LoginController::class, [
            'names' => [
                'index' => 'admin.login.index',
                'store' => 'admin.login.store'
            ]
        ]);

        Route::resource('/forgot-password', ForgotPasswordController::class, [
            'names' => [
                'index' => 'admin.forgot-password.index',
                'store' => 'admin.forgot-password.store',
            ]
        ]);

        Route::resource('/logout', LogoutController::class, [
            'names' => [
                'index' => 'admin.logout.store'
            ]
        ]);

        Route::resource('/change-password', ChangePasswordController::class, [
            'names' => [
                'index' => 'admin.change-password.index',
                'store' => 'admin.change-password.store'
            ]
        ])->middleware('auth:admin');
    });
});
