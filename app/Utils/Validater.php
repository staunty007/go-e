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
                "mobile" => 'required',
                "password" => 'required|min:6',
                "confirm_password" => 'required|same:password',
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