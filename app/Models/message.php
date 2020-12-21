<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;

    public function sender()
    {
        return $this->belongsTo('App\Models\User','from_user');
    }

}
