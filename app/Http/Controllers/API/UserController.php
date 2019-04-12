<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use JWTException;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountActivation;

// use JWTFactory;


class UserController extends Controller
{
    // Login for Users
    public function login(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            "email" => 'required|email',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors());
        }

        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return $this->error('Invalid Credentials', 401);
            }
        } catch (JWTException $e) {
            return $this->error('Could Not Create Token',500);
        }

        $response = [
            "user" => $user->getUser(),
            "token" => $token
        ];
        return $this->success($response);
    }


    // Register 
    public function register(Request $request, User $user)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            "first_name" => 'required',
            "last_name" => 'required',
            "email" => "required|email|unique:users",
            "mobile" => 'required',
            "password" => 'required',
            "confirm_password" => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
            // return $this->error($validator->errors());
        }
        
        $user = $user->store($request->all());

        // return $user;

        if($user) {
            try {
                Mail::to($user->email)->send(new AccountActivation($user));
                return $this->success('User Registered Successfully',201);
            } catch (\Throwable $th) {
                return $this->error('Cannot Send Email to User' .$th->getMessage());
            }
        }
        
        return $this->error('Something Went Wrong', 500);
    }


    // Get Single User Resoure
    public function getUser(User $user)
    {
        $user = $user->getUserById($id);
        
        if($user) {
            return $this->success($user);
        }

        return $this->error('The User Resource is Unavailable',404);
    }
}
