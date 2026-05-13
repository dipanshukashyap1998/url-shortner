<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\Company;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvitationController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [CompanyController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/login', function () {
    return view('Auth.login');
})->name('login');

Route::post('/authenticate', [UserController::class, 'Login'])->name('authenticate');

Route::post('/logout', [UserController::class, 'Logout'])->middleware('auth')->name('logout');

Route::resource('/company', CompanyController::class)->middleware('auth');

Route::view('/invite', 'invitation')->middleware('auth')->name('invite');

Route::post('/invite', [InvitationController::class, 'sendInvitation'])->middleware('auth')->name('sendInvitation');

Route::post('/invitationAccept',[InvitationController::class, 'acceptInvitation'])->name('invitationAccept');

Route::view('/forget-password', 'Auth.forgetPassword')->name('forgetPassword');

Route::post('/verify-forget-password',[AuthController::class,'forgetPassword'])->name('verifyforgetpassword');
