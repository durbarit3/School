<?php

namespace App;

use App\Expanse;
use Illuminate\Database\Eloquent\Model;

class ExpanseHeader extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'deleted_status', 'deleted_by', 'deleted_at'];
    
    public function expanses()
    {
        return $this->hasMany(Expanse::class, 'expanse_header_id');
    }
}
