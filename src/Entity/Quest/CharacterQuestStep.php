<?php

namespace App\Entity\Quest;

use App\Entity\Character\Character;
use App\Repository\Quest\CharacterQuestStepRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterQuestStepRepository::class)]
class CharacterQuestStep
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\ManyToOne(inversedBy: 'characterQuestSteps')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Character $character = null;

    #[ORM\ManyToOne(inversedBy: 'characterQuestSteps')]
    #[ORM\JoinColumn(nullable: false)]
    private ?QuestStep $questStep = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getCharacter(): ?Character
    {
        return $this->character;
    }

    public function setCharacter(?Character $character): static
    {
        $this->character = $character;

        return $this;
    }

    public function getQuestStep(): ?QuestStep
    {
        return $this->questStep;
    }

    public function setQuestStep(?QuestStep $questStep): static
    {
        $this->questStep = $questStep;

        return $this;
    }
}
