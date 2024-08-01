<?php

declare(strict_types=1);

namespace App\Models;

class Rol extends ModelBase
{
    public string $description;

    public function __construct(
        ?int   $id,
        string $created_at,
        string $updated_at,
        string $description,
        int    $is_active = 1,
    ) {
        $this->description = $description;
        parent::__construct(
            id: $id,
            created_at: $created_at,
            updated_at: $updated_at,
            is_active: $is_active
        );
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function serializar(): array
    {
        return array_merge(parent::serializar(), get_object_vars($this));
    }

    static function deserializar(array $serializable): self
    {
        return new self(
            id: $serializable['id'],
            created_at: $serializable['created_at'],
            updated_at: $serializable['updated_at'],
            description: $serializable['description'],
            is_active: $serializable['is_active']
        );
    }
}
