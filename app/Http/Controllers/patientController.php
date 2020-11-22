<?php

namespace App\Http\Controllers;

use App\Models\patient;
use App\Models\medHistory;
use App\Models\drug;
use App\Models\doctor;
use App\Models\doctorNote;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    
    public function __construct()
    {
       $this->middleware('auth')->except([]);
    }

    public function index()
    {
        $patient=patient::where('user_id', auth()->id())->first();
        $family_doctor_id=$patient->family_doctor_id;
        $family_doctor=doctor::where('id',$family_doctor_id)->first();
        $history=medHistory::where('patient_id',$patient->id)->latest()->get();
        $notes=doctorNote::where('patient_id',$patient->id)->latest()->get();
        $prescriptions=$patient->drugs()->get();
        return view('user.patient',compact('history','notes','prescriptions','family_doctor','patient'));
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
        //
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
    public function update(Request $request, patient $patient)
    {
        //
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
