<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Doctor as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Doctor extends Authenticatable
{
    use HasFactory, Notifiable;

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function patients()
    {
        if($this->doctor_class = 1)
        {
            return $this->hasMany('App\Models\patient','family_doctor_id');
        }
    }


    public function speciality()
    {
        return $this->belongsTo('App\Models\doctorClass','doctor_class');
    }


}
