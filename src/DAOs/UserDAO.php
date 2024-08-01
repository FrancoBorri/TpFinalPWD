<?php
declare(strict_types=1);

namespace App\DAOs;

use App\config\DBconect;
use App\Interfaces\Iserializable;


class UserDAO extends DAO
{
    static function create(Iserializable $serializable): int
    {
        $user = $serializable->serializar();
        $sql = "INSERT INTO users (username,password,email,rol)
        VALUES(:username,:password,:email,:rol )";
        $params = [
            ':username' => $user['username'],
            ':password' => $user['password'],
            ':email' => $user['email'],
            ':rol' => $user['rol']['id'],
        ];
        return $result = DBconect::write($sql, $params);
    }

    static function modify(Iserializable $serializable): int
    {
        $serializable = $serializable->serializar();
        $sql = "UPDATE users SET username = :username, password = :password, email = :email, rol = :rol WHERE id = :id";
        $params = [
            ':username' => $serializable['username'],
            ':password' => $serializable['password'],
            ':email' => $serializable['email'],
            ':rol' => $serializable['rol']['id']
        ];
        return DBconect::write($sql, $params);
    }

    static function delete(int|string $id): int
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $params = [':id' => $id];
        return DBconect::write($sql, $params);
    }

    public static function list(): ?array
    {
        $sql = "SELECT * FROM users";
        $userList = [];
        $users = DBconect::read($sql);
        foreach ($users as $user) {
            $user['rol'] = RolDAO::findOne($user['id']);
            $userList[] = $user;
        }
        return $userList;
    }

    public static function findOne(int|string $id): false|array
    {
        $sql = "SELECT * FROM users WHERE username = :id;";
        $param = ['id' => $id];
        $userFind = DBconect::read($sql, $param);
        if (empty($userFind)) {
            return false;
        } else {
            $userFind['rol'] = RolDAO::findOne($userFind['id']);
            return $userFind;
        }
    }

    public static function checkEmail($email): bool
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $params = [':email' => $email];
        $response = DBconect::read($sql, $params);
        if (empty($response)) {
            return false;
        }
        return true;
    }

    public static function checkUsername(string $username): bool
    {
        $sql = "SELECT * FROM users WHERE username = :username";
        $params = [':username' => "$username"];
        $response = DBconect::read($sql, $params);
        if (empty($response)) {
            return false;
        }
        return true;
    }

}