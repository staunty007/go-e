<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class CustomerBiodata extends Model
{
    // hidden columns
    protected $hidden = ['user_id','id','created_at','updated_at'];
    // fillable Data
    protected $fillable = ['address','meter_no'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
