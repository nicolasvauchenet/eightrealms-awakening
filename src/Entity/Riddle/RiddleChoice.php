<?php

namespace App\Entity\Riddle;

use App\Repository\Riddle\RiddleChoiceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RiddleChoiceRepository::class)]
class RiddleChoice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $position = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $text = null;

    #[ORM\Column(length: 255)]
    private ?string $marker = null;

    #[ORM\ManyToOne(inversedBy: 'riddleChoices')]
    #[ORM\JoinColumn(nullable: false)]
    private ?RiddleQuestion $riddleQuestion = null;

    #[ORM\ManyToOne]
    private ?RiddleQuestion $nextRiddleQuestion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): static
    {
        $this->position = $position;

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

    public function getMarker(): ?string
    {
        return $this->marker;
    }

    public function setMarker(string $marker): static
    {
        $this->marker = $marker;

        return $this;
    }

    public function getRiddleQuestion(): ?RiddleQuestion
    {
        return $this->riddleQuestion;
    }

    public function setRiddleQuestion(?RiddleQuestion $riddleQuestion): static
    {
        $this->riddleQuestion = $riddleQuestion;

        return $this;
    }

    public function getNextRiddleQuestion(): ?RiddleQuestion
    {
        return $this->nextRiddleQuestion;
    }

    public function setNextRiddleQuestion(?RiddleQuestion $nextRiddleQuestion): static
    {
        $this->nextRiddleQuestion = $nextRiddleQuestion;

        return $this;
    }
}
