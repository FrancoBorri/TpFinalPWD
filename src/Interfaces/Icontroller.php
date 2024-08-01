<?php
declare(strict_types=1);

namespace App\Interfaces;

interface Icontroller
{
    static function create(array $params): int;

    static function read(): ?array;

    static function delete(int $id): int;

    static function update(array $register): int;

    static function findOne(int|string $id): ?array;
}