<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

Route::get('/arsts/skatit_pacientu',[App\Http\Controllers\doctorVisitController::class, 'index']);

Route::get('/arsts/nonemt_pacientu',[App\Http\Controllers\doctorVisitController::class, 'remove_patient']);


Route::post('/arsts/pienemt_prakse',[App\Http\Controllers\doctorVisitController::class, 'new_patient']);

Route::get('/arsts/pacienta_vesture/{id}',[App\Http\Controllers\medHistoryController::class, 'index']);

Route::post('/arsts/pacienta_vesture/{id}/pievienot',[App\Http\Controllers\medHistoryController::class, 'create']);

Route::get('/arsts/norikojums_pacientam/{id}',[App\Http\Controllers\doctorNoteController::class, 'index']);





//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

