<?php

namespace App\Http\Controllers;

use App\Models\doctorNote;
use App\Models\doctorClass;
use App\Models\doctor;
use App\Models\patient;
use Illuminate\Http\Request;

class DoctorNoteController extends Controller
{
    //Izmantojot starpprogrammatūru noskaidro vai kontrolieri mēģina izmantot autentificējies un ārsta lomas lietotajs 
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('doctor');

    }
    //atgriež norīkojumu skatu
    public function index(patient $patient)
    {
        $specialists=doctorClass::get(); // ar speciālizāciju sarakstu
        $patient_id = $patient->id; // ar izvēlētā pacienta id
        //ar pacientam jau izrakstītajiem norīkojumiem / zīmēm
        $notes = $patient->notes->where('recepient',auth()->user()->role->doctor_class);
        return view('doctor.doctorVisit.doctorNote',compact('specialists','patient_id','notes'));
    }

    //saglabāt jaunu norīkojumu
    public function create($id)
    {
        if(request('recomendations') != NULL) // ja saņemti obligatie formas lauki
        {
        $note=new doctorNote; // jauna norīkojuma instance
        $note->patient_id = $id;
        $reporting_doctor = auth()->user()->role; //izrakstošais ārsts
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

}
