<?php

declare(strict_types=1);
require_once __DIR__ . '/../../env.php';

use App\Config\DBconect;
use PHPUnit\Framework\TestCase;
use App\Controllers\FilmController;
use PHPUnit\Framework\Attributes\DataProvider;


use App\Models\Film;


class FilmControllerTest extends TestCase
{
    public static function filmProvider(): array
    {
        return [
            [
                $film = new Film(
                    title: "Inception",
                    director: "Christopher Nolan",
                    gender: "Sci-Fi",
                    release_date: 2010,
                    id: 0,
                    link: "https://www.youtube.com/watch?v=RV9L7ui9Cn8",
                    image: "https://m.media-amazon.com/images/M/MV5BMjExMjkwNTQ0Nl5BMl5BanBnXkFtZTcwNTY0OTk1Mw@@._V1_.jpg"
                )
            ]
        ];
    }

    #[DataProvider('filmProvider')]
    public function testCreateFilm(Film $film): void
    {
        $film_serialized = $film->serializar();
        $result = FilmController::create($film_serialized);
        $this->assertEquals(1, $result, "film not created successfully");
    }

    #[DataProvider('filmProvider')]
    public function testModifyFilm(Film $film): void
    {
        $film->setGender("new film gender update");
        $film->setDirector("new director update");
        $film_serialized = $film->serializar();
        $id = $this->maxItem();
        $film_serialized['id'] = $id;
        $result = FilmController::update($film_serialized);
        $this->assertEquals(1, $result, "film not modified successfully");
        $findOne = FilmController::findOne($id);
        $this->assertEquals($film_serialized['title'], $findOne['title']);
    }

    #[DataProvider('filmProvider')]
    public function maxItem(): int
    {
        $sql = "SELECT MAX(id) id FROM films";
        $idMax = DBconect::read($sql);
        return (int)$idMax['id'];
    }
}
