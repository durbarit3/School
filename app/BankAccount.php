<?php

namespace App;

use App\Bank;
use App\BankDeposit;
use App\BankWithdraw;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'deleted_status', 'deleted_by', 'deleted_at'];

    
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    public function bank_deposits()
    {
        return $this->hasMany(BankDeposit::class);
    }
    
    public function bank_withdraws()
    {
        return $this->hasMany(BankWithdraw::class);
    }
    
    
}
