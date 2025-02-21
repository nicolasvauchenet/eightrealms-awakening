<?php

namespace App\Entity\Screen;

use App\Entity\Character\Creature;
use App\Entity\Character\Npc;
use App\Entity\Location\Location;
use App\Repository\Screen\CombatScreenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CombatScreenRepository::class)]
class CombatScreen extends Screen
{
    /**
     * @var Collection<int, Npc>
     */
    #[ORM\ManyToMany(targetEntity: Npc::class)]
    private Collection $npcs;

    /**
     * @var Collection<int, Creature>
     */
    #[ORM\ManyToMany(targetEntity: Creature::class)]
    private Collection $creatures;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $location = null;

    public function __construct()
    {
        $this->npcs = new ArrayCollection();
        $this->creatures = new ArrayCollection();
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
        }

        return $this;
    }

    public function removeNpc(Npc $npc): static
    {
        $this->npcs->removeElement($npc);

        return $this;
    }

    /**
     * @return Collection<int, Creature>
     */
    public function getCreatures(): Collection
    {
        return $this->creatures;
    }

    public function addCreature(Creature $creature): static
    {
        if(!$this->creatures->contains($creature)) {
            $this->creatures->add($creature);
        }

        return $this;
    }

    public function removeCreature(Creature $creature): static
    {
        $this->creatures->removeElement($creature);

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
}
