<?php

namespace App\Models;


use DateTime;

class Notice extends ModelBase
{
    public int $id;
    public string $title;
    public string $content;
    public string $author;
    public ?string $image;

    public function __construct(
        ?int                 $id,
        string               $title,
        string               $author,
        string               $content,
        ?string              $image,
        DateTime|string      $created_at = "now",
        DateTime|string|null $updated_at = "",
        int                  $is_active = 1
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->content = $content;
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
            id: $serializable['id'],
            title: $serializable['title'],
            author: $serializable['author'],
            content: $serializable['content'],
            image: $serializable['image'],
            created_at: $serializable['created_at'],
            updated_at: $serializable['updated_at'],
        );
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
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

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}
