<?php
declare(strict_types=1);

namespace App\helpers;

final class CreateSecurePassword
{
    static public function create($password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}