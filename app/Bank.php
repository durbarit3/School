<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'deleted_status', 'deleted_by', 'deleted_at'];


    public function bankAccount()
    {
        return $this->hasMany(BankAccount::class, 'id', 'bank_id');
    }
    
}
