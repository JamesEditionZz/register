<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\VerificationController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user',[HomeController::class, 'user'])->name('user.index');

Route::get('/send-mailverified', [App\Http\Controllers\sendmailcontroller::class, 'sendNotifications'])->name('sendmail');
Route::get('/verifiedsuccess', [VerificationController::class, 'verifiedsuccess'])->name('verifiedsuccess');