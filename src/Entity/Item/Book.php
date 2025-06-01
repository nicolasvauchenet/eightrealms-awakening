<?php

namespace App\Entity\Item;

use App\Repository\Item\BookRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book extends Item
{
    #[ORM\Column(length: 255)]
    private ?string $thumbnail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bookAuthor = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bookCategory = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $bookContent = null;

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(string $thumbnail): static
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function getBookAuthor(): ?string
    {
        return $this->bookAuthor;
    }

    public function setBookAuthor(?string $bookAuthor): static
    {
        $this->bookAuthor = $bookAuthor;

        return $this;
    }

    public function getBookCategory(): ?string
    {
        return $this->bookCategory;
    }

    public function setBookCategory(?string $bookCategory): static
    {
        $this->bookCategory = $bookCategory;

        return $this;
    }

    public function getBookContent(): ?string
    {
        return $this->bookContent;
    }

    public function setBookContent(?string $bookContent): static
    {
        $this->bookContent = $bookContent;

        return $this;
    }
}
