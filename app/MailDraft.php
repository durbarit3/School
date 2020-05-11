<?php

namespace App;

use App\Contract;
use Illuminate\Database\Eloquent\Model;

class MailDraft extends Model
{
    
    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }
    
}
