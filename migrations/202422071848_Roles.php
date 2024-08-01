<?php
declare(strict_types=1);

use App\Config\Migrator;

class Roles extends Migrator
{
    private string $table = 'roles';

    public function up(): void
    {
        $sql = "CREATE TABLE $this->table (
        id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at datetime default NULL,
        description varchar(255) not null unique
        );";
        $this->run($sql);
    }

    public function down(): void
    {
        $sql = "DROP TABLE IF EXISTS $this->table;";
        $this->run($sql);
    }

}