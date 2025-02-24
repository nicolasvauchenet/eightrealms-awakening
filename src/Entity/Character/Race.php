<?php

namespace App\Entity\Character;

use App\Repository\Character\RaceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: RaceRepository::class)]
class Race
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

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?array $bonusStats = null;

    #[ORM\Column(nullable: true)]
    private ?array $bonusEffects = null;

    #[ORM\Column]
    private ?bool $playable = null;

    #[ORM\Column(length: 255)]
    private ?string $attitude = null;

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

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getBonusStats(): ?array
    {
        return $this->bonusStats;
    }

    public function setBonusStats(?array $bonusStats): static
    {
        $this->bonusStats = $bonusStats;

        return $this;
    }

    public function getBonusEffects(): ?array
    {
        return $this->bonusEffects;
    }

    public function setBonusEffects(?array $bonusEffects): static
    {
        $this->bonusEffects = $bonusEffects;

        return $this;
    }

    public function isPlayable(): ?bool
    {
        return $this->playable;
    }

    public function setPlayable(bool $playable): static
    {
        $this->playable = $playable;

        return $this;
    }

    public function getAttitude(): ?string
    {
        return $this->attitude;
    }

    public function setAttitude(string $attitude): static
    {
        $this->attitude = $attitude;

        return $this;
    }
}
