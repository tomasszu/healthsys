<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\patient;

class registrationController extends Controller
{
    public function create()
    {
      return view('registration.create');	
    }

    public function store()
    {
      	
      $this->validate(request(), [
       'name' => 'required',
       'pers_id' => 'required',
       'password' => 'required|confirmed'


      ]);

      $user = new User;
    	$user->name = request('name');
    	$user->pers_id = request('pers_id');
    	$user->password = bcrypt(request('password'));
    	$user->save();

      $patient = new patient;
      $patient->user_id = $user->id;
      $patient->name = request('name');
      $patient->pers_id = request('pers_id');
      $patient->contacts = request('contacts');
      $patient->save();

    	auth()->login($user);

        return redirect('/pacients');
    }

    public function update()
    {
      //dd(request('body'));
      ;
        User::where('id', request('user') )->update(['Permission'=> request('privilige')]);
      return redirect('/profile');
    }
}
