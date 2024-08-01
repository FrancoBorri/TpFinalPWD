<?php

namespace App\Models;

use App\DAOs\UserDao;

class AuthUser
{
    public static function validateAccess(string $username, string $password): array
    {
        $user_find = UserDAO::findOne($username);
        if ($user_find != null) {
            #Verify user password with password hash
            if (password_verify($password, $user_find["password"])) {
                $user = User::deserializar($user_find);
                $jwt = $user->createJWT();
                return [
                    "message" => "Correct access",
                    #HTTP 201 -created- confirmed
                    "code" => 201, "jwt" => $jwt
                ];
            } else {
                return [
                    "message" => "Access denied",
                    #403 -prohibited- not authorized
                    "code" => 403
                ];
            }
        } else {
            return ["message" => "User not found"];
        }
    }
}
