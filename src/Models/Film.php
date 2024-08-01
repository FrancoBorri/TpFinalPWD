<?php

namespace App\Models;

use DateTime;

class Film extends ModelBase
{
    public int $id;
    public string $title;
    public string $director;
    public string $gender;
    public int $release_date;
    public string $link;
    public string $image;

    public function __construct(
        string               $title,
        string               $director,
        string               $gender,
        int                  $release_date,
        ?int                 $id,
        string               $link,
        string               $image,
        DateTime|string      $created_at = "now",
        DateTime|string|null $updated_at = "",
        int                  $is_active = 1,
    )
    {
        $this->title = $title;
        $this->director = $director;
        $this->gender = $gender;
        $this->release_date = $release_date;
        $this->link = $link;
        $this->image = $image;
        parent::__construct(
            $id,
            $created_at,
            $updated_at,
            $is_active
        );
    }

    public function serializar(): array
    {
        return array_merge(get_object_vars($this), parent::serializar());
    }

    public static function deserializar(array $serializable): self
    {
        return new self(
            title: $serializable['title'],
            director: $serializable['director'],
            gender: $serializable['gender'],
            release_date: $serializable['release_date'],
            id: $serializable['id'],
            link: $serializable['link'],
            image: $serializable['image'],
            created_at: $serializable['created_at'],
            updated_at: $serializable['updated_at'],
        );
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDirector(): string
    {
        return $this->director;
    }

    public function setDirector(string $director): void
    {
        $this->director = $director;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    public function getReleaseDate(): int
    {
        return $this->release_date;
    }

    public function setReleaseDate(int $release_date): void
    {
        $this->release_date = $release_date;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }
}
