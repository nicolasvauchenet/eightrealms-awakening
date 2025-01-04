<?php

namespace App\Entity\Scene;

use App\Entity\Action\Action;
use App\Entity\Character\PlayerNpc;
use App\Entity\Quest\QuestStep;
use App\Entity\Screen\Screen;
use App\Repository\Scene\SceneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: SceneRepository::class)]
#[ORM\InheritanceType('JOINED')]
#[ORM\DiscriminatorColumn(name: 'type', type: 'string')]
#[ORM\DiscriminatorMap(['cinematic' => CinematicScene::class, 'place' => PlaceScene::class, 'dialogue' => DialogueScene::class, 'combat' => CombatScene::class, 'trade' => TradeScene::class])]
abstract class Scene
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

    #[ORM\Column(nullable: true)]
    private ?int $position = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picture = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'scenes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Screen $screen = null;

    /**
     * @var Collection<int, Action>
     */
    #[ORM\OneToMany(targetEntity: Action::class, mappedBy: 'scene')]
    #[ORM\OrderBy(['id' => 'ASC'])]
    private Collection $actions;

    /**
     * @var Collection<int, CombatSceneCreature>
     */
    #[ORM\OneToMany(targetEntity: CombatSceneCreature::class, mappedBy: 'scene')]
    #[Orm\OrderBy(['id' => 'ASC'])]
    private Collection $combatSceneCreatures;

    /**
     * @var Collection<int, CombatSceneNpc>
     */
    #[ORM\OneToMany(targetEntity: CombatSceneNpc::class, mappedBy: 'scene')]
    #[Orm\OrderBy(['id' => 'ASC'])]
    private Collection $combatSceneNpcs;

    /**
     * @var Collection<int, PlayerNpc>
     */
    #[ORM\OneToMany(targetEntity: PlayerNpc::class, mappedBy: 'scene')]
    #[Orm\OrderBy(['id' => 'ASC'])]
    private Collection $playerNpcs;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?QuestStep $questStep = null;

    public function __construct()
    {
        $this->actions = new ArrayCollection();
        $this->combatSceneCreatures = new ArrayCollection();
        $this->combatSceneNpcs = new ArrayCollection();
        $this->playerNpcs = new ArrayCollection();
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

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): static
    {
        $this->position = $position;

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

    public function getScreen(): ?Screen
    {
        return $this->screen;
    }

    public function setScreen(?Screen $screen): static
    {
        $this->screen = $screen;

        return $this;
    }

    /**
     * @return Collection<int, Action>
     */
    public function getActions(): Collection
    {
        return $this->actions;
    }

    public function addAction(Action $action): static
    {
        if(!$this->actions->contains($action)) {
            $this->actions->add($action);
            $action->setScene($this);
        }

        return $this;
    }

    public function removeAction(Action $action): static
    {
        if($this->actions->removeElement($action)) {
            // set the owning side to null (unless already changed)
            if($action->getScene() === $this) {
                $action->setScene(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CombatSceneCreature>
     */
    public function getCombatSceneCreatures(): Collection
    {
        return $this->combatSceneCreatures;
    }

    public function addCombatSceneCreature(CombatSceneCreature $combatSceneCreature): static
    {
        if(!$this->combatSceneCreatures->contains($combatSceneCreature)) {
            $this->combatSceneCreatures->add($combatSceneCreature);
            $combatSceneCreature->setScene($this);
        }

        return $this;
    }

    public function removeCombatSceneCreature(CombatSceneCreature $combatSceneCreature): static
    {
        if($this->combatSceneCreatures->removeElement($combatSceneCreature)) {
            // set the owning side to null (unless already changed)
            if($combatSceneCreature->getScene() === $this) {
                $combatSceneCreature->setScene(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CombatSceneNpc>
     */
    public function getCombatSceneNpcs(): Collection
    {
        return $this->combatSceneNpcs;
    }

    public function addCombatSceneNpc(CombatSceneNpc $combatSceneNpc): static
    {
        if(!$this->combatSceneNpcs->contains($combatSceneNpc)) {
            $this->combatSceneNpcs->add($combatSceneNpc);
            $combatSceneNpc->setScene($this);
        }

        return $this;
    }

    public function removeCombatSceneNpc(CombatSceneNpc $combatSceneNpc): static
    {
        if($this->combatSceneNpcs->removeElement($combatSceneNpc)) {
            // set the owning side to null (unless already changed)
            if($combatSceneNpc->getScene() === $this) {
                $combatSceneNpc->setScene(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PlayerNpc>
     */
    public function getPlayerNpcs(): Collection
    {
        return $this->playerNpcs;
    }

    public function addPlayerNpc(PlayerNpc $playerNpc): static
    {
        if(!$this->playerNpcs->contains($playerNpc)) {
            $this->playerNpcs->add($playerNpc);
            $playerNpc->setScene($this);
        }

        return $this;
    }

    public function removePlayerNpc(PlayerNpc $playerNpc): static
    {
        if($this->playerNpcs->removeElement($playerNpc)) {
            // set the owning side to null (unless already changed)
            if($playerNpc->getScene() === $this) {
                $playerNpc->setScene(null);
            }
        }

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
