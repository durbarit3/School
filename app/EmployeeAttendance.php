<?php

namespace App;

use App\Admin;
use Illuminate\Database\Eloquent\Model;

class EmployeeAttendance extends Model
{
    protected $fillable = ['employee_id', 'role_known_id', 'date', 'month', 'year', 'attendance_status'];
    protected $hidden = ['created_at', 'updated_at'];

    public function employee()
    {
        return $this->belongsTo(Admin::class, 'employee_id');
    }
}
