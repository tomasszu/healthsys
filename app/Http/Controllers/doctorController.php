<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use App\Models\patient;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('doctor');
    }


    public function index()
    {
        $assigned_patients=auth()->user()->role->patients()->get();
        return view('user.doctor',compact('assigned_patients'));
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
     * @param  \App\Models\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(doctor $doctor)
    {
        //
    }
}
