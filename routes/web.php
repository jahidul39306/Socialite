<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LogoutController;
<<<<<<< HEAD
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SaveController;
use App\Http\Controllers\CommentController;
=======
use App\Http\Controllers\ProfileController;
>>>>>>> 8a990ced92dc3b12bed3e2b73b7a761f21df8258

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


//google
Route::get('/google/callback',[GoogleController::class, 'handleGoogleCallBack'])->name('google.callback');

//login & registration
Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::get('/registration',[RegistrationController::class, 'registration'])->name('registration');

Route::get('/registration/google',[RegistrationController::class, 'registrationGoogle'])->name('registration.google');
Route::get('/login/google',[LoginController::class, 'loginGoogle'])->name('login.google');

Route::post('/registration/submit',[RegistrationController::class, 'registrationSubmit'])->name('registration.submit');
Route::post('/login/submit',[LoginController::class, 'loginSubmit'])->name('login.submit');

Route::get('/registration/google/submit',[RegistrationController::class, 'registrationGoogleSubmit'])->name('registration.google.submit');
Route::get('/login/google/submit',[LoginController::class, 'loginGoogleSubmit'])->name('login.google.submit');

// Route::group(['middleware' => ['GeneralAuth']], function()
// {
//     //home
//     Route::get('/home',[HomeController::class, 'home'])->name('home');
// });

//home
Route::get('/home',[HomeController::class, 'home'])->name('home')->middleware('general.auth');

//post
Route::post('/post/create',[PostController::class, 'postCreate'])->name('post.create');

//logout
Route::get('/logout',[LogoutController::class, 'logout'])->name('logout');

<<<<<<< HEAD
//like
Route::get('/like/create', [LikeController::class, 'likeCreate'])->name('like');

//save
Route::get('/save/create', [SaveController::class, 'saveCreate'])->name('save');

//comment
Route::get('/comment/view', [CommentController::class, 'commentView'])->name('comment.view');
=======
//Profile
Route::get('/profile',[ProfileController::class,'getProfileData'])->name('profile')->middleware('general.auth');

//edit profile
Route::get('/editProfile',[ProfileController::class,'editProfileData'])->name('editProfile')->middleware('general.auth');

Route::post('/editProfile',[ProfileController::class,'editProfileDataSubmit'])->name('editProfileSubmit')->middleware('general.auth');
>>>>>>> 8a990ced92dc3b12bed3e2b73b7a761f21df8258
