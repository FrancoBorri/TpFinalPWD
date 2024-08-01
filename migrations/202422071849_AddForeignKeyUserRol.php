<?php
declare(strict_types=1);

use App\Config\Migrator;

class AddForeignKeyUserRol extends Migrator
{
    private string $table = "users";

    public function up(): void
    {
        $sql = "ALTER TABLE users ADD CONSTRAINT fk_users_roles
        FOREIGN KEY (id_rol) REFERENCES roles(id);
        ";
        $this->run($sql);
    }

    public function down(): void
    {
        $sql = "ALTER TABLE $this->table DROP constraint fk_users_roles;";
    }

}