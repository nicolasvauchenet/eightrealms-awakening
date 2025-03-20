<?php

namespace App\Entity\Location;

use App\Entity\Character\Npc;
use App\Entity\Combat\Combat;
use App\Repository\Location\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
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
    private ?string $type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picture = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $map = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'children')]
    #[ORM\JoinColumn(onDelete: "SET NULL")]
    private ?self $parent = null;

    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'parent', cascade: ['persist', 'remove'])]
    #[ORM\OrderBy(['id' => 'ASC'])]
    private Collection $children;

    /**
     * @var Collection<int, Npc>
     */
    #[ORM\OneToMany(targetEntity: Npc::class, mappedBy: 'location')]
    #[ORM\OrderBy(['id' => 'ASC'])]
    private Collection $npcs;

    /**
     * @var Collection<int, CreatureLocation>
     */
    #[ORM\OneToMany(targetEntity: CreatureLocation::class, mappedBy: 'location', orphanRemoval: true)]
    private Collection $creatureLocations;

    /**
     * @var Collection<int, Combat>
     */
    #[ORM\OneToMany(targetEntity: Combat::class, mappedBy: 'location', orphanRemoval: true)]
    private Collection $combats;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $thumb = null;

    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->npcs = new ArrayCollection();
        $this->creatureLocations = new ArrayCollection();
        $this->combats = new ArrayCollection();
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

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

    public function getMap(): ?string
    {
        return $this->map;
    }

    public function setMap(?string $map): static
    {
        $this->map = $map;

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

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): static
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function addChild(self $child): static
    {
        if(!$this->children->contains($child)) {
            $this->children->add($child);
            $child->setParent($this);
        }

        return $this;
    }

    public function removeChild(self $child): static
    {
        if($this->children->removeElement($child)) {
            if($child->getParent() === $this) {
                $child->setParent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Npc>
     */
    public function getNpcs(): Collection
    {
        return $this->npcs;
    }

    public function addNpc(Npc $npc): static
    {
        if(!$this->npcs->contains($npc)) {
            $this->npcs->add($npc);
            $npc->setLocation($this);
        }

        return $this;
    }

    public function removeNpc(Npc $npc): static
    {
        if($this->npcs->removeElement($npc)) {
            // set the owning side to null (unless already changed)
            if($npc->getLocation() === $this) {
                $npc->setLocation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CreatureLocation>
     */
    public function getCreatureLocations(): Collection
    {
        return $this->creatureLocations;
    }

    public function addCreatureLocation(CreatureLocation $creatureLocation): static
    {
        if(!$this->creatureLocations->contains($creatureLocation)) {
            $this->creatureLocations->add($creatureLocation);
            $creatureLocation->setLocation($this);
        }

        return $this;
    }

    public function removeCreatureLocation(CreatureLocation $creatureLocation): static
    {
        if($this->creatureLocations->removeElement($creatureLocation)) {
            // set the owning side to null (unless already changed)
            if($creatureLocation->getLocation() === $this) {
                $creatureLocation->setLocation(null);
            }
        }

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
            $combat->setLocation($this);
        }

        return $this;
    }

    public function removeCombat(Combat $combat): static
    {
        if ($this->combats->removeElement($combat)) {
            // set the owning side to null (unless already changed)
            if ($combat->getLocation() === $this) {
                $combat->setLocation(null);
            }
        }

        return $this;
    }

    public function getThumb(): ?string
    {
        return $this->thumb;
    }

    public function setThumb(?string $thumb): static
    {
        $this->thumb = $thumb;

        return $this;
    }
}
