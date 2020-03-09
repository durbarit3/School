<?php

namespace App;

use App\RouteVehicle;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    
    public function routeVehicles()
    {
        return $this->hasMany(RouteVehicle::class);
    }
}
