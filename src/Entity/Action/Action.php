<?php

namespace App\Entity\Action;

use App\Entity\Screen\Screen;
use App\Repository\Action\ActionRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: ActionRepository::class)]
class Action
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

    #[ORM\Column(nullable: true)]
    private ?array $requirements = null;

    #[ORM\Column(nullable: true)]
    private ?array $effects = null;

    #[ORM\ManyToOne(inversedBy: 'actions')]
    private ?Screen $screen = null;

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

    public function getRequirements(): ?array
    {
        return $this->requirements;
    }

    public function setRequirements(?array $requirements): static
    {
        $this->requirements = $requirements;

        return $this;
    }

    public function getEffects(): ?array
    {
        return $this->effects;
    }

    public function setEffects(?array $effects): static
    {
        $this->effects = $effects;

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
}
