<?php
declare(strict_types=1);

namespace App\DAOs;

use App\Interfaces\Iserializable;
use App\config\DBconect;


class NoticeDAO extends DAO
{
    static public function create(Iserializable $serializable): int
    {
        $params = $serializable->serializar();
        $sql = "INSERT INTO notice (id,title,content,author,image)
        VALUES (:id, :title, :content, :author)";
        $parameters = [
            'id' => $params['id'],
            'title' => $params['title'],
            'content' => $params['content'],
            'author' => $params['author'],
            'image' => $params['image']
        ];
        return DBconect::write($sql, $parameters);
    }

    static public function list(): ?array
    {
        $sql = "SELECT * FROM notice";
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
        $sql = "UPDATE notice 
        SET title =: title, description = :description, content= :content, author = :author, image = :image
        WHERE id = :id";
        $parameters = [
            'id' => $serializable['id'],
            'title' => $serializable['title'],
            'description' => $serializable['description'],
            'content' => $serializable['content'],
            'author' => $serializable['author'],
            'image' => $serializable['image']
        ];
        return DBconect::write($sql, $parameters);
    }

    static public function delete(int|string $id): int
    {
        $sql = "DELETE FROM notice WHERE id = :id";
        $params = [':id' => $id];
        return DBconect::write($sql, $params);
    }

    static public function findOne(string|int $id): false|array
    {
        $sql = "SELECT * FROM notice WHERE id = :id";
        $params = [':id' => $id];
        return DBconect::read($sql, $params);
    }


}