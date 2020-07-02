<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeesCollection extends Model
{
    protected $guarded =[];

    protected $casts = [
        'collection' => 'array',
    ];

    public function getCollectionAttribute($value)
    {
        return json_decode($value, true);
    }

     public function setCollectionAttribute($value)
    {
        $this->attributes['collection'] = json_encode($value);
    }
}
