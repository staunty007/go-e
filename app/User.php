<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\CustomerBiodata;
use App\AgentBiodata;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name','email','mobile', 'password','access_token', 'provider', 'provider_id', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * User - Customer Data Relationship
     */
    public function customer()
    {
        return $this->hasOne(CustomerBiodata::class);
    }

    public function agent() {
        return $this->hasOne(AgentBiodata::class);
    }
}
