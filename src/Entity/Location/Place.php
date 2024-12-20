<?php

namespace App\Entity\Location;

use App\Entity\Screen\PlaceScreen;
use App\Repository\Location\PlaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: PlaceRepository::class)]
class Place
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
    private ?string $type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picture = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'places')]
    private ?Location $location = null;

    /**
     * @var Collection<int, PlaceScreen>
     */
    #[ORM\OneToMany(targetEntity: PlaceScreen::class, mappedBy: 'place')]
    private Collection $placeScreens;

    public function __construct()
    {
        $this->placeScreens = new ArrayCollection();
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

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

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): static
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return Collection<int, PlaceScreen>
     */
    public function getPlaceScreens(): Collection
    {
        return $this->placeScreens;
    }

    public function addPlaceScreen(PlaceScreen $placeScreen): static
    {
        if (!$this->placeScreens->contains($placeScreen)) {
            $this->placeScreens->add($placeScreen);
            $placeScreen->setPlace($this);
        }

        return $this;
    }

    public function removePlaceScreen(PlaceScreen $placeScreen): static
    {
        if ($this->placeScreens->removeElement($placeScreen)) {
            // set the owning side to null (unless already changed)
            if ($placeScreen->getPlace() === $this) {
                $placeScreen->setPlace(null);
            }
        }

        return $this;
    }
}
