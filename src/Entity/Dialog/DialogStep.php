<?php

namespace App\Entity\Dialog;

use App\Repository\Dialog\DialogStepRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DialogStepRepository::class)]
class DialogStep
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $text = null;

    #[ORM\Column]
    private ?bool $first = null;

    #[ORM\Column(nullable: true)]
    private ?array $conditions = null;

    #[ORM\Column(nullable: true)]
    private ?array $effects = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $redirectToCombat = null;

    #[ORM\ManyToOne(inversedBy: 'dialogSteps')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Dialog $dialog = null;

    /**
     * @var Collection<int, DialogReply>
     */
    #[ORM\OneToMany(targetEntity: DialogReply::class, mappedBy: 'dialogStep', orphanRemoval: true)]
    private Collection $dialogReplies;

    public function __construct()
    {
        $this->dialogReplies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function isFirst(): ?bool
    {
        return $this->first;
    }

    public function setFirst(bool $first): static
    {
        $this->first = $first;

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

    public function getRedirectToCombat(): ?string
    {
        return $this->redirectToCombat;
    }

    public function setRedirectToCombat(?string $redirectToCombat): static
    {
        $this->redirectToCombat = $redirectToCombat;

        return $this;
    }

    public function getDialog(): ?Dialog
    {
        return $this->dialog;
    }

    public function setDialog(?Dialog $dialog): static
    {
        $this->dialog = $dialog;

        return $this;
    }

    /**
     * @return Collection<int, DialogReply>
     */
    public function getDialogReplies(): Collection
    {
        return $this->dialogReplies;
    }

    public function addDialogReply(DialogReply $dialogReply): static
    {
        if (!$this->dialogReplies->contains($dialogReply)) {
            $this->dialogReplies->add($dialogReply);
            $dialogReply->setDialogStep($this);
        }

        return $this;
    }

    public function removeDialogReply(DialogReply $dialogReply): static
    {
        if ($this->dialogReplies->removeElement($dialogReply)) {
            // set the owning side to null (unless already changed)
            if ($dialogReply->getDialogStep() === $this) {
                $dialogReply->setDialogStep(null);
            }
        }

        return $this;
    }
}
