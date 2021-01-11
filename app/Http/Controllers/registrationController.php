<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\patient;

class registrationController extends Controller
{
    // reģistrācijas formas atgriešana
    public function create()
    {
      return view('registration.create');	
    }

    // registracijas formas pārbaude un lietotāja saglabāšana
    public function store()
    {
      	
      $this->validate(request(), [
       'name' => 'required',
       'pers_id' => 'required|unique:users',
       'email' => 'required|unique:users',
       'age' => 'required',
       'contacts' => 'required',
       'password' => 'required|confirmed'


      ]);

      // izveido jaunu lietotaju
      $user = new User;
    	$user->name = request('name');
    	$user->pers_id = request('pers_id');
    	$user->password = bcrypt(request('password'));
      $user->email = request('email');
    	$user->save();

      // izveido lietotajam atbilstošu pacienta lomu
      $patient = new patient;
      $patient->user_id = $user->id;
      $patient->age = request('age');      
      $patient->contacts = request('contacts');
      $patient->save();

      // uzreiz pieraksta pacientu
    	auth()->login($user);

        return redirect('/pacients');
    }
}
