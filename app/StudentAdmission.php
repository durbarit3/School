<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAdmission extends Model
{


    public function Classes()
    {
        return $this->belongsTo('App\Classes','class','id');
    }

    public function Section()
    {
        return $this->belongsTo('App\Section','section','id')->withDefault();
    }

     public function Gender()
    {
        return $this->belongsTo('App\Gender','gender','id');
    }

    public function Category()
    {
        return $this->belongsTo('App\Category','category','id');
    }

     public function getNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }
    public function thiislsfds($value='')
    {
        return 'test';
    }


}
