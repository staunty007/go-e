<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Utils\Validater;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
// use JWTFactory;


class UserController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), Validater::type('VALIDATE_LOGIN'));
        if($validator->fails()) {
            return $this->error($validator->errors());
        }

        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return $this->success($token);
    }


    // Register 
    public function register(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), Validater::type('VALIDATE_REGISTER'));
        if ($validator->fails()) {
            return $this->success($validator->errors());
        }
        
        $user = $user->store($request->all());
        
        return $this->success('User Registered Successfully');
    }


    // Get Single User Resoure
    public function getUser($id, User $user)
    {
        $user = $user->getUserById($id);
        if($user) {
            return $this->success($user);
        }

        return $this->error('The User Resource is Unavailable');
    }
}
