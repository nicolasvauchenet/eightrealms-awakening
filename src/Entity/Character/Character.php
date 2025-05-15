<?php

namespace App\Entity\Character;

use App\Entity\Combat\CombatEnemy;
use App\Entity\Dialog\Dialog;
use App\Entity\Item\CharacterItem;
use App\Entity\Location\CharacterLocation;
use App\Entity\Quest\Quest;
use App\Entity\Quest\QuestStep;
use App\Entity\Screen\InteractionScreen;
use App\Entity\Screen\ReloadScreen;
use App\Entity\Screen\RepairScreen;
use App\Entity\Screen\TradeScreen;
use App\Entity\Spell\CharacterSpell;
use App\Repository\Character\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ORM\InheritanceType('JOINED')]
#[ORM\DiscriminatorColumn(name: 'derivative', type: 'string')]
#[ORM\DiscriminatorMap([
    'preGenerated' => PreGenerated::class,
    'player' => Player::class,
    'npc' => Npc::class,
    'creature' => Creature::class,
])]
abstract class Character
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

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pictureAngry = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $thumbnail = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descriptionAngry = null;

    #[ORM\Column]
    private ?int $strength = null;

    #[ORM\Column]
    private ?int $dexterity = null;

    #[ORM\Column]
    private ?int $constitution = null;

    #[ORM\Column]
    private ?int $wisdom = null;

    #[ORM\Column]
    private ?int $intelligence = null;

    #[ORM\Column]
    private ?int $charisma = null;

    #[ORM\Column]
    private ?int $healthMax = null;

    #[ORM\Column]
    private ?int $manaMax = null;

    #[ORM\Column]
    private ?int $fortune = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Race $race = null;

    #[ORM\ManyToOne]
    private ?Profession $profession = null;

    /**
     * @var Collection<int, CharacterItem>
     */
    #[ORM\OneToMany(targetEntity: CharacterItem::class, mappedBy: 'character', orphanRemoval: true)]
    private Collection $characterItems;

    /**
     * @var Collection<int, CharacterSpell>
     */
    #[ORM\OneToMany(targetEntity: CharacterSpell::class, mappedBy: 'character', orphanRemoval: true)]
    private Collection $characterSpells;

    /**
     * @var Collection<int, CharacterLocation>
     */
    #[ORM\OneToMany(targetEntity: CharacterLocation::class, mappedBy: 'character', orphanRemoval: true)]
    private Collection $characterLocations;

    #[ORM\OneToOne(mappedBy: 'character', cascade: ['persist', 'remove'])]
    private ?InteractionScreen $interactionScreen = null;

    #[ORM\OneToOne(mappedBy: 'character', cascade: ['persist', 'remove'])]
    private ?TradeScreen $tradeScreen = null;

    /**
     * @var Collection<int, Dialog>
     */
    #[ORM\OneToMany(targetEntity: Dialog::class, mappedBy: 'character', orphanRemoval: true)]
    private Collection $dialogs;

    /**
     * @var Collection<int, CombatEnemy>
     */
    #[ORM\OneToMany(targetEntity: CombatEnemy::class, mappedBy: 'enemy', orphanRemoval: true)]
    private Collection $combatEnemies;

    /**
     * @var Collection<int, Quest>
     */
    #[ORM\OneToMany(targetEntity: Quest::class, mappedBy: 'giver')]
    private Collection $quests;

    /**
     * @var Collection<int, QuestStep>
     */
    #[ORM\OneToMany(targetEntity: QuestStep::class, mappedBy: 'giver')]
    private Collection $questSteps;

    #[ORM\OneToOne(mappedBy: 'character', cascade: ['persist', 'remove'])]
    private ?RepairScreen $repairScreen = null;

    #[ORM\OneToOne(mappedBy: 'character', cascade: ['persist', 'remove'])]
    private ?ReloadScreen $reloadScreen = null;

    public function __construct()
    {
        $this->characterItems = new ArrayCollection();
        $this->characterSpells = new ArrayCollection();
        $this->dialogs = new ArrayCollection();
        $this->combatEnemies = new ArrayCollection();
        $this->quests = new ArrayCollection();
        $this->questSteps = new ArrayCollection();
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

    public function getPictureAngry(): ?string
    {
        return $this->pictureAngry;
    }

    public function setPictureAngry(?string $pictureAngry): static
    {
        $this->pictureAngry = $pictureAngry;

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?string $thumbnail): static
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

    public function getDescriptionAngry(): ?string
    {
        return $this->descriptionAngry;
    }

    public function setDescriptionAngry(?string $descriptionAngry): static
    {
        $this->descriptionAngry = $descriptionAngry;

        return $this;
    }

    public function getStrength(): ?int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): static
    {
        $this->strength = $strength;

        return $this;
    }

    public function getDexterity(): ?int
    {
        return $this->dexterity;
    }

    public function setDexterity(int $dexterity): static
    {
        $this->dexterity = $dexterity;

        return $this;
    }

    public function getConstitution(): ?int
    {
        return $this->constitution;
    }

    public function setConstitution(int $constitution): static
    {
        $this->constitution = $constitution;

        return $this;
    }

    public function getWisdom(): ?int
    {
        return $this->wisdom;
    }

    public function setWisdom(int $wisdom): static
    {
        $this->wisdom = $wisdom;

        return $this;
    }

    public function getIntelligence(): ?int
    {
        return $this->intelligence;
    }

    public function setIntelligence(int $intelligence): static
    {
        $this->intelligence = $intelligence;

        return $this;
    }

    public function getCharisma(): ?int
    {
        return $this->charisma;
    }

    public function setCharisma(int $charisma): static
    {
        $this->charisma = $charisma;

        return $this;
    }

    public function getHealthMax(): ?int
    {
        return $this->healthMax;
    }

    public function setHealthMax(int $healthMax): static
    {
        $this->healthMax = $healthMax;

        return $this;
    }

    public function getManaMax(): ?int
    {
        return $this->manaMax;
    }

    public function setManaMax(int $manaMax): static
    {
        $this->manaMax = $manaMax;

        return $this;
    }

    public function getFortune(): ?int
    {
        return $this->fortune;
    }

    public function setFortune(int $fortune): static
    {
        $this->fortune = $fortune;

        return $this;
    }

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): static
    {
        $this->race = $race;

        return $this;
    }

    public function getProfession(): ?Profession
    {
        return $this->profession;
    }

    public function setProfession(?Profession $profession): static
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * @return Collection<int, CharacterItem>
     */
    public function getCharacterItems(): Collection
    {
        $items = $this->characterItems->toArray();

        usort($items, function($a, $b) {
            // 1. Nom de la catégorie
            $aCategory = $a->getItem()->getCategory()->getName();
            $bCategory = $b->getItem()->getCategory()->getName();
            $categoryCompare = strcmp($aCategory, $bCategory);
            if($categoryCompare !== 0) {
                return $categoryCompare;
            }

            // 2. Nom de l’item
            return strcmp($a->getItem()->getName(), $b->getItem()->getName());
        });

        return new ArrayCollection($items);
    }

    public function addCharacterItem(CharacterItem $characterItem): static
    {
        if(!$this->characterItems->contains($characterItem)) {
            $this->characterItems->add($characterItem);
            $characterItem->setCharacter($this);
        }

        return $this;
    }

    public function removeCharacterItem(CharacterItem $characterItem): static
    {
        if($this->characterItems->removeElement($characterItem)) {
            // set the owning side to null (unless already changed)
            if($characterItem->getCharacter() === $this) {
                $characterItem->setCharacter(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CharacterSpell>
     */
    public function getCharacterSpells(): Collection
    {
        return $this->characterSpells;
    }

    public function addCharacterSpell(CharacterSpell $characterSpell): static
    {
        if(!$this->characterSpells->contains($characterSpell)) {
            $this->characterSpells->add($characterSpell);
            $characterSpell->setCharacter($this);
        }

        return $this;
    }

    public function removeCharacterSpell(CharacterSpell $characterSpell): static
    {
        if($this->characterSpells->removeElement($characterSpell)) {
            // set the owning side to null (unless already changed)
            if($characterSpell->getCharacter() === $this) {
                $characterSpell->setCharacter(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CharacterLocation>
     */
    public function getCharacterLocations(): Collection
    {
        return $this->characterLocations;
    }

    public function addCharacterLocation(CharacterLocation $characterLocation): static
    {
        if(!$this->characterLocations->contains($characterLocation)) {
            $this->characterLocations->add($characterLocation);
            $characterLocation->setCharacter($this);
        }

        return $this;
    }

    public function removeCharacterLocation(CharacterLocation $characterLocation): static
    {
        if($this->characterLocations->removeElement($characterLocation)) {
            // set the owning side to null (unless already changed)
            if($characterLocation->getCharacter() === $this) {
                $characterLocation->setCharacter(null);
            }
        }

        return $this;
    }

    public function getInteractionScreen(): ?InteractionScreen
    {
        return $this->interactionScreen;
    }

    public function setInteractionScreen(InteractionScreen $interactionScreen): static
    {
        // set the owning side of the relation if necessary
        if($interactionScreen->getNpc() !== $this) {
            $interactionScreen->setNpc($this);
        }

        $this->interactionScreen = $interactionScreen;

        return $this;
    }

    public function getTradeScreen(): ?TradeScreen
    {
        return $this->tradeScreen;
    }

    public function setTradeScreen(TradeScreen $tradeScreen): static
    {
        // set the owning side of the relation if necessary
        if($tradeScreen->getCharacter() !== $this) {
            $tradeScreen->setCharacter($this);
        }

        $this->tradeScreen = $tradeScreen;

        return $this;
    }

    /**
     * @return Collection<int, Dialog>
     */
    public function getDialogs(): Collection
    {
        return $this->dialogs;
    }

    public function addDialog(Dialog $dialog): static
    {
        if(!$this->dialogs->contains($dialog)) {
            $this->dialogs->add($dialog);
            $dialog->setCharacter($this);
        }

        return $this;
    }

    public function removeDialog(Dialog $dialog): static
    {
        if($this->dialogs->removeElement($dialog)) {
            // set the owning side to null (unless already changed)
            if($dialog->getCharacter() === $this) {
                $dialog->setCharacter(null);
            }
        }

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
            $combatEnemy->setEnemy($this);
        }

        return $this;
    }

    public function removeEnemyCombat(CombatEnemy $combatEnemy): static
    {
        if($this->combatEnemies->removeElement($combatEnemy)) {
            // set the owning side to null (unless already changed)
            if($combatEnemy->getEnemy() === $this) {
                $combatEnemy->setEnemy(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Quest>
     */
    public function getQuests(): Collection
    {
        return $this->quests;
    }

    public function addQuest(Quest $quest): static
    {
        if(!$this->quests->contains($quest)) {
            $this->quests->add($quest);
            $quest->setGiver($this);
        }

        return $this;
    }

    public function removeQuest(Quest $quest): static
    {
        if($this->quests->removeElement($quest)) {
            // set the owning side to null (unless already changed)
            if($quest->getGiver() === $this) {
                $quest->setGiver(null);
            }
        }

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
        if(!$this->questSteps->contains($questStep)) {
            $this->questSteps->add($questStep);
            $questStep->setGiver($this);
        }

        return $this;
    }

    public function removeQuestStep(QuestStep $questStep): static
    {
        if($this->questSteps->removeElement($questStep)) {
            // set the owning side to null (unless already changed)
            if($questStep->getGiver() === $this) {
                $questStep->setGiver(null);
            }
        }

        return $this;
    }

    public function getRepairScreen(): ?RepairScreen
    {
        return $this->repairScreen;
    }

    public function setRepairScreen(RepairScreen $repairScreen): static
    {
        // set the owning side of the relation if necessary
        if($repairScreen->getCharacter() !== $this) {
            $repairScreen->setCharacter($this);
        }

        $this->repairScreen = $repairScreen;

        return $this;
    }

    public function getReloadScreen(): ?ReloadScreen
    {
        return $this->reloadScreen;
    }

    public function setReloadScreen(ReloadScreen $reloadScreen): static
    {
        // set the owning side of the relation if necessary
        if($reloadScreen->getCharacter() !== $this) {
            $reloadScreen->setCharacter($this);
        }

        $this->reloadScreen = $reloadScreen;

        return $this;
    }

    public function getCharacteristicValue(string $characteristic): int
    {
        return match ($characteristic) {
            'strength' => $this->getStrength(),
            'dexterity' => $this->getDexterity(),
            'constitution' => $this->getConstitution(),
            'intelligence' => $this->getIntelligence(),
            'wisdom' => $this->getWisdom(),
            'charisma' => $this->getCharisma(),
            default => 0,
        };
    }
}
