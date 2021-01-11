<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sessionsController extends Controller
{
    // atgriež pierakstīšanās formu
    public function create()
    {
      return view('sessions.create');
    }

    // pārbauda pieraksta informāciju un uzsāk sesiju
    public function store()
    {
      if(! auth()->attempt(request(['pers_id','password'])))
      {
      	return back()->withErrors([
         'message' => 'Invalid passoword or Email'
      	]);
      }

      // ja pierakstījušais lietotājs ir pacients
      if(auth()->user()->user_class == 1)
      {
        return redirect('/pacients');
      }
      // ja ārsts
      else if(auth()->user()->user_class == 2)
      {
        return redirect('/arsts');
      }
      // ja farmaceits
      else if(auth()->user()->user_class == 3)
      {
        return redirect('/farmaceits');
      }



    }
    // beigt sesiju darbam ar sistēmu
    public function destroy()
    {
    	auth()->logout();

    	return redirect('/');
    }
}
