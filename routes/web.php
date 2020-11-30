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

Route::get('/farmaceits',[App\Http\Controllers\pharmacistController::class, 'index']);

Route::get('/arsts/skatit_pacientu',[App\Http\Controllers\doctorVisitController::class, 'index']);

Route::get('/arsts/skatit_pacientu/{id}',[App\Http\Controllers\doctorVisitController::class, 'return_index']);

Route::get('/arsts/nonemt_pacientu',[App\Http\Controllers\doctorVisitController::class, 'remove_patient']);


Route::post('/arsts/pienemt_prakse',[App\Http\Controllers\doctorVisitController::class, 'new_patient']);

Route::get('/arsts/pacienta_vesture/{id}',[App\Http\Controllers\medHistoryController::class, 'index']);

Route::post('/arsts/pacienta_vesture/{id}/pievienot',[App\Http\Controllers\medHistoryController::class, 'create']);

Route::get('/arsts/norikojums_pacientam/{id}',[App\Http\Controllers\doctorNoteController::class, 'index']);

Route::post('/arsts/norikojums_pacientam/{id}/izrakstit',[App\Http\Controllers\doctorNoteController::class, 'create']);

Route::get('/arsts/izrakstit_recepti/{id}',[App\Http\Controllers\doctorVisitController::class, 'prescription']);

Route::post('/arsts/recepte_pacientam/{id}/izrakstit',[App\Http\Controllers\drugController::class, 'prescribe']);

Route::get('/farmaceits/skatit_medikamentu',[App\Http\Controllers\drugController::class, 'show']);

Route::post('/farmaceits/pievienot_medikamentu',[App\Http\Controllers\drugController::class, 'store']);

Route::delete('/farmaceits/dzest_medikamentu',[App\Http\Controllers\drugController::class, 'destroy']);

Route::post('/farmaceits/klienta_receptes',[App\Http\Controllers\drugController::class, 'index']);

Route::delete('/farmaceits/pacients/{patient}/iznemt_recepti/{drug}',[App\Http\Controllers\drugController::class, 'destroy_prescription']);


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

