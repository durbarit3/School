<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LibraryMember extends Model
{
    protected $guarded=[];


    public function students()
    {
        return $this->hasMany(StudentAdmission::class,'id','student_id');
    }
    
    public function student()
    {
        return $this->belongsTo(StudentAdmission::class, 'student_id');
    }

}
