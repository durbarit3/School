<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryIssue extends Model
{
    protected $guarded = [];




    public function inventoryItem()
		{
    		return $this->belongsTo('App\Item','item')->withDefault([
        	'item' => 'Deleted',
    	]);
	}


	public function inventoryCategory()
		{
    		return $this->belongsTo('App\InventoryCategory','category')->withDefault([
        	'category' => 'Deleted',
    	]);
	}


	public function inventoryStudent()
		{
    		return $this->belongsTo('App\StudentAdmission','issueto')->withDefault([
        	'name' => 'Deleted',
    	]);
	}


	public function inventoryAdmin()
		{
    		return $this->belongsTo('App\Admin','issueby')->withDefault([
        	'adminname' => 'Deleted',
    	]);
	}

	public function getIsueReturnAttribute($value)
    {
        return $this->issuedate .' - '.$this->returndate;
    }
}
