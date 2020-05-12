<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamDistribution extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'deleted_status', 'deleted_by', 'deleted_at'];
}
