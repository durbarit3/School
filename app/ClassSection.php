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
        return $this->belongsTo(Section::class);
    }
    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function classSubjects()
    {
        return $this->hasMany(ClassSubject::class, 'class_section_id');
    }
    public function classTeachers()
    {
        return $this->hasMany(ClassTeacher::class, 'class_section_id');
    }

     public function sections()
    {
        return $this->hasMany(Section::class, 'id','section_id');
    }


}
