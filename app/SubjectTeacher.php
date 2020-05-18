<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Classes;
use App\Section;
use App\Group;
use App\Subject;
use App\Admin;

class SubjectTeacher extends Model
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

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Admin::class, 'teacher_id', 'id');
    }
}
