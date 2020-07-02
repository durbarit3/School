<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamAttendance extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'deleted_status', 'deleted_by', 'deleted_at'];

    public function class()
    {
        return $this->belongsTo('App\Classes');
    }
    
    public function section()
    {
        return $this->belongsTo('App\Section');
    }
    
    public function subject()
    {
        return $this->belongsTo('App\Subject', 'subject_id');
    }
    
    public function student()
    {
        return $this->belongsTo('App\StudentAdmission', 'student_id');
    }
}
