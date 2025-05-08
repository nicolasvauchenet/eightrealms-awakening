<?php

namespace App\Entity\Quest;

use App\Entity\Character\Player;
use App\Repository\Quest\PlayerQuestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerQuestRepository::class)]
class PlayerQuest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\ManyToOne(inversedBy: 'playerQuests')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Player $player = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Quest $quest = null;

    /**
     * @var Collection<int, PlayerQuestStep>
     */
    #[ORM\OneToMany(targetEntity: PlayerQuestStep::class, mappedBy: 'playerQuest', orphanRemoval: true)]
    private Collection $playerQuestSteps;

    public function __construct()
    {
        $this->playerQuestSteps = new ArrayCollection();
    }

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

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): static
    {
        $this->player = $player;

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
     * @return Collection<int, PlayerQuestStep>
     */
    public function getPlayerQuestSteps(): Collection
    {
        return $this->playerQuestSteps;
    }

    public function addPlayerQuestStep(PlayerQuestStep $playerQuestStep): static
    {
        if(!$this->playerQuestSteps->contains($playerQuestStep)) {
            $this->playerQuestSteps->add($playerQuestStep);
            $playerQuestStep->setPlayerQuest($this);
        }

        return $this;
    }

    public function removePlayerQuestStep(PlayerQuestStep $playerQuestStep): static
    {
        if($this->playerQuestSteps->removeElement($playerQuestStep)) {
            // set the owning side to null (unless already changed)
            if($playerQuestStep->getPlayerQuest() === $this) {
                $playerQuestStep->setPlayerQuest(null);
            }
        }

        return $this;
    }
}
