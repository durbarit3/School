<?php

namespace App;

use App\ClassSection;
use App\ClassSubject;
use App\Admins;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $guarded = [];
    //protected $table = 'classes';
    protected $hidden = ['created_at', 'updated_at'];

    public function classSections()
    {
        return $this->hasMany(ClassSection::class, 'class_id');
    }

    public function classSubjects()
    {
        return $this->hasMany(ClassSubject::class);
    }

    public function students()
    {
        return $this->hasMany(StudentAdmission::class, 'class_id');
    }

    
}
