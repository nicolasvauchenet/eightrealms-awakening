<?php

namespace App\Entity\Item;

use App\Entity\Character\Creature;
use App\Repository\Item\CreatureItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CreatureItemRepository::class)]
class CreatureItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'creatureItems')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Creature $creature = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Item $item = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreature(): ?Creature
    {
        return $this->creature;
    }

    public function setCreature(?Creature $creature): static
    {
        $this->creature = $creature;

        return $this;
    }

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): static
    {
        $this->item = $item;

        return $this;
    }
}
