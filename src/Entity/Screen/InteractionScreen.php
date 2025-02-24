<?php

namespace App\Entity\Screen;

use App\Entity\Character\Npc;
use App\Repository\Screen\InteractionScreenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InteractionScreenRepository::class)]
#[ORM\Table(name: '`screen_interaction`')]
class InteractionScreen extends Screen
{
    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Npc $npc = null;

    public function getNpc(): ?Npc
    {
        return $this->npc;
    }

    public function setNpc(Npc $npc): static
    {
        $this->npc = $npc;

        return $this;
    }
}
