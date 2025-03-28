<?php

namespace App\Entity\Character;

use App\Entity\Item\CharacterItem;
use App\Entity\Spell\CharacterSpell;
use App\Repository\Character\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ORM\InheritanceType('JOINED')]
#[ORM\DiscriminatorColumn(name: 'type', type: 'string')]
#[ORM\DiscriminatorMap(['pregenerated' => PreGenerated::class, 'player' => Player::class, 'npc' => Npc::class])]
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

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picture = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

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
    private ?int $health = null;

    #[ORM\Column]
    private ?int $manaMax = null;

    #[ORM\Column]
    private ?int $mana = null;

    #[ORM\Column]
    private ?int $fortune = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Race $race = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Profession $profession = null;

    /**
     * @var Collection<int, CharacterItem>
     */
    #[ORM\OneToMany(targetEntity: CharacterItem::class, mappedBy: 'character', orphanRemoval: true)]
    #[ORM\OrderBy(['item' => 'ASC'])]
    private Collection $characterItems;

    /**
     * @var Collection<int, CharacterSpell>
     */
    #[ORM\OneToMany(targetEntity: CharacterSpell::class, mappedBy: 'character', orphanRemoval: true)]
    #[ORM\OrderBy(['id' => 'ASC'])]
    private Collection $characterSpells;

    public function __construct()
    {
        $this->characterItems = new ArrayCollection();
        $this->characterSpells = new ArrayCollection();
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

    public function getHealth(): ?int
    {
        return $this->health;
    }

    public function setHealth(int $health): static
    {
        $this->health = $health;

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

    public function getMana(): ?int
    {
        return $this->mana;
    }

    public function setMana(int $mana): static
    {
        $this->mana = $mana;

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
        return $this->characterItems;
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
}
