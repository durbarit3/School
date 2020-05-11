<?php

namespace App;

use App\Classes;
use App\Subject;
use App\AttachmentType;
use Illuminate\Database\Eloquent\Model;

class UploadContent extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'deleted_status', 'deleted_by', 'deleted_at'];

    
    public function attachmentType()
    {
        return $this->belongsTo(AttachmentType::class, 'type_id');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    
}
