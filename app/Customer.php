<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

	protected $guarded = [];
	
     public function production()
    {

    	return $this->hasMany('App\Production','customer_id','id');

    }
}
