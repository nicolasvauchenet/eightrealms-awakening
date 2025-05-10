<?php

namespace App\Entity\Quest;

use App\Repository\Quest\QuestStepTriggerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestStepTriggerRepository::class)]
class QuestStepTrigger
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column]
    private array $payload = [];

    #[ORM\Column(nullable: true)]
    private ?array $conditions = null;

    #[ORM\ManyToOne(inversedBy: 'questStepTriggers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?QuestStep $questStep = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getPayload(): array
    {
        return $this->payload;
    }

    public function setPayload(array $payload): static
    {
        $this->payload = $payload;

        return $this;
    }

    public function getConditions(): ?array
    {
        return $this->conditions;
    }

    public function setConditions(?array $conditions): static
    {
        $this->conditions = $conditions;

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
