<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeesCollection extends Model
{
    protected $guarded =[];

    protected $casts = [
        'collection' => 'array',
    ];
}
