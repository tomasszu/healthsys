<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient_drug extends Model
{
    use HasFactory;

    public function drug()
    {
        return $this->belongsTo('App\Models\drug');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }

 }
