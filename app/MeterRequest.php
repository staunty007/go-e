<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeterRequest extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email_address',
        'phone_number',
        'home_address',
        'closest_bus_stop',
        'dist_company',
        'district',
        'gender',
        'house_type',
        'meter_type'
    ];


    public function storeRequest($request)
    {
        return $this->create($request);
    }
}
