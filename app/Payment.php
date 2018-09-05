<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Transaction;

class Payment extends Model
{
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
    public function agent_transaction()
    {
        return $this->hasOne(AgentTransaction::class);
    }
}
