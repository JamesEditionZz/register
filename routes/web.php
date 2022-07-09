<?php

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

//Admin
Route::get('/admin',[HomeController::class, 'admin'])->name('user.admin')->middleware('status');
Route::get('/member',[HomeController::class, 'member'])->name('admin.member')->middleware('status');
Route::get('/member/edit/{id}',[HomeController::class, 'edit'])->name('admin.memberedit')->middleware('status');
Route::post('/member/update/{id}',[HomeController::class, 'update'])->middleware('status');
Route::get('/member/memberdelete/{id}',[HomeController::class, 'memberdelete'])->middleware('status');

//User
Route::get('/user',[HomeController::class, 'user'])->name('user.index');
Route::get('user/request',[PackageController::class, 'formrequest'])->name('formrequest');
Route::get('user/packagefree',[PackageController::class, 'packagefree'])->name('packagefree');
Route::get('user/packagemonth',[PackageController::class, 'packagemonth'])->name('packagemonth');
Route::get('user/packageyear',[PackageController::class, 'packageyear'])->name('packageyear');
Route::post('user/fetch',[PackageController::class,'fetch'])->name('dropdown.fetch');


Route::get('/verifiedsuccess', [VerificationController::class, 'verifiedsuccess'])->name('verifiedsuccess');
Route::post('/verifiedsuccessout', [VerificationController::class, 'verifiedsuccessout'])->name('verifiedsuccessout');