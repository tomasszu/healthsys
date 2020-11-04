<?php

use Illuminate\Support\Facades\Route;
use App\message;
use App\management_post;
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
    return view('main.welcome');
});

Route::get('/par',function () {
    return view('main.about');
});

Route::get('/login',[App\Http\Controllers\sessionsController::class, 'create'])->name('login');

Route::post('/login',[App\Http\Controllers\sessionsController::class, 'store']);

Route::get('/logout',[App\Http\Controllers\sessionsController::class, 'destroy']);

Route::get('/register',[App\Http\Controllers\registrationController::class, 'create']);

Route::post('/register',[App\Http\Controllers\registrationController::class, 'store']);

Route::get('/pacients',[App\Http\Controllers\patientController::class, 'index']);

Route::get('/arsts',[App\Http\Controllers\doctorController::class, 'index']);



//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

