<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeesMaster extends Model
{
    protected $guarded =[];

    public function comments()
    	{
        	return $this->hasOne('App\FeesGroup','id','group')->withDefault([
        			'name' => 'Deleted',
    		]);
    	}
    
}
