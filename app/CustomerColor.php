<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerColor extends Model
{
	protected $guarded = [];

    public function customer_color()
    {

    	return $this->belongsTo('App\Customer','customer_id','id');

    }
}
