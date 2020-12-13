<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pharmacist extends Model
{
    use HasFactory;

    public function inventory()
    {
        return $this->hasMany('App\Models\drug_inventory');
    }
}
