<?php

namespace App\Entity\Screen;

use App\Entity\Character\Npc;
use App\Repository\Screen\TradeScreenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TradeScreenRepository::class)]
class TradeScreen extends Screen
{
    #[ORM\ManyToOne(inversedBy: 'tradeScreens')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Npc $npc = null;

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
