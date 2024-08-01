<?php
declare(strict_types=1);

use App\Config\Migrator;

class Films extends Migrator
{
    public string $table = 'films';

    public function up(): void
    {
        $sql = "CREATE TABLE $this->table (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            director VARCHAR(255) NOT NULL,
            gender VARCHAR(50) NOT NULL,
            release_date DATE NOT NULL,
            link VARCHAR(255) NOT NULL,
            image VARCHAR(255) NOT NULL,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT NULL ,
            is_active int(1) NOT NULL DEFAULT 1
       );";
        $this->run($sql);
    }

    public function down(): void
    {
        $sql = "DROP TABLE $this->table;";
        $this->run($sql);
    }
}