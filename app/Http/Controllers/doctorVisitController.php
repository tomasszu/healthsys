<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctor;
use App\Models\drug;
use App\Models\patient;
use App\Models\User;

class doctorVisitController extends Controller
{
    //Izmantojot starpprogrammatūru noskaidro vai kontrolieri mēģina izmantot autentificējies un ārsta lomas lietotajs 
    public function __construct()
    {
       $this->middleware('auth')->except([]);
       $this->middleware('doctor');
    }

    //atgriež pacienta profila skatu ārstam, pec pacienta pienemsanas
    public function index()
    {
    	$id=request('patient'); //izvēlētais pacients
    	$patient=patient::where('id',$id)->first(); //sameklē pacientu pēc tā id
    	//dd($patient);
        return view('doctor.doctorVisit.patientProfile',['patient'=>$patient]);
    }
    //atgriež pacienta profila skatu alternatīvajā gadījumā ( Ārstam-speciālistam) pieņemot pacientu pēc pacienta personas koda.
    public function index_pers_id()
    {
        // mēģina sameklēt šādu lietotaju ar pacienta lomu
        try{
            $user=User::where('pers_id',request('pers_id'))->first();
            $patient=patient::where('user_id', $user->id)->first();
        }
        catch(\Exception $e) {
            return back()->withErrors([
                'message' => 'Pacients ar šādu pers. kodu neeksistē'
                ]);
        }
        
        return view('doctor.doctorVisit.patientProfile',['patient'=>$patient]);
            
    }
    //dažos gadījumos jāuzmeklē pacients vēlreiz atgrižoties uz pacienta profila skatu
    public function return_index($id)
    {
        $patient=patient::where('id',$id)->first();
        //dd($patient);
        return view('doctor.doctorVisit.patientProfile',['patient'=>$patient]);
    }

    //jauna pacienta pieņemšana ģimenes ārsta praksē
    public function new_patient()
    {
        // mēģina sameklēt šādu lietotaju ar pacienta lomu
        try{
            $user=User::where('pers_id',request('pers_id'))->first();
            $patient=patient::where('user_id', $user->id)->first();
        }
        catch(\Exception $e) {
            return back()->withErrors([
                'message' => 'Pacients ar šādu pers. kodu neeksistē'
                ]);
        }
            // ja pacients jau nav kādā ģimenes ārsta praksē
	    	if($user->role->family_doctor_id == NULL )
	    	{
	    		patient::where('user_id',$user->id)->update(['family_doctor_id'=> auth()->user()->role->id]); // tad pievieno
	    	}
	    	else
	    	{
		      	return back()->withErrors([
		         'message' => 'Pacientam jau eksistē ģimenes ārsta prakse'
		      	]);
	    	}
		return redirect('/arsts'); 
    }

    //atvērt formu lai izrakstītu pacientam medikamenta recepti
    public function prescription($id)
    {
        $patient = patient::where('id',$id)->first();
        $drugs = drug::latest()->get(); // saraksts ar valstii pieejamajiem medikamentiem
        return view('doctor.doctorVisit.prescribeDrug',['patient'=>$patient],compact('drugs'));
    }
    // noņemt pacientu no (savas) ģimenes ārsta prakses
    public function remove_patient()
    {
		patient::where('id',request('patient'))->update(['family_doctor_id'=> NULL]);
		return redirect('/arsts'); 
    }


}
