<?php

namespace App\Controllers;

use App\Models\AuthUser;

class AuthUserController
{
    public static function validateAccess(string $username, string $password): array
    {
        return AuthUser::validateAccess($username, $password);
    }
}