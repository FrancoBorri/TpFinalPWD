<?php
declare(strict_types=1);

use App\config\Migrator;

class TriggerUpdateUser extends Migrator
{
    public function up(): void
    {
        $sql = "CREATE TRIGGER before_user_update 
        BEFORE UPDATE ON users 
            FOR EACH ROW 
        BEGIN
            SET new.updated_at = CURRENT_TIMESTAMP; 
        END";
        $this->run($sql);
    }

    public function down(): void
    {
        $sql = "DROP TRIGGER IF EXISTS before_user_update;";
        $this->run($sql);
    }

}