<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Izmantojot starpprogrammatūru noskaidro vai kontrolieri mēģina izmantot autentificējies lietotajs 
    public function __construct()
    {
        $this->middleware('auth');
    }

    // novirza lietotāju uz tā lietotāju grupai atbilstošo skatu.
    public function index()
    {
      if(auth()->user()->user_class == 1)
      {
        return redirect('/pacients');
      }
      else if(auth()->user()->user_class == 2)
      {
        return redirect('/arsts');
      }
      else if(auth()->user()->user_class == 3)
      {
        return redirect('/farmaceits');
      }

    }
}
