<?php

namespace App;

use App\Exam;
use App\Classes;
use App\StudentAdmission;
use Illuminate\Database\Eloquent\Model;

class MarkEntires extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'deleted_status', 'deleted_by', 'deleted_at'];

    
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
    
    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
    
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function student()
    {
        return $this->belongsTo(StudentAdmission::class, 'student_id');
    }
    
}
