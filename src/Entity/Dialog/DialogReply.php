<?php

namespace App\Entity\Dialog;

use App\Repository\Dialog\DialogReplyRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DialogReplyRepository::class)]
class DialogReply
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $text = null;

    #[ORM\Column(nullable: true)]
    private ?array $conditions = null;

    #[ORM\Column(nullable: true)]
    private ?array $effects = null;

    #[ORM\ManyToOne(inversedBy: 'dialogReplies')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DialogStep $dialogStep = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?DialogStep $nextStep = null;

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

    public function getDialogStep(): ?DialogStep
    {
        return $this->dialogStep;
    }

    public function setDialogStep(?DialogStep $dialogStep): static
    {
        $this->dialogStep = $dialogStep;

        return $this;
    }

    public function getNextStep(): ?DialogStep
    {
        return $this->nextStep;
    }

    public function setNextStep(?DialogStep $nextStep): static
    {
        $this->nextStep = $nextStep;

        return $this;
    }
}
