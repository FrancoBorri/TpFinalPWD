<?php
declare(strict_types=1);

namespace App\DAOs;

use App\Config\DBconect;
use App\interfaces\Iserializable;


class FilmDAO extends DAO
{
    static public function create(Iserializable $serializable): int
    {
        $params = $serializable->serializar();
        $sql = "INSERT INTO films (id, title, director, gender, release_date,link,image)
        VALUES (:id, :title, :director, :gender, :release_date, :link, :image)";
        $parameters = [
            'id' => $params['id'],
            'title' => $params['title'],
            'director' => $params['director'],
            'gender' => $params['gender'],
            'release_date' => $params['release_date'],
            'link' => $params['link'],
            'image' => $params['image']
        ];
        return DBconect::write($sql, $parameters);
    }

    static public function list(): ?array
    {
        $sql = "SELECT * FROM films";
        $filmList = [];
        $films = DBconect::read($sql);
        foreach ($films as $film) {
            $filmList[] = $film;
        }
        return $filmList;
    }

    static public function modify(Iserializable $serializable): int
    {
        $params = $serializable->serializar();
        $sql = "UPDATE films
        SET title =:title, director = :director, gender= :gender, release_date= :release_date, link= :link, image= :image
        WHERE id = :id";
        $parameters = [
            'id' => $params['id'],
            'title' => $params['title'],
            'director' => $params['director'],
            'gender' => $params['gender'],
            'release_date' => $params['release_date'],
            'link' => $params['link'],
            'image' => $params['image']
        ];
        return DBconect::write($sql, $parameters);
    }

    static public function delete(int|string $id): int
    {
        $sql = "DELETE FROM films WHERE id = :id";
        $params = [':id' => $id];
        return DBconect::write($sql, $params);
    }

    static public function findOne(string|int $id): false|array
    {
        $sql = "SELECT * FROM films WHERE id = :id";
        $params = [':id' => $id];
        return DBconect::read($sql, $params);
    }
}