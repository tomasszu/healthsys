<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;


    //atgriež pacienta lietotāja ierkastu (User)
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    //atgriež pacienta ģimenes ārstu
    public function family_doc()
    {
        return $this->belongsTo('App\Models\Doctor','family_doctor_id');
    }


    //atgriež pacientam izrakstītās receptes
    public function prescriptions()
    {
        return $this->hasMany('App\Models\patient_drug');
        //return $this->belongsToMany('App\Models\drug', 'patient_drugs');
    }

    //atgriež pacienta med. vēsturi
    public function history()
    {
        return $this->hasMany('App\Models\medHistory');
    }

    //atgriež pacientam izrakstītos norīkojumus / zīmes
    public function notes()
    {
        return $this->hasMany('App\Models\doctorNote');
    }



}


