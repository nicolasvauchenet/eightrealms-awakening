<?php

namespace App\Entity\Character;

use App\Entity\Item\CreatureItem;
use App\Repository\Character\CreatureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: CreatureRepository::class)]
class Creature
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

    #[ORM\Column(type: Types::TEXT)]
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
    private ?int $manaMax = null;

    #[ORM\Column]
    private ?int $fortune = null;

    /**
     * @var Collection<int, CreatureItem>
     */
    #[ORM\OneToMany(targetEntity: CreatureItem::class, mappedBy: 'creature', orphanRemoval: true)]
    private Collection $creatureItems;

    /**
     * @var Collection<int, PlayerCreature>
     */
    #[ORM\OneToMany(targetEntity: PlayerCreature::class, mappedBy: 'creature', orphanRemoval: true)]
    private Collection $playerCreatures;

    #[ORM\Column]
    private ?int $damage = null;

    #[ORM\Column]
    private ?int $defense = null;

    #[ORM\Column(length: 255)]
    private ?string $thumb = null;

    public function __construct()
    {
        $this->creatureItems = new ArrayCollection();
        $this->playerCreatures = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
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

    /**
     * @return Collection<int, CreatureItem>
     */
    public function getCreatureItems(): Collection
    {
        return $this->creatureItems;
    }

    public function addCreatureItem(CreatureItem $creatureItem): static
    {
        if (!$this->creatureItems->contains($creatureItem)) {
            $this->creatureItems->add($creatureItem);
            $creatureItem->setCreature($this);
        }

        return $this;
    }

    public function removeCreatureItem(CreatureItem $creatureItem): static
    {
        if ($this->creatureItems->removeElement($creatureItem)) {
            // set the owning side to null (unless already changed)
            if ($creatureItem->getCreature() === $this) {
                $creatureItem->setCreature(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PlayerCreature>
     */
    public function getPlayerCreatures(): Collection
    {
        return $this->playerCreatures;
    }

    public function addPlayerCreature(PlayerCreature $playerCreature): static
    {
        if (!$this->playerCreatures->contains($playerCreature)) {
            $this->playerCreatures->add($playerCreature);
            $playerCreature->setCreature($this);
        }

        return $this;
    }

    public function removePlayerCreature(PlayerCreature $playerCreature): static
    {
        if ($this->playerCreatures->removeElement($playerCreature)) {
            // set the owning side to null (unless already changed)
            if ($playerCreature->getCreature() === $this) {
                $playerCreature->setCreature(null);
            }
        }

        return $this;
    }

    public function getDamage(): ?int
    {
        return $this->damage;
    }

    public function setDamage(int $damage): static
    {
        $this->damage = $damage;

        return $this;
    }

    public function getDefense(): ?int
    {
        return $this->defense;
    }

    public function setDefense(int $defense): static
    {
        $this->defense = $defense;

        return $this;
    }

    public function getThumb(): ?string
    {
        return $this->thumb;
    }

    public function setThumb(string $thumb): static
    {
        $this->thumb = $thumb;

        return $this;
    }
}
