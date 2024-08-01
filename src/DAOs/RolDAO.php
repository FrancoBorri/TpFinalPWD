<?php

namespace App\DAOs;

use App\config\DBconect;
use App\Models\Rol;
use App\Interfaces\Iserializable;

class RolDAO extends DAO
{
    static public function create(Iserializable $serializable): int
    {
        $parameters = $serializable->serializar();
        $sql = "INSERT INTO roles (description) VALUES (:description)";
        $params = [
            'description' => $parameters['description'],
        ];
        return DBconect::write($sql, $parameters);
    }

    static public function list(): array
    {
        $sql = "SELECT * FROM description";
        $params = [];
        return DBconect::read($sql, $params);
    }

    static public function modify(Iserializable $serializable): int
    {
        $parameters = $serializable->serializar();
        $sql = "UPDATE roles SET description = :description WHERE id = :id";
        $params = [
            'id' => $parameters['id'],
            'description' => $parameters['description'],
        ];
        return DBconect::write($sql, $params);
    }

    static public function delete(int $id): int
    {
        $sql = "DELETE FROM roles WHERE id = :id";
        $params = [
            'id' => $id,
        ];
        return DBconect::write($sql, $params);
    }

    static public function findOne(string|int $id): false|array
    {
        $sql = "SELECT * FROM roles WHERE id = :id";
        $params = [
            'id' => $id
        ];
        return DBconect::read($sql, $params);
    }


}