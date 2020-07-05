<?php

namespace App;

use App\Exam;
use App\Classes;
use App\Section;
use App\Subject;
use App\ExamHall;
use Illuminate\Database\Eloquent\Model;

class ExamSchedule extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'deleted_status', 'deleted_by', 'deleted_at'];
    
    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function examHall()
    {
        return $this->belongsTo(ExamHall::class, 'exam_hall_id');
    }

    public function session()
    {
        return $this->hasMany(Session::class, 'session_id');
    }
    
}
