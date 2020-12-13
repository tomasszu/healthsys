<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function prescriptions()
    {
        return $this->hasMany('App\Models\patient_drug');
        //return $this->belongsToMany('App\Models\drug', 'patient_drugs');
    }

    public function history()
    {
        return $this->hasMany('App\Models\medHistory');
    }

    public function notes()
    {
        return $this->hasMany('App\Models\doctorNote');
    }



}


