<?php

namespace App\Entity\Scene;

use App\Entity\Character\Npc;
use App\Repository\Scene\DialogueSceneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DialogueSceneRepository::class)]
class DialogueScene extends Scene
{
    #[ORM\ManyToOne(inversedBy: 'dialogueScenes')]
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
