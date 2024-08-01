<?php

namespace App\Controllers;

use App\DAOs\UserDAO;
use App\Models\User;

class UserController extends ControllerBase
{
    public static function create(array $params): int
    {
        $user = User::deserializar($params);
        return UserDAO::create($user);
    }

    public static function update(array $register): int
    {
        $user = User::deserializar($register);
        return UserDAO::modify($user);
    }

    public static function read(): ?array
    {
        return UserDAO::list();
    }

    public static function delete(int $id): int
    {
        return UserDAO::delete($id);
    }

    public static function findOne(int|string $id): ?array
    {
        return UserDAO::findOne($id);
    }

    public static function checkEmail(string $email): bool
    {
        return UserDAO::checkEmail($email);
    }

    public static function checkUsername(string $username): bool
    {
        return UserDAO::checkUserName($username);
    }
}