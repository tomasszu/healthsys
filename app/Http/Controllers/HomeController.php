<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
