<?php

namespace App\Entity\Alignment;

use App\Entity\Character\Player;
use App\Repository\Alignment\PlayerAlignmentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerAlignmentRepository::class)]
class PlayerAlignment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?array $markerCounts = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $dominantMarker = null;

    #[ORM\OneToOne(inversedBy: 'playerAlignment', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Player $player = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Alignment $alignment = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarkerCounts(): ?array
    {
        return $this->markerCounts;
    }

    public function setMarkerCounts(?array $markerCounts): static
    {
        $this->markerCounts = $markerCounts;

        return $this;
    }

    public function getDominantMarker(): ?string
    {
        return $this->dominantMarker;
    }

    public function setDominantMarker(?string $dominantMarker): static
    {
        $this->dominantMarker = $dominantMarker;

        return $this;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(Player $player): static
    {
        $this->player = $player;

        return $this;
    }

    public function getAlignment(): ?Alignment
    {
        return $this->alignment;
    }

    public function setAlignment(?Alignment $alignment): static
    {
        $this->alignment = $alignment;

        return $this;
    }

    public function addMarker(string $marker, int $value = 1): void
    {
        $this->markerCounts[$marker] = ($this->markerCounts[$marker] ?? 0) + $value;
        $this->recalculateDominantMarker();
    }

    public function recalculateDominantMarker(): void
    {
        if(empty($this->markerCounts)) {
            $this->dominantMarker = null;

            return;
        }

        arsort($this->markerCounts);
        $this->dominantMarker = array_key_first($this->markerCounts);
    }
}
