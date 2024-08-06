<?php

declare(strict_types=1);
require_once __DIR__ . '/../../env.php';

use App\Config\DBConect;
use App\Controllers\UserController;
use App\Models\User;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use App\Models\Rol;

class UserControllerTest extends TestCase
{
    public static function UserProvider(): array
    {
        return [
            [
                new User(
                    userName: "fborriEma1234567",
                    email: "francoborri647567@gmail.com",
                    password: "1234567",
                    rol: new Rol(
                        'admin',
                        "now",
                        "",
                        1,
                        1
                    ),
                    id: 0,
                    create_at: "now",
                    updated_at: "",
                    isActive: 1
                )
            ]
        ];
    }

    #[DataProvider('UserProvider')]
    public function testCreateUser(User $user): void
    {
        $user_serialized = $user->serializar();
        $result = UserController::create($user_serialized);
        $this->assertEquals(1, $result, "User not created successfully");
    }

    #[dataProvider("UserProvider")]
    public function testModifyUser(User $user): void
    {
        $user->setPassword("123456789");
        $user->setEmail("fborri2025@gmail.com");
        $user_serialized = $user->serializar();
        $result = UserController::update($user_serialized);
        $this->assertEquals(1, $result, "User not update successfully");
    }

    #[dataProvider("UserProvider")]
    public function testDeleteUser(User $user): void
    {
        $user_serialized = $user->serializar();
        $result = UserController::delete($user_serialized['id']);
        $this->assertEquals(1, $result, "User not delete successfully");
    }

    public function maxItem(): int
    {
        $sql = "SELECT MAX(id) id FROM users";
        $idMax = DBconect::read($sql);
        return $idMax['id'];
    }
}
