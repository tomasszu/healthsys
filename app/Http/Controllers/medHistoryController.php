<?php

namespace App\Http\Controllers;

use App\Models\medHistory;
use Illuminate\Http\Request;
use App\Models\doctor;
use App\Models\patient;


class MedHistoryController extends Controller
{
    //Izmantojot starpprogrammatūru noskaidro vai kontrolieri mēģina izmantot autentificējies un ārsta lomas lietotajs 
    public function __construct()
    {
       $this->middleware('auth')->except([]);
       $this->middleware('doctor');
    }

    //atgriež med. vēstures skatu
    public function index($id)
    {
        $history=medHistory::where('patient_id',$id)->latest()->get();
        return view('doctor.doctorVisit.history.index',compact('history'),['patient_id'=>$id]);

    }

    // med. vēstures ieraksta saglabāšana
    public function create($id)
    {
        if(request('description') != NULL) // vai ir aizpildīts apraksts
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
}
