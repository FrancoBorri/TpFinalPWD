<?php
declare(strict_types=1);

use App\Config\Migrator;

class TriggerUpdateNotices extends Migrator
{
    public function up(): void
    {
        $sql = "CREATE TRIGGER before_update_notice
        BEFORE UPDATE ON notices
            FOR EACH ROW
        BEGIN
            SET new.updated_at = CURRENT_TIMESTAMP;
        END";
        $this->run($sql);
    }

    public function down(): void
    {
        $sql = "DROP TRIGGER before_update_notice;";
        $this->run($sql);
    }

}