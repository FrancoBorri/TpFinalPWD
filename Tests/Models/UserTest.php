<?php
declare(strict_types=1);

namespace test;
require_once __DIR__ . '/../../env.php';

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use App\Models\User;
use App\Models\Rol;


class UserTest extends TestCase
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

    #[dataProvider('UserProvider')]
    public function testIntance(User $user): void
    {
        $this->assertEquals("fborri", $user->getUserName(), "User name incorrect");
        $this->assertEquals("francoborri11@gmail.com", $user->getEmail(), "Email incorrect");
        $this->assertInstanceOf(Rol::class, $user->getRol(), "Rol incorrect");
    }

    #[dataProvider('UserProvider')]
    public function testSerialize(User $user): void
    {
        $serialized = $user->serializar();
        $this->assertCount(8, $serialized, "unexpected amount");
        $this->assertIsArray($serialized, "unexpected array");
        $this->assertEquals("fborri", $serialized["userName"], "userName incorrect");
        $this->assertEquals(1, $serialized['id'], "id incorrect");
    }

    #[dataProvider('UserProvider')]
    public function testCreateJWT(User $user): void
    {
        $jwt = $user->createJWT();
        $this->assertNotFalse($jwt, "JWT incorrect");
    }


}