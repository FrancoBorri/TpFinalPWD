<?php
declare(strict_types=1);

namespace App\helpers;
#_DIR_ return route directory
require_once __DIR__ . '/../../env.php';

#Import library to generate universal unique id
use Ramsey\Uuid\Uuid;

class CreateID
{
    static function createID(): void
    {
        $uuid = Uuid::uuid7();
        printf(
            "UUID: %s\nVersion: %d\n",  # Show:  UUID:(string 0183e3f0-d300-7eca-b6b6-6c4a3b2bfa38),(version 7)
            $uuid->toString(),# %s is a string
            $uuid->getFields()->getVersion() #%d is  integer /  getFields() access to uuid components in this case version

        );
    }
}

CreateID::createID();
