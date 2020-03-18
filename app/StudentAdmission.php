<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAdmission extends Model
{


    public function Classes()
    {
        return $this->belongsTo('App\Classes','class','id');
    }

     public function Gender()
    {
        return $this->belongsTo('App\Gender','gender','id');
    }

    public function Category()
    {
        return $this->belongsTo('App\Category','category','id');
    }

}
