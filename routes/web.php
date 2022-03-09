<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;

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


Route::get('/google/callback',[GoogleController::class, 'handleGoogleCallBack'])->name('google.callback');

Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::get('/registration',[RegistrationController::class, 'registration'])->name('registration');

Route::get('/registration/google',[RegistrationController::class, 'registrationGoogle'])->name('registration.google');
Route::get('/login/google',[LoginController::class, 'loginGoogle'])->name('login.google');

Route::post('/registration/submit',[RegistrationController::class, 'registrationSubmit'])->name('registration.submit');
Route::post('/login/submit',[LoginController::class, 'loginSubmit'])->name('login.submit');

Route::get('/registration/google/submit',[RegistrationController::class, 'registrationGoogleSubmit'])->name('registration.google.submit');
Route::get('/login/google/submit',[LoginController::class, 'loginGoogleSubmit'])->name('login.google.submit');

Route::get('/home',[HomeController::class, 'home'])->name('home');
