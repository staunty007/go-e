<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Payment;

class AgentTransaction extends Model
{
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
