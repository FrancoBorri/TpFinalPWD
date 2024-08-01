<?php
declare(strict_types=1);

use App\Config\Migrator;

class Users extends Migrator
{
    private string $table = 'users';

    public function up(): void
    {
        $sql = "CREATE TABLE $this->table (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
        `is_active` TINYINT(1) NOT NULL DEFAULT 1,
        `username` VARCHAR(100) NOT NULL UNIQUE,
        `email` VARCHAR(255) NOT NULL UNIQUE,
        `password` VARCHAR(255) NOT NULL,
        `id_rol` INT(11) NOT NULL,
         CONSTRAINT PK_USER PRIMARY KEY (`id`)
    );";
        $this->run($sql);
    }

    public function down(): void
    {
        $sql = "DROP TABLE users;";
        $this->run($sql);
    }
}