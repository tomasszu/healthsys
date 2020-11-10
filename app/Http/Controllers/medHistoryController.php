<?php

namespace App\Http\Controllers;

use App\Models\medHistory;
use Illuminate\Http\Request;
use App\Models\doctor;
use App\Models\patient;


class MedHistoryController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth')->except([]);
    }

    public function index($id)
    {
        $history=medHistory::where('patient_id',$id)->latest()->get();
        return view('doctorVisit.history.index',compact('history'),['patient_id'=>$id]);

        dd($history);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if(request('description') != NULL)
        {
        $record=new medHistory;
        $record->patient_id = $id;
        $record->diagnosis = request('diagnosis');
        $record->description = request('description');
        $record->save();

        return redirect('/arsts/pacienta_vesture/'.$id.'');
        }
        else
        {
            return back()->withErrors([
            'message' => 'Apraksts ir obligāts'
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
     * @param  \App\Models\medHistory  $medHistory
     * @return \Illuminate\Http\Response
     */
    public function show(medHistory $medHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\medHistory  $medHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(medHistory $medHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\medHistory  $medHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, medHistory $medHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\medHistory  $medHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(medHistory $medHistory)
    {
        //
    }
}
