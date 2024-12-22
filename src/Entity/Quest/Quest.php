<?php

namespace App\Entity\Quest;

use App\Entity\Item\Item;
use App\Repository\Quest\QuestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: QuestRepository::class)]
class Quest
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

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column]
    private ?int $xpReward = null;

    #[ORM\Column(nullable: true)]
    private ?int $crownReward = null;

    /**
     * @var Collection<int, Item>
     */
    #[ORM\ManyToMany(targetEntity: Item::class, inversedBy: 'quests')]
    private Collection $itemsReward;

    /**
     * @var Collection<int, QuestStep>
     */
    #[ORM\OneToMany(targetEntity: QuestStep::class, mappedBy: 'quest')]
    private Collection $questSteps;

    /**
     * @var Collection<int, CharacterQuest>
     */
    #[ORM\OneToMany(targetEntity: CharacterQuest::class, mappedBy: 'quest')]
    private Collection $characterQuests;

    public function __construct()
    {
        $this->itemsReward = new ArrayCollection();
        $this->questSteps = new ArrayCollection();
        $this->characterQuests = new ArrayCollection();
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getXpReward(): ?int
    {
        return $this->xpReward;
    }

    public function setXpReward(int $xpReward): static
    {
        $this->xpReward = $xpReward;

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
     * @return Collection<int, QuestStep>
     */
    public function getQuestSteps(): Collection
    {
        return $this->questSteps;
    }

    public function addQuestStep(QuestStep $questStep): static
    {
        if (!$this->questSteps->contains($questStep)) {
            $this->questSteps->add($questStep);
            $questStep->setQuest($this);
        }

        return $this;
    }

    public function removeQuestStep(QuestStep $questStep): static
    {
        if ($this->questSteps->removeElement($questStep)) {
            // set the owning side to null (unless already changed)
            if ($questStep->getQuest() === $this) {
                $questStep->setQuest(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CharacterQuest>
     */
    public function getCharacterQuests(): Collection
    {
        return $this->characterQuests;
    }

    public function addCharacterQuest(CharacterQuest $characterQuest): static
    {
        if (!$this->characterQuests->contains($characterQuest)) {
            $this->characterQuests->add($characterQuest);
            $characterQuest->setQuest($this);
        }

        return $this;
    }

    public function removeCharacterQuest(CharacterQuest $characterQuest): static
    {
        if ($this->characterQuests->removeElement($characterQuest)) {
            // set the owning side to null (unless already changed)
            if ($characterQuest->getQuest() === $this) {
                $characterQuest->setQuest(null);
            }
        }

        return $this;
    }
}
