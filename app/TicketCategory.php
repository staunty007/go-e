<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{
    protected $fillable = ['name'];
    
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
