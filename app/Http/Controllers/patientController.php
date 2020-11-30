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
       $this->middleware('patient');
    }

    public function index()
    {
        $family_doctor=doctor::where('id',auth()->user()->role->family_doctor_id)->first();
        $history=auth()->user()->role->history()->latest()->get();
        $notes=auth()->user()->role->notes()->latest()->get();
        $prescriptions=auth()->user()->role->drugs()->get();
        return view('user.patient',compact('history','notes','prescriptions','family_doctor'));
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
