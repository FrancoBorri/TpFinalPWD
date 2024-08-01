<?php

namespace App\Controllers;

use App\Models\Rol;
use App\DAOs\RolDAO;

class RolController extends ControllerBase
{
    public static function create(array $params): int
    {
        $rol = new Rol(
            id: 0,
            created_at: 'now',
            updated_at: "",
            is_active: 1,
            description: $params['description']
        );
        return RolDAO::create($rol);
    }

    public static function update(array $register): int
    {
        $rol = Rol::deserializar($register);
        return RolDAO::modify($rol);
    }

    public static function read(): ?array
    {
        return RolDAO::list();
    }

    public static function delete(int $id): int
    {
        return RolDAO::delete($id);
    }

    public static function findOne(int|string $id): ?array
    {
        return RolDAO::findOne($id);
    }
}
