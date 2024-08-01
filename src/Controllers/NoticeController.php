<?php

namespace App\Controllers;

use App\Models\Notice;
use App\DAOs\NoticeDAO;
use App\DAOs\UserDAO;
use App\Interfaces\Iserializable;

class NoticeController extends ControllerBase
{
    public static function create(array $params): int
    {
        $notice = Notice::deserializar($params);
        return NoticeDAO::create($notice);
    }

    public static function update(array $register): int
    {
        $notice = Notice::deserializar($register);
        return NoticeDAO::modify($notice);
    }

    public static function read(): ?array
    {
        return NoticeDAO::list();
    }

    public static function delete(int $id): int
    {
        return NoticeDAO::delete($id);
    }

    public static function findOne(int|string $id): ?array
    {
        return NoticeDAO::findOne($id);
    }
}