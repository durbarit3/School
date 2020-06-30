<?php

namespace App;

use App\Group;
use App\Gender;
use App\BloodGroup;
use App\EmployeeSalary;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'adminname', 'email','phone','email_verified_at','remember_token','remember_token','verification_code','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isOnline()
    {
        return Cache::has('online'.$this->id);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function bloodGroup()
    {
        return $this->belongsTo(BloodGroup::class);
    }

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class,'id', 'vehicle_id');
    }
    
    public function role()
    {
        return $this->hasOne(Vehicle::class,'id', 'vehicle_id');
    }

    public function salaries()
    {
        return $this->hasMany(EmployeeSalary::class, 'employee_id');
    }
    
    public function leaveApplies()
    {
        return $this->hasMany(LeaveApply::class, 'employee_id');
    }

}
