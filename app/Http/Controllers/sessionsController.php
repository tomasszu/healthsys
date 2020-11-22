<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sessionsController extends Controller
{

	//public function __controller()
    //{
    //  $this->middleware('guest');
    //}

    public function create()
    {
      return view('sessions.create');
    }

    public function store()
    {
      if(! auth()->attempt(request(['pers_id','password'])))
      {
      	return back()->withErrors([
         'message' => 'Invalid passoword or Email'
      	]);
      }

      if(auth()->user()->user_class == 1)
      {
        dd(auth()->user()->role->name);
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

    public function destroy()
    {
    	auth()->logout();

    	return redirect('/');
    }
}
