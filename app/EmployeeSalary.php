<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];

    
    public function employee()
    {
        return $this->belongsTo(Admin::class, 'employee_id');
    }
    
}
