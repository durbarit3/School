<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded =[];

    public function category()
    {
        return $this->belongsTo('App\InventoryCategory','category_id','id');
    }
    
    public function inventoryIssue()
    {
        return $this->hasMany(InventoryIssue::class, 'item');
    }
}
