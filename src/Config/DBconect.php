<?php
declare(strict_types=1);

namespace App\Config;

use PDO;
use PDOException;
use Throwable;

class DBconect
{
    static ?PDO $cnx = null;

    static function connectionDB(): ?PDO
    {
        try {
            #127.0.0.1
            $host = "127.0.0.1";
            $db = $_ENV["DB_NAME"];
            $user = $_ENV["DB_USER"];
            $pass = $_ENV["DB_PASS"];
            $dns = "mysql:host=$host;dbname=$db";
            self::$cnx = new PDO($dns, $user, $pass);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return self::$cnx;
    }

    static function read(string $sql, array $params = []): false|array
    {
        try {
            $dbh = self::connectionDB();
            $stmt = $dbh->prepare($sql);
            $stmt->execute($params);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            if (count($results) === 1) {
                return $results[0];
            }
        } catch (Throwable $e) {
            return [
                'error' => [
                    'code' => $e->getCode(),
                    "message" => $e->getMessage()
                ]
            ];
        }
        return $results;
    }

    static function write(string $sql, array $params = []): int
    {
        $dbh = self::connectionDB();
        $stmt = $dbh->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->rowCount();
        self::$cnx = null;
        $stmt->closeCursor();
        return $result;
    }
}