<?php

namespace App;

use App\Bank;
use App\VoucherHeader;
use Illuminate\Database\Eloquent\Model;

class BankDeposit extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'deleted_status', 'deleted_by', 'deleted_at'];

    
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    public function account()
    {
        return $this->belongsTo(BankAccount::class, 'bank_account_id');
    }

    public function voucherHeader()
    {
        return $this->belongsTo(VoucherHeader::class, 'voucher_header_id', 'id');
    }
    
}
