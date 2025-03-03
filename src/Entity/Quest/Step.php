<?php

namespace App\Entity\Quest;

use App\Entity\Combat\Combat;
use App\Repository\Quest\StepRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StepRepository::class)]
class Step
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $position = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?array $reward = null;

    #[ORM\ManyToOne(inversedBy: 'steps')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Quest $quest = null;

    /**
     * @var Collection<int, Combat>
     */
    #[ORM\OneToMany(targetEntity: Combat::class, mappedBy: 'step')]
    private Collection $combats;

    public function __construct()
    {
        $this->combats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getReward(): ?array
    {
        return $this->reward;
    }

    public function setReward(?array $reward): static
    {
        $this->reward = $reward;

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

    /**
     * @return Collection<int, Combat>
     */
    public function getCombats(): Collection
    {
        return $this->combats;
    }

    public function addCombat(Combat $combat): static
    {
        if (!$this->combats->contains($combat)) {
            $this->combats->add($combat);
            $combat->setStep($this);
        }

        return $this;
    }

    public function removeCombat(Combat $combat): static
    {
        if ($this->combats->removeElement($combat)) {
            // set the owning side to null (unless already changed)
            if ($combat->getStep() === $this) {
                $combat->setStep(null);
            }
        }

        return $this;
    }
}
