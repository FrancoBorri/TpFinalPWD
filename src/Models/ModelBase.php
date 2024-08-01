<?php

declare(strict_types=1);

namespace App\Models;

use App\Interfaces\Iserializable;
use DateTime;

class ModelBase implements Iserializable
{
    public function __construct(
        private ?int                 $id,
        private string|DateTime      $created_at = "now",
        private string|DateTime|null $updated_at = "",
        private int                  $is_active = 1
    )
    {
        $this->id = $id ?? 0;
        $this->created_at = $created_at ?? new DateTime($created_at);
        $this->updated_at = $updated_at ?? new DateTime($updated_at);
        $this->is_active = $is_active ?? 1;
    }

    public function serializar(): array
    {
        return get_object_vars($this);
    }

    static function deserializar(array $serializable): self
    {
        [$id, $created_at, $updated_at, $is_active] = $serializable;
        return new self(id: $id, created_at: $created_at, updated_at: $updated_at, is_active: $is_active);
    }

    public function getID(): int
    {
        return $this->id;
    }

    public function getIsActive(): int
    {
        return $this->is_active;
    }

    public function setIsActive(int $new_is_active): void
    {
        $this->is_active = $new_is_active;
    }

    public function setUpdated_at(string $updated_at): void
    {
        $this->updated_at = new DateTime($updated_at);
    }
}
