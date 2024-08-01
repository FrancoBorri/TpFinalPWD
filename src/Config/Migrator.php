<?php
declare(strict_types=1);

namespace App\Config;

#composer require davedevelopment/phpmig
use Phpmig\Migration\Migration;

class Migrator extends Migration
{
    public function run(string $sql): void
    {
        #access to dependencies of Migration
        $container = $this->getContainer();
        #access to database connection
        $db = $container['db'];
        $db->query('SET FOREIGN_KEY_CHECKS=0;');
        #execute query and return a object PDO statement
        $statement = $db->query($sql);
        #enable foreign key checks
        $db->query('SET FOREIGN_KEY_CHECKS=1;');
        $statement->closeCursor();
    }
}