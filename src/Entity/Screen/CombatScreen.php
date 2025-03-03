<?php

namespace App\Entity\Screen;

use App\Entity\Character\Creature;
use App\Entity\Character\Npc;
use App\Entity\Combat\Combat;
use App\Entity\Location\Location;
use App\Repository\Screen\CombatScreenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CombatScreenRepository::class)]
#[ORM\Table(name: '`screen_combat`')]
class CombatScreen extends Screen
{
    /**
     * @var Collection<int, Combat>
     */
    #[ORM\OneToMany(targetEntity: Combat::class, mappedBy: 'combatScreen', orphanRemoval: true)]
    private Collection $combats;

    public function __construct()
    {
        parent::__construct();
        $this->combats = new ArrayCollection();
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
            $combat->setCombatScreen($this);
        }

        return $this;
    }

    public function removeCombat(Combat $combat): static
    {
        if($this->combats->removeElement($combat)) {
            // set the owning side to null (unless already changed)
            if($combat->getCombatScreen() === $this) {
                $combat->setCombatScreen(null);
            }
        }

        return $this;
    }
}
