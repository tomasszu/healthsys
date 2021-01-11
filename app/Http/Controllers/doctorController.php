<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use App\Models\patient;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    //Izmantojot starpprogrammatūru noskaidro vai kontrolieri mēģina izmantot autentificējies un ārsta lomas lietotajs 
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('doctor');
    }


    //atgriež ārsta sākuma skatu
    public function index()
    {
        //pārbauda vai lietotājs ir ģimenes ārsts
        if(auth()->user()->role->doctor_class == 1)
        {
            //praksē piereģistrētie pacienti
            $assigned_patients=auth()->user()->role->patients()->get();
            return view('doctor.index',compact('assigned_patients'));
        }
        else return view('doctor.index');
    }


}
