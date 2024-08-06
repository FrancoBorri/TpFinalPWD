<?php
declare(strict_types=1);

namespace Models;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use App\Models\Film;


class FilmTest extends TestCase
{
    public static function FilmProvider(): array
    {
        return [
            [
                new Film(
                    title: "filmProve",
                    director: "Franco Borri",
                    gender: "action",
                    release_date: 2005,
                    id: 0,
                    link: "linkProve",
                    image: "imageProve",
                    created_at: "now",
                    updated_at: "",
                    is_active: 1
                )
            ]
        ];
    }

    #[DataProvider('FilmProvider')]
    public function testSerialize(Film $film): void
    {
        $serialize = $film->serializar();
        $this->assertEquals('filmProve', $film->getTitle(), "Title incorrect");
        $this->assertEquals(0, $serialize['id'], "Id incorrect");
        $this->assertCount(10, $serialize, "Unexpected amount");
        $this->assertIsArray($serialize, "Unexpected type");
    }
}