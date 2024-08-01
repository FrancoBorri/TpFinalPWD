<?php
declare(strict_types=1);
require_once __DIR__ . '/../../env.php';

use PHPUnit\Framework\TestCase;
use App\config\DBconect;
use App\Controllers\RolController;

class RolControllerTest extends TestCase
{
    public function testCreateRol(): void
    {
        $params = ['description' => 'admin'];
        $result = RolController::create($params);
        $this->assertEquals(1, $result, 'Rol not created successfully');
    }

    public function testModifyRol(): void
    {
        $params = ['description' => 'administrator', 'id' => $this->lastItem()];
        $result = RolController::update($params);
        $this->assertEquals(1, $result, 'Rol not updated successfully');
    }

    public function testDeleteRol(): void
    {
        $result = RolController::delete($this->lastItem());
        $this->assertEquals(1, $result, 'Rol not deleted successfully');
    }

    public function lastItem(): int
    {
        $sql = 'SELECT MAX(id) id from Roles';
        $max = DBConect::read($sql);
        return $max['id'];
    }
}