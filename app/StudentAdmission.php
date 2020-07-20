<?php

namespace App;

use App\Route;
use App\Vehicle;
use Illuminate\Database\Eloquent\Model;

class StudentAdmission extends Model
{
    public function Classes()
    {
        return $this->belongsTo('App\Classes', 'class', 'id');
    }

    public function Section()
    {
        return $this->belongsTo('App\Section', 'section', 'id')->withDefault();
    }
    
    public function Gender()
    {
        return $this->belongsTo('App\Gender', 'gender', 'id');
    }
    
    public function bloodGroup()
    {
        return $this->belongsTo(BloodGroup::class, 'blood_group');
    }

    public function Category()
    {
        return $this->belongsTo('App\Category', 'category', 'id');
    }

    public function getNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function Class()
    {
        return $this->belongsTo('App\Classes', 'class', 'id');
    }

    
    public function sibling()
    {
        return $this->belongsTo(StudentAdmission::class, 'sibling_student_id');
    }
    
    public function route()
    {
        return $this->belongsTo(Route::class, 'route_id');
    }
    
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
    
    public function feesCollection()
    {
        return $this->hasOne(feesCollection::class, 'student_id');
    }

    public function attendances()
    {
        return $this->hasMany(CurrentDayAttendance::class, 'student_id');
    }
    
    
}
