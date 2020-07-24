<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HostelRoom extends Model
{

	protected $guarded = [];

	public function hostel()
	{
	      return $this->belongsTo('App\Hostel', 'hostel_type', 'id');
	}

	public function room()
	{
	    return $this->belongsTo('App\RoomType', 'room_type', 'id');
	}
   
}
