<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
class ApiController extends Controller
{
    /**
     * Gets Logged in User Wallet Balance
     */
    public function getUserWalletBalance($id)
    {
        $user = User::where('id',$id)->first();

        switch($user->role_id) {
            case 2:
                // Customer
                $balance = AgentBiodata::where('user_id',$user->id)->pluck('wallet_balance')->first();
            break;
            default:
                $balance = CustomerBiodata::where('user_id',$user->id)->pluck('wallet_balance')->first();
            break;

        }
        return response()->json($balance);
    }

}
