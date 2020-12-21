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
    
    public function __construct()
    {
       $this->middleware('auth')->except([]);
       $this->middleware('patient');
    }

    public function index()
    {
        $family_doctor=doctor::where('id',auth()->user()->role->family_doctor_id)->first();
        $history=auth()->user()->role->history()->latest()->get();
        $notes=auth()->user()->role->notes()->latest()->get();
        $prescriptions=auth()->user()->role->prescriptions()->latest()->get();
        return view('patient.index',compact('history','notes','prescriptions','family_doctor'));
    }

    public function find_doctor()
    {
        $classes = doctorClass::get();
        if(request('class') == NULL)
        {
            $find = 0;
            return view('patient.findDoctor',compact('classes','find'));
        }
        else
        {
            $find = 1;
            $specialist = doctorClass::where('id',request('class'))->first();
            $doctors = doctor::where('doctor_class',request('class'))->get();
            return view('patient.findDoctor',compact('classes','doctors','specialist','find'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(patient $patient)
    {
        return view('patient.show',compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(patient $patient)
    {
        $patient->age = request('age');
        $patient->contacts = request('contacts');
        $patient->address = request('address');
        if(request('password') != NULL)
        {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(patient $patient)
    {
        //
    }
}
