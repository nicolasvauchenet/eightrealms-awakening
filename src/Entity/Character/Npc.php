<?php

namespace App\Entity\Character;

use App\Repository\Character\NpcRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NpcRepository::class)]
class Npc extends Character
{
    #[ORM\Column]
    private ?int $level = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pictureAngry = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descriptionAngry = null;

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getPictureAngry(): ?string
    {
        return $this->pictureAngry;
    }

    public function setPictureAngry(?string $pictureAngry): static
    {
        $this->pictureAngry = $pictureAngry;

        return $this;
    }

    public function getDescriptionAngry(): ?string
    {
        return $this->descriptionAngry;
    }

    public function setDescriptionAngry(?string $descriptionAngry): static
    {
        $this->descriptionAngry = $descriptionAngry;

        return $this;
    }
}
