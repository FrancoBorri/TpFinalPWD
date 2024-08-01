<?php

declare(strict_types=1);

namespace App\helpers;
#use the class JWT from JWT library
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Models\User;

class Create_JWT
{
    static string $secret_key = "pwd2024";

    static function create(User $user): string
    {
        $username = $user->getUsername();
        $issuer_claim = "pwd2024"; #emisor
        //$audience_claim = "THE_AUDIENCE";
        $issuedat_claim = time(); // issued at
        $notbefore_claim = $issuedat_claim + 10; //not before in seconds
        $expire_claim = $issuedat_claim + 36000; // expire time in seconds
        $token = array(
            "iss" => $issuer_claim,
            //  "aud" => $audience_claim,
            "iat" => $issuedat_claim,
            "nbf" => $notbefore_claim,
            "exp" => $expire_claim,
            "data" => array(
                "username" => $username,
                //"password" => $password
            )
        );
        $jwt = JWT::encode(payload: $token, key: self::$secret_key, alg: "HS256");
        #covert array to json
        return json_encode(
            array(
                "message" => "Successful login.",
                #JWT generated
                "jwt" => $jwt,
                "username" => $username,
                "expireAt" => $expire_claim
            )
        );
    }

    static function check(string $jwt): object
    {
        return JWT::decode(jwt: $jwt, keyOrKeyArray: new Key(self::$secret_key, 'HS256'));
    }

}
