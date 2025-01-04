<?php

namespace App\Entity\Quest;

use App\Entity\Item\Item;
use App\Repository\Quest\QuestStepRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: QuestStepRepository::class)]
class QuestStep
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Gedmo\Slug(fields: ['name'])]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picture = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $position = null;

    #[ORM\Column(nullable: true)]
    private ?int $crownReward = null;

    #[ORM\Column(nullable: true)]
    private ?int $xpReward = null;

    #[ORM\ManyToOne(inversedBy: 'questSteps')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Quest $quest = null;

    /**
     * @var Collection<int, Item>
     */
    #[ORM\ManyToMany(targetEntity: Item::class, inversedBy: 'questSteps')]
    private Collection $itemsReward;

    /**
     * @var Collection<int, CharacterQuestStep>
     */
    #[ORM\OneToMany(targetEntity: CharacterQuestStep::class, mappedBy: 'questStep')]
    private Collection $characterQuestSteps;

    public function __construct()
    {
        $this->itemsReward = new ArrayCollection();
        $this->characterQuestSteps = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
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

    public function getCrownReward(): ?int
    {
        return $this->crownReward;
    }

    public function setCrownReward(?int $crownReward): static
    {
        $this->crownReward = $crownReward;

        return $this;
    }

    public function getXpReward(): ?int
    {
        return $this->xpReward;
    }

    public function setXpReward(?int $xpReward): static
    {
        $this->xpReward = $xpReward;

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
     * @return Collection<int, Item>
     */
    public function getItemsReward(): Collection
    {
        return $this->itemsReward;
    }

    public function addItemReward(Item $itemReward): static
    {
        if(!$this->itemsReward->contains($itemReward)) {
            $this->itemsReward->add($itemReward);
        }

        return $this;
    }

    public function removeItemReward(Item $itemReward): static
    {
        $this->itemsReward->removeElement($itemReward);

        return $this;
    }

    /**
     * @return Collection<int, CharacterQuestStep>
     */
    public function getCharacterQuestSteps(): Collection
    {
        return $this->characterQuestSteps;
    }

    public function addCharacterQuestStep(CharacterQuestStep $characterQuestStep): static
    {
        if(!$this->characterQuestSteps->contains($characterQuestStep)) {
            $this->characterQuestSteps->add($characterQuestStep);
            $characterQuestStep->setQuestStep($this);
        }

        return $this;
    }

    public function removeCharacterQuestStep(CharacterQuestStep $characterQuestStep): static
    {
        if($this->characterQuestSteps->removeElement($characterQuestStep)) {
            // set the owning side to null (unless already changed)
            if($characterQuestStep->getQuestStep() === $this) {
                $characterQuestStep->setQuestStep(null);
            }
        }

        return $this;
    }
}
