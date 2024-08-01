<?php
declare(strict_types=1);

use App\Config\Migrator;

class AddRoles extends Migrator
{
    private string $table = 'roles';

    public function up(): void
    {
        $sql = "INSERT INTO $this->table (description)
        VALUES ('admin'),('visitor');";
        $this->run($sql);
    }

    public function down(): void
    {
        #delete all registers of the table
        $sql = "TRUNCATE TABLE $this->table;";
        $this->run($sql);
    }
}