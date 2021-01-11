<?php

namespace App\Http\Controllers;

use App\Models\patient;
use App\Models\medHistory;
use App\Models\drug;
use App\Models\User;
use App\Models\doctor;
use App\Models\doctorClass;
use App\Models\doctorNote;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    //Izmantojot starpprogrammatūru noskaidro vai kontrolieri mēģina izmantot autentificējies un pacienta lomas lietotajs 
    public function __construct()
    {
       $this->middleware('auth')->except([]);
       $this->middleware('patient');
    }
    //atgriež pacienta sākuma skatu
    public function index()
    {
        //sameklē pacienta ģimenes ārstu
        $family_doctor=doctor::where('id',auth()->user()->role->family_doctor_id)->first();
        // un med. vēesturi
        $history=auth()->user()->role->history()->latest()->get();
        // un norīkojumus
        $notes=auth()->user()->role->notes()->latest()->get();
        // receptes medikamentiem
        $prescriptions=auth()->user()->role->prescriptions()->latest()->get();
        return view('patient.index',compact('history','notes','prescriptions','family_doctor'));
    }

    // apkalpo ārstu meklēšanas saskarnes
    public function find_doctor()
    {
        // saraksts ar ārstu specializācijām
        $classes = doctorClass::get();
        // ja meklējamie ārsti vēl nav izvēlēti
        if(request('class') == NULL)
        {
            $find = 0;
            return view('patient.findDoctor',compact('classes','find'));
        }
        // ja meklējamā ārstu specialitāte ir izvēlēta
        else
        {
            $find = 1;
            // izvēlētā ārstu specializācija
            $specialist = doctorClass::where('id',request('class'))->first();
            // saraksts ar atrastajiem ārstiem
            $doctors = doctor::where('doctor_class',request('class'))->get();
            return view('patient.findDoctor',compact('classes','doctors','specialist','find'));
        }
    }
    // atgriež pacienta profila datu skatu
    public function show(patient $patient)
    {
        return view('patient.show',compact('patient'));
    }

    // pacienta profila datu izmainīšanai
    public function update(patient $patient)
    {
        $patient->age = request('age');
        $patient->contacts = request('contacts');
        $patient->address = request('address');
        // ja paroļu laukos ievadīa informācija
        if(request('password') != NULL)
        {
            // pārbaude vai parole un paroles atkārtojums sakrīt
            $this->validate(request(), [
           'age' => 'required',
           'password' => 'required|confirmed'
            ]);
            $user = User::where('id',$patient->user_id)->first();
            $user->password = bcrypt(request('password'));
            $user->save();

        }
        //dd($patient);
        $patient->save();
        return view('patient.show',compact('patient'));
    }

}
