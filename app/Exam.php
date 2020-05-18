<?php

namespace App;

use App\ExamTerm;
use App\ExamSchedule;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'deleted_status', 'deleted_by', 'deleted_at'];
    
    public function term()
    {
        return $this->belongsTo(ExamTerm::class, 'exam_term_id');
    }

    public function exam_schedules()
    {
        return $this->hasMany(ExamSchedule::class, 'id', 'exam_id');
    }
    
}
