<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctor;
use App\Models\drug;
use App\Models\patient;

class doctorVisitController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth')->except([]);
    }


    public function index()
    {
    	$id=request('patient');
    	$patient=patient::where('id',$id)->first();
    	//dd($patient);
        return view('doctorVisit.patientProfile',['patient'=>$patient]);
    }

    public function new_patient()
    {
    	$pers_id=request('pers_id');
    	$doctor=doctor::where('user_id',auth()->id())->first();
    	if(patient::where('pers_id',$pers_id)->first() != NULL)
    	{
	    	if((patient::where('pers_id',$pers_id)->first())->family_doctor_id == NULL )
	    	{
	    		patient::where('pers_id',$pers_id)->update(['family_doctor_id'=> $doctor->id]);
	    	}
	    	else
	    	{
		      	return back()->withErrors([
		         'message' => 'Pacientam jau eksistē ģimenes ārsta prakse'
		      	]);
	    	}
    	}
    	else
    	{
		      	return back()->withErrors([
		         'message' => 'Pacients ar šādu personas kodu neeksistē'
		      	]);
    	}
    	//dd($doctor);
    	//$patient->family_doctor_id=$doctor->id;
    	
		return redirect('/arsts'); 
    }

    public function prescription($id)
    {
        $patient = patient::where('id',$id)->first();
        $drugs = drug::latest()->get();
        return view('doctorVisit.prescribeDrug',['patient'=>$patient],compact('drugs'));
    }

    public function remove_patient()
    {
		patient::where('id',request('patient'))->update(['family_doctor_id'=> NULL]);
		return redirect('/arsts'); 
    }


}
