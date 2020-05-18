<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $guarded = [];
    protected $hidden = ['updated_at', 'deleted_status', 'deleted_by', 'deleted_at'];

    
    
}
