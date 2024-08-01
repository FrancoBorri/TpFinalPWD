<?php
declare(strict_types=1);

use App\config\Migrator;

class TriggerUpdateRol extends Migrator
{
    public function up(): void
    {
        $sql = "CREATE TRIGGER before_rol_update 
        before UPDATE ON roles 
        FOR EACH ROW 
        begin
            SET new.updated_at = CURRENT_TIMESTAMP ; 
        end;";
        $this->run($sql);
    }

    /**
     * Undo the migration
     */
    public function down(): void
    {
        $sql = "DROP TRIGGER before_rol_update";
        $this->run($sql);
    }
}