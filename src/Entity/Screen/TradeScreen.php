<?php

namespace App\Entity\Screen;

use App\Entity\Character\Npc;
use App\Repository\Screen\TradeScreenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TradeScreenRepository::class)]
#[ORM\Table(name: '`screen_trade`')]
class TradeScreen extends Screen
{
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Npc $npc = null;

    #[ORM\Column(length: 255)]
    private ?string $tradeType = null;

    public function getNpc(): ?Npc
    {
        return $this->npc;
    }

    public function setNpc(?Npc $npc): static
    {
        $this->npc = $npc;

        return $this;
    }

    public function getTradeType(): ?string
    {
        return $this->tradeType;
    }

    public function setTradeType(string $tradeType): static
    {
        $this->tradeType = $tradeType;

        return $this;
    }
}
