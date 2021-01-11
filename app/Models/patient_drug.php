<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient_drug extends Model
{
    use HasFactory;

    //atgriež receptē izrakstīto medikamentu
    public function drug()
    {
        return $this->belongsTo('App\Models\drug');
    }

    //atgriež recepti izrakstošo ārstu
    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }

 }
