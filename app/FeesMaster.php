<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeesMaster extends Model
{
    protected $guarded =[];

    public function groups()
    	{
        	return $this->hasOne('App\FeesGroup','id','group')->withDefault([
        			'name' => 'Deleted',
    		]);
    	}


    public function feestypes()
    {
        return $this->hasOne('App\FeesType','id','types')->withDefault();
    }
    
}
