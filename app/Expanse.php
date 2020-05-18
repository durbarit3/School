<?php

namespace App;

use App\ExpanseHeader;
use Illuminate\Database\Eloquent\Model;

class Expanse extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'deleted_status', 'deleted_by', 'deleted_at'];
    
    public function ExpanseHeader()
    {
        return $this->belongsTo(ExpanseHeader::class);
    }
}
