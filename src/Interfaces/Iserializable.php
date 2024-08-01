<?php
declare(strict_types=1);

namespace App\Interfaces;

interface Iserializable
{
    public function serializar(): array;

    static function deserializar(array $serializable): object;
}








