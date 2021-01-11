<?php

namespace App\Http\Controllers;

use App\Models\pharmacist;
use App\Models\drug;
use Illuminate\Http\Request;

class pharmacistController extends Controller
{
    //Izmantojot starpprogrammatūru noskaidro vai kontrolieri mēģina izmantot autentificējies un ārsta lomas lietotajs 
    public function __construct()
    {
       $this->middleware('auth')->except([]);
       $this->middleware('pharmacist');
    }

    //farmaceita skata atgriešana
    public function index()
    {
        // valstī pieejamo medikamentu saraksts
        $drugs = drug::latest()->get();
        // aptiekas inventārs
        $available_inventory = auth()->user()->role->inventory()->get();
        return view('pharmacist.index',compact('drugs','available_inventory'));

    }

}
