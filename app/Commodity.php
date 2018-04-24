<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    

    public function production()
    {

    	return $this->hasMany('App\Production','commodity_id','id');

    }
}
