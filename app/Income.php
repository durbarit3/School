<?php

namespace App;

use App\IncomeHeader;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'deleted_status', 'deleted_by', 'deleted_at'];
    public function incomeHeader()
    {
        return $this->belongsTo(IncomeHeader::class);
    }
}
