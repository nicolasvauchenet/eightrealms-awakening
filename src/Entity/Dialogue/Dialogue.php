<?php

namespace App\Entity\Dialogue;

use App\Entity\Character\Npc;
use App\Repository\Dialogue\DialogueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DialogueRepository::class)]
class Dialogue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $text = null;

    #[ORM\Column(nullable: true)]
    private ?array $conditions = null;

    #[ORM\Column(nullable: true)]
    private ?array $effects = null;

    #[ORM\ManyToOne(targetEntity: self::class)]
    private ?self $parent = null;

    #[ORM\ManyToOne(inversedBy: 'dialogs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Npc $npc = null;

    /**
     * @var Collection<int, DialogueChoice>
     */
    #[ORM\OneToMany(targetEntity: DialogueChoice::class, mappedBy: 'dialog', orphanRemoval: true)]
    private Collection $dialogueChoices;

    public function __construct()
    {
        $this->dialogueChoices = new ArrayCollection();
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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): static
    {
        $this->text = $text;

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

    public function getEffects(): ?array
    {
        return $this->effects;
    }

    public function setEffects(?array $effects): static
    {
        $this->effects = $effects;

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

    public function getNpc(): ?Npc
    {
        return $this->npc;
    }

    public function setNpc(?Npc $npc): static
    {
        $this->npc = $npc;

        return $this;
    }

    /**
     * @return Collection<int, DialogueChoice>
     */
    public function getDialogueChoices(): Collection
    {
        return $this->dialogueChoices;
    }

    public function addDialogueChoice(DialogueChoice $dialogueChoice): static
    {
        if(!$this->dialogueChoices->contains($dialogueChoice)) {
            $this->dialogueChoices->add($dialogueChoice);
            $dialogueChoice->setDialogue($this);
        }

        return $this;
    }

    public function removeDialogueChoice(DialogueChoice $dialogueChoice): static
    {
        if($this->dialogueChoices->removeElement($dialogueChoice)) {
            // set the owning side to null (unless already changed)
            if($dialogueChoice->getDialogue() === $this) {
                $dialogueChoice->setDialogue(null);
            }
        }

        return $this;
    }
}
