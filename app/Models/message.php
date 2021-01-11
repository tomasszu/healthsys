<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;

    //atgriež ziņas sūtītāju
    public function sender()
    {
        return $this->belongsTo('App\Models\User','from_user');
    }

}
