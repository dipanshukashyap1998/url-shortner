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

Route::view('/login','Auth.login')->name('login');
Route::view('/register','Auth.register')->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.perform');

Route::post('/authenticate', [AuthController::class, 'Login'])->name('authenticate');

Route::post('/logout', [AuthController::class, 'Logout'])->middleware('auth')->name('logout');

Route::view('/invite', 'invitation')->middleware('auth')->name('invite');

Route::post('/invite', [InvitationController::class, 'sendInvitation'])->middleware('auth')->name('sendInvitation');

Route::post('/invitationAccept',[InvitationController::class, 'acceptInvitation'])->name('invitationAccept');

Route::view('/forget-password', 'Auth.forgetPassword')->name('forgetPassword');

Route::post('/verify-forget-password',[AuthController::class,'forgetPassword'])->name('verifyforgetpassword');

Route::resource('/user',UserController::class)->middleware('auth');
Route::resource('/company', CompanyController::class)->middleware('auth');
