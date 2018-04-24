<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $guarded = [];

    public function commodity()
    {

    	return $this->belongsTo('App\Commodity');

    }

    public function customer()
    {

    	return $this->belongsTo('App\Customer');

    }

     
}
