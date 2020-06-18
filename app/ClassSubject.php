<?php

namespace App;

use App\Section;
use App\Subject;
use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{

    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'deleted_status', 'deleted_by', 'deleted_at', 'prepare_to_update'];
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    
}
