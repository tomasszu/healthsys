<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'pers_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    //atgriež lietotājam piesaistītās grupas ierakstu (lomu)
    public function role()
    {
        if($this != NULL)
        {
        if($this->user_class == 1)
          {
            return $this->hasOne('App\Models\patient');
          }
        else if($this->user_class == 2)
          {
            return $this->hasOne('App\Models\Doctor');
          }
        else if($this->user_class == 3)
          {
            return $this->hasOne('App\Models\pharmacist');
          }
        }
        else
        {
            return NULL;
        }
    }
}
