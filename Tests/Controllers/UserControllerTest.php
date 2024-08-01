<?php

declare(strict_types=1);
require_once __DIR__ . '/../../env.php';

use App\config\DBConect;
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
                    userName: "fborri",
                    email: "francoborri11@gmail.com",
                    password: "1234",
                    rol: new Rol(
                         10,
                        "now",
                        "",
                        "admin",
                        1
                    ),
                    id: 1,
                    create_at: "now",
                    update_at: "",
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
        $user_serialized = $user->serializar();
        $user->setPassword("123456789");
        $user->setEmail("fborri@gmail.com");
        $result = UserController::update($user_serialized);
        $this->assertEquals(1, $result, "User not update successfully");
    }

    public function testDeleteUser(User $user): void
    {
        $user_serialized = $user->serializar();
        $result = UserController::delete($user_serialized['userName']);
        $this->assertEquals(1, $result, "User not delete successfully");
    }
}
