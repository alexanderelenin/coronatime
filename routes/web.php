<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LanguageController;
use App\Notifications\EmailVerifyNotification;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::redirect('/', '/user-login');

Route::controller(SessionController::class)->group(function(){
    Route::get('/user-login',  'index')->middleware('guest')->name('login.index');
    Route::get('sign-up',  'signUp')->middleware('guest')->name('signup.index');
    Route::get('statistics/worldwide',  'world')->middleware('auth', 'verified')->name('worldwide');
    Route::get('statistics/by-country',  'byCountry')->middleware('auth', 'verified')->name('by.country');
    Route::post('by-country/countries',  'byCountry')->middleware('auth')->name('country.search');
});

Route::controller(AuthController::class)->group(function(){
    Route::post('user-create',  'store')->middleware('guest')->name('user.create');
    Route::post('user-login', 'login')->middleware('guest')->name('login');
    Route::post('user-logout', 'logout')->middleware('auth')->name('logout');
});


Route::controller(EmailController::class)->group(function(){
    Route::get('/email/verify', 'index')->middleware('auth')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}','verify')->middleware(['auth', 'signed'])->name('verification.verify');
    
});

Route::controller(PasswordController::class)->group(function(){
    Route::get('/forgot-password',  'requestReset')->middleware('guest')->name('password.request');
    Route::post('/forgot-password', 'validateEmail')->middleware('guest')->name('password.email');
    Route::get('/reset-password/{token}', 'reset')->middleware('guest')->name('password.reset');
    Route::post('/reset-password', 'update')->middleware('guest')->name('password.update');
});

Route::get('/change-locale/{locale}', [LanguageController::class,'change'])->name('language.change');