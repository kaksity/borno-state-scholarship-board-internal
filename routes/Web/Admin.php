<?php

use App\Http\Controllers\Admin\Web\Authentication\ForgotPasswordController;
use App\Http\Controllers\Admin\Web\Authentication\LoginController;
use App\Http\Controllers\Admin\Web\Authentication\LogoutController;
use App\Http\Controllers\Admin\Web\DashboardController;
use App\Http\Controllers\Admin\Web\Authentication\ChangePasswordController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth:admin'], function () {
    Route::resource('/dashboard', DashboardController::class, [
        'names' => [
            'index' => 'admin.dashboard.index',
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
