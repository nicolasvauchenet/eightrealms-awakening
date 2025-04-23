<?php

namespace App\Entity\Combat;

use App\Entity\Location\Location;
use App\Entity\Quest\QuestStep;
use App\Entity\Reward\Reward;
use App\Entity\Screen\CombatScreen;
use App\Repository\Combat\CombatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: CombatRepository::class)]
class Combat
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

    #[ORM\Column(length: 255)]
    private ?string $picture = null;

    #[ORM\Column(length: 255)]
    private ?string $thumbnail = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?array $conditions = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $victoryDescription = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $defeatDescription = null;

    #[ORM\ManyToOne]
    private ?Reward $reward = null;

    #[ORM\ManyToOne(inversedBy: 'combats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $location = null;

    #[ORM\ManyToOne]
    private ?QuestStep $questStep = null;

    /**
     * @var Collection<int, CombatEnemy>
     */
    #[ORM\OneToMany(targetEntity: CombatEnemy::class, mappedBy: 'combat', orphanRemoval: true)]
    private Collection $combatEnemies;

    #[ORM\OneToOne(mappedBy: 'combat', cascade: ['persist', 'remove'])]
    private ?CombatScreen $combatScreen = null;

    public function __construct()
    {
        $this->combatEnemies = new ArrayCollection();
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

    public function setPicture(string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(string $thumbnail): static
    {
        $this->thumbnail = $thumbnail;

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

    public function getConditions(): ?array
    {
        return $this->conditions;
    }

    public function setConditions(?array $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    public function getVictoryDescription(): ?string
    {
        return $this->victoryDescription;
    }

    public function setVictoryDescription(string $victoryDescription): static
    {
        $this->victoryDescription = $victoryDescription;

        return $this;
    }

    public function getDefeatDescription(): ?string
    {
        return $this->defeatDescription;
    }

    public function setDefeatDescription(string $defeatDescription): static
    {
        $this->defeatDescription = $defeatDescription;

        return $this;
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

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): static
    {
        $this->location = $location;

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

    /**
     * @return Collection<int, CombatEnemy>
     */
    public function getCombatEnemies(): Collection
    {
        return $this->combatEnemies;
    }

    public function addCombatEnemy(CombatEnemy $combatEnemy): static
    {
        if(!$this->combatEnemies->contains($combatEnemy)) {
            $this->combatEnemies->add($combatEnemy);
            $combatEnemy->setCombat($this);
        }

        return $this;
    }

    public function removeCombatEnemy(CombatEnemy $combatEnemy): static
    {
        if($this->combatEnemies->removeElement($combatEnemy)) {
            // set the owning side to null (unless already changed)
            if($combatEnemy->getCombat() === $this) {
                $combatEnemy->setCombat(null);
            }
        }

        return $this;
    }

    public function getCombatScreen(): ?CombatScreen
    {
        return $this->combatScreen;
    }

    public function setCombatScreen(CombatScreen $combatScreen): static
    {
        // set the owning side of the relation if necessary
        if($combatScreen->getCombat() !== $this) {
            $combatScreen->setCombat($this);
        }

        $this->combatScreen = $combatScreen;

        return $this;
    }
}
