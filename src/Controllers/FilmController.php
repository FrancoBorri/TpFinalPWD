<?php

namespace App\Controllers;

use App\Models\Film;
use App\DAOs\FilmDAO;


class FilmController extends ControllerBase
{
    public static function create(array $params): int
    {
        $film = Film::deserializar($params);
        return FilmDAO::create($film);
    }

    public static function update(array $register): int
    {
        $film = Film::deserializar($register);
        return filmDAO::modify($film);
    }

    public static function read(): ?array
    {
        return FilmDAO::list();
    }

    public static function delete(int $id): int
    {
        return FilmDAO::delete($id);
    }

    public static function findOne(int|string $id): ?array
    {
        return FilmDAO::findOne($id);
    }
}