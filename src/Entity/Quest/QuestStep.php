<?php

namespace App\Entity\Quest;

use App\Entity\Character\Character;
use App\Entity\Reward\Reward;
use App\Repository\Quest\QuestStepRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestStepRepository::class)]
class QuestStep
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $position = null;

    #[ORM\Column]
    private ?bool $last = null;

    #[ORM\ManyToOne(inversedBy: 'questSteps')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Quest $quest = null;

    #[ORM\ManyToOne]
    private ?Reward $reward = null;

    #[ORM\ManyToOne(inversedBy: 'questSteps')]
    private ?Character $giver = null;

    /**
     * @var Collection<int, QuestStepTrigger>
     */
    #[ORM\OneToMany(targetEntity: QuestStepTrigger::class, mappedBy: 'questStep', orphanRemoval: true)]
    private Collection $questStepTriggers;

    public function __construct()
    {
        $this->questStepTriggers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function isLast(): ?bool
    {
        return $this->last;
    }

    public function setLast(bool $last): static
    {
        $this->last = $last;

        return $this;
    }

    public function getQuest(): ?Quest
    {
        return $this->quest;
    }

    public function setQuest(?Quest $quest): static
    {
        $this->quest = $quest;

        return $this;
    }

    public function isFirst(): bool
    {
        return $this->position === 1;
    }

    public function getReward(): ?Reward
    {
        return $this->reward;
    }

    public function setReward(?Reward $reward): static
    {
        $this->reward = $reward;

        return $this;
    }

    public function getGiver(): ?Character
    {
        return $this->giver;
    }

    public function setGiver(?Character $giver): static
    {
        $this->giver = $giver;

        return $this;
    }

    /**
     * @return Collection<int, QuestStepTrigger>
     */
    public function getQuestStepTriggers(): Collection
    {
        return $this->questStepTriggers;
    }

    public function addQuestStepTrigger(QuestStepTrigger $questStepTrigger): static
    {
        if (!$this->questStepTriggers->contains($questStepTrigger)) {
            $this->questStepTriggers->add($questStepTrigger);
            $questStepTrigger->setQuestStep($this);
        }

        return $this;
    }

    public function removeQuestStepTrigger(QuestStepTrigger $questStepTrigger): static
    {
        if ($this->questStepTriggers->removeElement($questStepTrigger)) {
            // set the owning side to null (unless already changed)
            if ($questStepTrigger->getQuestStep() === $this) {
                $questStepTrigger->setQuestStep(null);
            }
        }

        return $this;
    }
}
