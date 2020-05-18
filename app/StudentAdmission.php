<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAdmission extends Model
{

    
    public function Class()
    {
        return $this->belongsTo('App\Classes','class','id');
    }

    public function Section()
    {
        return $this->belongsTo(Section::class, 'section','id');
    }

    public function Gender()
    {
        return $this->belongsTo('App\Gender','gender','id');
    }

    public function Category()
    {
        return $this->belongsTo('App\Category','category','id');
    }

    public function period_attendances()
    {
        return $this->hasMany(PeriodAttendance::class, 'id', 'student_id');
    }

}
