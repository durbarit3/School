<?php

namespace App;

use App\Bank;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'deleted_status', 'deleted_by', 'deleted_at'];

    
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }
    
}
