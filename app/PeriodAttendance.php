<?php

namespace App;

use App\Classes;
use App\Section;
use App\Subject;
use App\StudentAdmission;
use Illuminate\Database\Eloquent\Model;

class PeriodAttendance extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    
    public function student()
    {
        return $this->belongsTo(StudentAdmission::class, 'student_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    
}
