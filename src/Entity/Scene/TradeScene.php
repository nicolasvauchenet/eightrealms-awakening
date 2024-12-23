<?php

namespace App\Entity\Scene;

use App\Entity\Character\Npc;
use App\Repository\Scene\TradeSceneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TradeSceneRepository::class)]
class TradeScene extends Scene
{
    #[ORM\Column]
    private array $sellableItems = [];

    #[ORM\ManyToOne(inversedBy: 'tradeScenes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Npc $npc = null;

    public function getSellableItems(): array
    {
        return $this->sellableItems;
    }

    public function setSellableItems(array $sellableItems): static
    {
        $this->sellableItems = $sellableItems;

        return $this;
    }

    public function getNpc(): ?Npc
    {
        return $this->npc;
    }

    public function setNpc(?Npc $npc): static
    {
        $this->npc = $npc;

        return $this;
    }
}
