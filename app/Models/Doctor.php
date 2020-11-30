<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Doctor as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Doctor extends Authenticatable
{
    use HasFactory, Notifiable;

    public function patients()
    {
        if($this->doctor_class = 1)
        {
            return $this->hasMany('App\Models\patient','family_doctor_id');
        }
    }

}
