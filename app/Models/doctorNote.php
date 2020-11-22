<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctorNote extends Model
{
    use HasFactory;

    public function recepient_doctor()
    {
        return $this->belongsTo('App\Models\Doctor','recepient');
    }

    public function reporting_doctor()
    {
        return $this->belongsTo('App\Models\Doctor','reporting_doctor_id');
    }

}
