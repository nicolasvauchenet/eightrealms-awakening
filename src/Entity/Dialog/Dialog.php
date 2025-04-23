<?php

namespace App\Entity\Dialog;

use App\Entity\Character\Character;
use App\Repository\Dialog\DialogRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DialogRepository::class)]
class Dialog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(nullable: true)]
    private ?array $conditions = null;

    #[ORM\ManyToOne(inversedBy: 'dialogs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Character $character = null;

    /**
     * @var Collection<int, DialogStep>
     */
    #[ORM\OneToMany(targetEntity: DialogStep::class, mappedBy: 'dialog', orphanRemoval: true)]
    private Collection $dialogSteps;

    public function __construct()
    {
        $this->dialogSteps = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getConditions(): ?array
    {
        return $this->conditions;
    }

    public function setConditions(?array $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    public function getCharacter(): ?Character
    {
        return $this->character;
    }

    public function setCharacter(?Character $character): static
    {
        $this->character = $character;

        return $this;
    }

    /**
     * @return Collection<int, DialogStep>
     */
    public function getDialogSteps(): Collection
    {
        return $this->dialogSteps;
    }

    public function addDialogStep(DialogStep $dialogStep): static
    {
        if (!$this->dialogSteps->contains($dialogStep)) {
            $this->dialogSteps->add($dialogStep);
            $dialogStep->setDialog($this);
        }

        return $this;
    }

    public function removeDialogStep(DialogStep $dialogStep): static
    {
        if ($this->dialogSteps->removeElement($dialogStep)) {
            // set the owning side to null (unless already changed)
            if ($dialogStep->getDialog() === $this) {
                $dialogStep->setDialog(null);
            }
        }

        return $this;
    }
}
