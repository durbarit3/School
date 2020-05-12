<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Admin;

class Vehicle extends Model
{
    protected $guarded = [];
    
    public function driver()
    {
        return $this->belongsTo(Admin::class, 'driver_id', 'id');
    }
    
}
