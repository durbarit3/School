<?php

namespace App;

use App\Classes;
use App\Section;
use App\ClassSubject;
use App\ClassTeacher;
use Illuminate\Database\Eloquent\Model;

class ClassSection extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id' ,'id');
    }
    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }

    public function classSubjects()
    {
        return $this->hasMany(ClassSubject::class);
    }
    public function classTeachers()
    {
        return $this->hasMany(ClassTeacher::class);
    }


}
