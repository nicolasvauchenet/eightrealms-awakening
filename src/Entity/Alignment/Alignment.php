<?php

namespace App\Entity\Alignment;

use App\Repository\Alignment\AlignmentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: AlignmentRepository::class)]
class Alignment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Gedmo\Slug(fields: ['name'])]
    private ?string $slug = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?array $preferredMarkers = null;

    #[ORM\Column(nullable: true)]
    private ?array $rejectedMarkers = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPreferredMarkers(): ?array
    {
        return $this->preferredMarkers;
    }

    public function setPreferredMarkers(?array $preferredMarkers): static
    {
        $this->preferredMarkers = $preferredMarkers;

        return $this;
    }

    public function getRejectedMarkers(): ?array
    {
        return $this->rejectedMarkers;
    }

    public function setRejectedMarkers(?array $rejectedMarkers): static
    {
        $this->rejectedMarkers = $rejectedMarkers;

        return $this;
    }
}
