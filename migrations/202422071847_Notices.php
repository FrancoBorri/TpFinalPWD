<?php
declare(strict_types=1);

use App\Config\Migrator;

class Notices extends Migrator
{
    private string $table = 'notices';

    public function up(): void
    {
        $sql = "CREATE TABLE $this->table (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR (255) NOT NULL,
            author VARCHAR (255) NOT NULL,
            content TEXT NOT NULL,
            image VARCHAR (255) NOT NULL,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT NULL,
            is_active int(1) NOT NULL DEFAULT 0
        );";
        $this->run($sql);
    }

    public function down(): void
    {
        $sql = "DROP TABLE $this->table;";
        $this->run($sql);
    }
}