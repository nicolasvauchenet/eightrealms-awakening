<?php

namespace App\Entity\Screen;

use App\Entity\Character\Npc;
use App\Entity\Dialogue\Dialogue;
use App\Repository\Screen\DialogueScreenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DialogueScreenRepository::class)]
#[ORM\Table(name: '`screen_dialogue`')]
class DialogueScreen extends Screen
{
    #[ORM\ManyToOne]
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
