<?php

declare(strict_types=1);

namespace App\Models;

use App\helpers\CreateSecurePassword as Password;
use App\helpers\Create_JWT;

class User extends ModelBase
{
    public int $id;
    private string $userName;
    private string $email;
    private string $password;
    private Rol $rol;
    private string $JWT;

    public function __construct(
        string  $userName,
        string  $email,
        string  $password,
        Rol     $rol,
        ?int    $id,
        string  $create_at,
        ?string $updated_at,
        int     $isActive,
    )
    {
        parent::__construct(
            id: $id,
            created_at: $create_at,
            updated_at: $updated_at,
            is_active: $isActive
        );
        $this->userName = $userName;
        $this->email = $email;
        $this->password = Password::create($password);
        $this->rol = $rol;
    }

    public function serializar(): array
    {
        //properties of this object and the parent
        $serialise = array_merge(get_object_vars($this), parent::serializar());
        $serialise['rol'] = $serialise['rol']->serializar();
        return $serialise;
    }

    public static function deserializar(array $serializable): self
    {
        $rol = Rol::deserializar($serializable['rol']);
        return new self(
            userName: $serializable['userName'],
            email: $serializable['email'],
            password: $serializable['password'],
            rol: $rol,
            id: $serializable['id'],
            create_at: $serializable['created_at'],
            updated_at: $serializable['updated_at'],
            isActive: $serializable['is_active']
        );
    }

    public function createJWT(): string
    {
        return $this->JWT = Create_JWT::create($this);
    }

    public function getJWT(): string|false
    {   #isset return true if $this->JWT is true else return false
        if (isset($this->JWT)) {
            return $this->JWT;
        }
        return false;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = Password::create($password);
    }

    public function getRol(): Rol
    {
        return $this->rol;
    }

    public function setRol(Rol $rol): void
    {
        $this->rol = $rol;
    }
}
