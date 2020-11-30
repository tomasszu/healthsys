<?php

namespace App\Http\Controllers;

use App\Models\drug;
use App\Models\patient_drug;
use App\Models\patient;
use App\Models\doctor;
use Illuminate\Http\Request;

class drugController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth')->except([]);
       $this->middleware('pharmacist')->except(['prescribe']);
       $this->middleware('doctor')->only(['prescribe']);

    }


    public function index()
    {
        $patient=patient::where('pers_id',request('pers_id'))->first();

        if($patient != NULL)
        {
        $prescriptions=$patient->drugs()->get();
        return view('drugs.patient_index',compact('prescriptions','patient'));
        }
        else
        {
            return back()->withErrors([
            'message' => 'Pacients ar šādu personas kodu neeksistē'
            ]);
        }
    }

    public function prescribe($id)
    {
        if(request('drug') != NULL)
        {
        $prescription=new patient_drug;
        $prescription->patient_id = $id;
        $prescription->drug_id = request('drug');
        $prescription->save();

        return redirect('/arsts/skatit_pacientu/'.$id);
        }
        else
        {
            return back()->withErrors([
            'message' => 'Izvēlieties medikamentu'
            ]);
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
    public function store()
    {
        if(request('name')&&request('producer')&&request('description') != NULL)
        {
        $drug=new drug;
        $drug->name = request('name');
        $drug->producer = request('producer');
        $drug->description = request('description');
        $drug->save();

        return redirect('/farmaceits');
        }
        else
        {
            return back()->withErrors([
            'message' => 'Aizpildiet visus laukus'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $drug=drug::where('id',request('drug'))->first();
        return view('drugs.show',compact('drug'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function edit(drug $drug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function destroy_prescription ($patient, $drug)
    {
        $prescription=patient_drug::where([['patient_id','=',$patient],['drug_id','=',$drug]])->first();
        $prescription->delete();
        return redirect('/farmaceits');
    }

    public function destroy(drug $drug)
    {
       $drug=drug::where('id',request('drug'))->first();
       $drug->delete();
       return redirect('/farmaceits');

    }
}
