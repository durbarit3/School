<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookIssue extends Model
{
    protected $guarded =[];

    public function issuebook()
		{
    		return $this->belongsTo('App\LibraryBook','bookid')->withDefault([
        	'book_no' => 'Deleted',
        	'Rack_no' => 'Deleted',
    	]);
	}

}
