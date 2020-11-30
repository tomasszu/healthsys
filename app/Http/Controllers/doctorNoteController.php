<?php

namespace App\Http\Controllers;

use App\Models\doctorNote;
use App\Models\doctor;
use Illuminate\Http\Request;

class DoctorNoteController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('doctor');

    }

    public function index($id)
    {
        $specialists=doctor::where('doctor_class',2)->get();
        return view('doctorVisit.doctorNote',compact('specialists'),['patient_id'=>$id]);
    }

    public function create($id)
    {
        if(request('recomendations') != NULL)
        {
        $note=new doctorNote;
        $note->patient_id = $id;
        $reporting_doctor = auth()->user()->role;
        $note->reporting_doctor_id = $reporting_doctor->id;
        $note->recepient = request('recepient');
        $note->diagnosis = request('diagnosis');
        $note->complications = request('complications');
        $note->recomendations = request('recomendations');
        $note->regime = request('regime');
        $note->save();

        return redirect('/arsts/skatit_pacientu/'.$id);
        }
        else
        {
            return back()->withErrors([
            'message' => 'Rekomendācijas ir obligāts lauks'
            ]);
        }
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
     * @param  \App\Models\doctorNote  $doctorNote
     * @return \Illuminate\Http\Response
     */
    public function show(doctorNote $doctorNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\doctorNote  $doctorNote
     * @return \Illuminate\Http\Response
     */
    public function edit(doctorNote $doctorNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\doctorNote  $doctorNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, doctorNote $doctorNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\doctorNote  $doctorNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(doctorNote $doctorNote)
    {
        //
    }
}
