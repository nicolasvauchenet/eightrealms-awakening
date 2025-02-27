<?php

namespace App\Entity\Screen;

use App\Entity\Dialogue\Dialogue;
use App\Repository\Screen\DialogueScreenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DialogueScreenRepository::class)]
#[ORM\Table(name: '`screen_dialogue`')]
class DialogueScreen extends Screen
{
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Dialogue $dialogue = null;

    public function getDialogue(): ?Dialogue
    {
        return $this->dialogue;
    }

    public function setDialogue(?Dialogue $dialogue): static
    {
        $this->dialogue = $dialogue;

        return $this;
    }
}
