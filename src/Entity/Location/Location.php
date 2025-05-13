<?php

namespace App\Entity\Location;

use App\Entity\Combat\Combat;
use App\Entity\Item\Map;
use App\Entity\Screen\LocationScreen;
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
    private ?string $picture = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $thumbnail = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descriptionAlt = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'children')]
    #[ORM\JoinColumn(onDelete: "SET NULL")]
    private ?self $parent = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'parent', cascade: ['persist', 'remove'])]
    #[ORM\OrderBy(['id' => 'ASC'])]
    private Collection $children;

    #[ORM\OneToOne(cascade: ['persist'])]
    private ?Map $map = null;

    /**
     * @var Collection<int, CharacterLocation>
     */
    #[ORM\OneToMany(targetEntity: CharacterLocation::class, mappedBy: 'location', orphanRemoval: true)]
    private Collection $characterLocations;

    #[ORM\OneToOne(mappedBy: 'location', cascade: ['persist', 'remove'])]
    private ?LocationScreen $locationScreen = null;

    /**
     * @var Collection<int, Combat>
     */
    #[ORM\OneToMany(targetEntity: Combat::class, mappedBy: 'location', orphanRemoval: true)]
    private Collection $combats;

    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->characterLocations = new ArrayCollection();
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

    public function getDescriptionAlt(): ?string
    {
        return $this->descriptionAlt;
    }

    public function setDescriptionAlt(?string $descriptionAlt): static
    {
        $this->descriptionAlt = $descriptionAlt;

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
            // set the owning side to null (unless already changed)
            if($child->getParent() === $this) {
                $child->setParent(null);
            }
        }

        return $this;
    }

    public function getMap(): ?Map
    {
        return $this->map;
    }

    public function setMap(?Map $map): static
    {
        $this->map = $map;

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
            $characterLocation->setLocation($this);
        }

        return $this;
    }

    public function removeCharacterLocation(CharacterLocation $characterLocation): static
    {
        if($this->characterLocations->removeElement($characterLocation)) {
            // set the owning side to null (unless already changed)
            if($characterLocation->getLocation() === $this) {
                $characterLocation->setLocation(null);
            }
        }

        return $this;
    }

    public function getLocationScreen(): ?LocationScreen
    {
        return $this->locationScreen;
    }

    public function setLocationScreen(LocationScreen $locationScreen): static
    {
        // set the owning side of the relation if necessary
        if($locationScreen->getLocation() !== $this) {
            $locationScreen->setLocation($this);
        }

        $this->locationScreen = $locationScreen;

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
        if(!$this->combats->contains($combat)) {
            $this->combats->add($combat);
            $combat->setLocation($this);
        }

        return $this;
    }

    public function removeCombat(Combat $combat): static
    {
        if($this->combats->removeElement($combat)) {
            // set the owning side to null (unless already changed)
            if($combat->getLocation() === $this) {
                $combat->setLocation(null);
            }
        }

        return $this;
    }
}
