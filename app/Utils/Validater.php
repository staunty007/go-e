<?php
namespace App\Utils;

class Validater {


    // const REGISTER = $this->types()[1];


    public function types()
    {
        return [
            "VALIDATE_REGISTER" => [
                "first_name" => 'required',
                "last_name" => 'required',
                "email" => "required|email|unique:users",
                "mobile" => 'required|number',
                "password" => 'required|min:6',
                "confirm_password" => 'required|same:password',
                'access_token' => 'sometimes',
                'provider' => 'sometimes',
                'provider_id' => 'sometimes',
                'role_id' => 'sometimes'
            ],
            "VALIDATE_LOGIN" => [
                "email" => 'required|exists:users',
                "password" => 'required'
            ]
        ];
    }


    public static function type($type = "") {
        if($type) {
            return self::type($type);
        }
    }
}