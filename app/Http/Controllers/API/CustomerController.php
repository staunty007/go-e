<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class CustomerController extends Controller
{
    public function getCustomer(User $user, $id)
    {
        $user = $user->getUserById($id);

        if($user) {
            return $this->success($user);
        }

        return $this->error($user);
    }
}
