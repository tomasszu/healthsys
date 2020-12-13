<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class drug extends Model
{
    use HasFactory;

    public function availability()
    {
        return $this->hasMany('App\Models\drug_inventory');
    }

    public function count()
    {
    	$inventory_records = $this->availability()->get();
    	if($inventory_records->where('pharmacist_id',auth()->user()->role->id)->first() != NULL)
    	{
    		$count = $inventory_records->where('pharmacist_id',auth()->user()->role->id)->first()->count;
    		return $count;
    	}
    	else
    	{
    		return NULL;
    	}
    }
}
