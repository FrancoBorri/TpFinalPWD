<?php
declare(strict_types=1);

namespace App\DAOs;

use App\Interfaces\Iserializable;
use App\Config\DBconect;


class NoticeDAO extends DAO
{
    static public function create(Iserializable $serializable): int
    {
        $params = $serializable->serializar();
        $sql = "INSERT INTO notices (id,title,content,author,image)
        VALUES (:id , :title, :content, :author,:image)";
        $parameters = [
            ':id' => $params['id'],
            'title' => $params['title'],
            'content' => $params['content'],
            'author' => $params['author'],
            'image' => $params['image']
        ];
        return DBconect::write($sql, $parameters);
    }

    static public function list(): ?array
    {
        $sql = "SELECT * FROM notices";
        $noticeList = [];
        $notices = DBconect::read($sql);
        foreach ($notices as $notice) {
            $noticeList[] = $notice;
        }
        return $noticeList;
    }

    static public function modify(Iserializable $serializable): int
    {
        $params = $serializable->serializar();
        $sql = "UPDATE notices
        SET title = :title, content= :content, author = :author, image = :image
        WHERE id = :id";
        $parameters = [
            'id' => $params['id'],
            'title' => $params['title'],
            'content' => $params['content'],
            'author' => $params['author'],
            'image' => $params['image']
        ];
        return DBconect::write($sql, $parameters);
    }

    static public function delete(int|string $id): int
    {
        $sql = "DELETE FROM notices WHERE id = :id";
        $params = [':id' => $id];
        return DBconect::write($sql, $params);
    }

    static public function findOne(string|int $id): false|array
    {
        $sql = "SELECT * FROM notices WHERE id = :id";
        $params = [':id' => $id];
        return DBconect::read($sql, $params);
    }


}