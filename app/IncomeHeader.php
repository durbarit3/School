<?php

namespace App;

use App\Income;
use Illuminate\Database\Eloquent\Model;

class IncomeHeader extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'deleted_status', 'deleted_by', 'deleted_at'];
    
    public function incomes()
    {
        return $this->hasMany(Income::class, 'income_header_id');
    }
}
