<?php

namespace App\Http\Controllers;

use App\Models\drug;
use App\Models\drug_inventory;
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
        if($patient == NULL){
            return back()->withErrors([
            'message' => 'Pacients ar šādu pers. kodu neeksistē'
            ]);        }

        $prescriptions=$patient->prescriptions()->latest()->get();
        return view('drugs.patient_index',compact('prescriptions','patient'));
    }

    public function prescribe($id)
    {
        if(request('drug') != NULL)
        {
        $prescription=new patient_drug;
        $prescription->patient_id = $id;
        $prescription->drug_id = request('drug');
        $prescription->doctor_id = auth()->user()->role->id;
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
            $available_inventory = auth()->user()->role->inventory()->get();
            if($available_inventory->where('drug_id',request('drug'))->isEmpty())
            {
                $inventory= new drug_inventory;
                $inventory->pharmacist_id = auth()->user()->role->id;
                $inventory->drug_id = request('drug');
                $inventory->count = request('count');
                $inventory->save();
                return redirect('/farmaceits');

            }
            else
            {
                $count = $available_inventory->where('drug_id',request('drug'))->first()->count;
                $added = request('count');
                $count = $count + $added;
                drug_inventory::where('drug_id',request('drug'))->where('pharmacist_id',auth()->user()->role->id)->update(['count'=> $count]);
                return redirect('/farmaceits');
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
    public function destroy_prescription ($patient,$pr_id)
    {
        $prescription=patient_drug::where('id',$pr_id)->first();
        if($prescription->drug->count() != NULL)
        {
            $count = $prescription->drug->count();
            $count = $count -1;
            patient_drug::where('id',$pr_id)->update(['active' => 0]);
            drug_inventory::where('drug_id',$prescription->drug->id)->where('pharmacist_id',auth()->user()->role->id)->update(['count' => $count]);
            drug_inventory::where('count',0)->delete();

        }
        else
        {
            return back()->withErrors([
            'message' => 'Medikamenta nav inventārā'
            ]);
        }
        return redirect('/farmaceits');
    }

    public function destroy()
    {
        if((request('drug')!= NULL) && (request('count') != 0))
        {
            $available_inventory = auth()->user()->role->inventory()->get();
            if($available_inventory->where('drug_id',request('drug'))->isEmpty())
            {
                return back()->withErrors([
                'message' => 'Medikamentu inventārā jau šobrīd nav'
            ]);            }
            else
            {
                $count = $available_inventory->where('drug_id',request('drug'))->first()->count;
                $removed = request('count');
                if($count-$removed < 0)
                {
                    return back()->withErrors([
                    'message' => 'Tik daudz medikamentu inventārā nav'
                    ]);
                }
                else
                {
                    $count = $count - $removed;
                    drug_inventory::where('drug_id',request('drug'))->where('pharmacist_id',auth()->user()->role->id)->update(['count'=> $count]);
                    drug_inventory::where('count',0)->delete();
                }
                return redirect('/farmaceits');
            }
        }
       //$drug=drug::where('id',request('drug'))->first();
       //$drug->delete();
       return redirect('/farmaceits');

    }
}
