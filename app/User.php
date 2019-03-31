<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\CustomerBiodata;
use App\AgentBiodata;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
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
     * User ----- Customer Data Relationship
     */
    public function customer()
    {
        return $this->hasOne(CustomerBiodata::class);
    }

    public function agent() {
        return $this->hasOne(AgentBiodata::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function comments()
    {
        return $this->hasMany(TicketComment::class);
    }

    public function payment() {
        return $this->hasMany(Payment::class);
    }

    public function getJWTIdentifier() {
        return $this->getKey();
    }
    public function getJWTCustomClaims() {
        return [];
    }


    public function store($request)
    {
        return $this->create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'mobile' => $request['mobile'],
            'password' => bcrypt($request['password'])
        ]);
    }


    public function getUserById($user_id)
    {
        return $this->find($user_id);
    }
}
