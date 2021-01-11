<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Doctor as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Doctor extends Authenticatable
{
    use HasFactory, Notifiable;

    // atgriež ārsta lietotāja (User) ierakstu.
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    // atgriež ģimenes ārsta praksē pierakstīos pacientus
    public function patients()
    {
        if($this->doctor_class = 1)
        {
            return $this->hasMany('App\Models\patient','family_doctor_id');
        }
    }


    // atgriež ārsta specializāciju
    public function speciality()
    {
        return $this->belongsTo('App\Models\doctorClass','doctor_class');
    }


}
