<?php

namespace App;

use App\Admin;
use App\LeaveType;
use Illuminate\Database\Eloquent\Model;

class LeaveApply extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'deleted_status', 'deleted_by', 'deleted_at'];

    
    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class);
    } 
    
    public function employee()
    {
        return $this->belongsTo(Admin::class);
    }
    
}
