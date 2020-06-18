<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subject;

class ClassTimetable extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'deleted_status', 'deleted_by', 'deleted_at'];

    
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Admin::class, 'teacher_id', 'id');
    }

    public function class()
    {
        return $this->belongsTo(classes::class, 'class_id');
    }
    
}
