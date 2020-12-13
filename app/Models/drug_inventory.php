<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class drug_inventory extends Model
{
    use HasFactory;

    public function drug()
    {
        return $this->belongsTo('App\Models\drug');
    }
}
