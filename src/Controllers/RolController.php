<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Rol;
use App\DAOs\RolDAO;

class RolController extends ControllerBase
{
    public static function create(array $params): int
    {
        $rol = new Rol(
            description: $params['description'],
            created_at: 'now',
            updated_at: "",
            id: 0,
            is_active: 1
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
