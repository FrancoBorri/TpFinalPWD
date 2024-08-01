<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Interfaces\ISerializable;

interface IDAO
{
    static function create(ISerializable $serializable): int;

    static function list(): ?array;

    static function modify(ISerializable $serializable): int;

    static function delete(string|int $id): int;

    static function findOne(string|int $id): false|array;
}
