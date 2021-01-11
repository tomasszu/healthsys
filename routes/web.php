<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Šeit tiek reģistrēti tīmekļa maršruti un kur pieprasījumam no kāda maršruta
| būtu jānonāk (kurā kontrolierī, kontroliera funkcijā)
| 
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

Route::get('/arsts/specialists/skatit_pacientu',[App\Http\Controllers\doctorVisitController::class, 'index_pers_id']);


Route::get('/arsts/skatit_pacientu/{id}',[App\Http\Controllers\doctorVisitController::class, 'return_index']);

Route::get('/arsts/nonemt_pacientu',[App\Http\Controllers\doctorVisitController::class, 'remove_patient']);


Route::post('/arsts/pienemt_prakse',[App\Http\Controllers\doctorVisitController::class, 'new_patient']);

Route::get('/arsts/pacienta_vesture/{id}',[App\Http\Controllers\medHistoryController::class, 'index']);

Route::post('/arsts/pacienta_vesture/{id}/pievienot',[App\Http\Controllers\medHistoryController::class, 'create']);

Route::get('/arsts/norikojums_pacientam/{patient}',[App\Http\Controllers\doctorNoteController::class, 'index']);

Route::post('/arsts/norikojums_pacientam/{id}/izrakstit',[App\Http\Controllers\doctorNoteController::class, 'create']);

Route::get('/arsts/izrakstit_recepti/{id}',[App\Http\Controllers\doctorVisitController::class, 'prescription']);

Route::post('/arsts/recepte_pacientam/{id}/izrakstit',[App\Http\Controllers\drugController::class, 'prescribe']);

Route::get('/farmaceits/skatit_medikamentu',[App\Http\Controllers\drugController::class, 'show']);

Route::post('/farmaceits/pievienot_medikamentu',[App\Http\Controllers\drugController::class, 'store']);

Route::delete('/farmaceits/dzest_medikamentu',[App\Http\Controllers\drugController::class, 'destroy']);

Route::get('/farmaceits/klienta_receptes',[App\Http\Controllers\drugController::class, 'index']);

Route::delete('/farmaceits/pacients/{patient}/iznemt_recepti/{drug}',[App\Http\Controllers\drugController::class, 'destroy_prescription']);

Route::get('/pacients/{patient}/dati',[App\Http\Controllers\patientController::class, 'show']);

Route::patch('/pacients/{patient}/labot_datus',[App\Http\Controllers\patientController::class, 'update']);

Route::get('/pacients/meklet_arstu',[App\Http\Controllers\patientController::class, 'find_doctor']);

Route::get('/pacients/meklet_specialistus',[App\Http\Controllers\patientController::class, 'find_doctor']);

Route::get('/zinojumi/{flag}',[App\Http\Controllers\MessageController::class, 'index']);

Route::post('/zinojumi/sutit',[App\Http\Controllers\MessageController::class, 'store']);

Route::get('/zinojumi/{message}/skatit',[App\Http\Controllers\MessageController::class, 'show']);


Route::get('/profils', [App\Http\Controllers\HomeController::class, 'index']);

