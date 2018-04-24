<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventLogs extends Model
{
    protected $guarded = [];

    public function production()
    {

    	return $this->belongsTo('App\Production');

    }

    public function user()
    {

    	return $this->belongsTo('App\User');

    }

}


