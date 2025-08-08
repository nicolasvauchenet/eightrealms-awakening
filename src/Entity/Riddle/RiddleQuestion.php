<?php

namespace App\Entity\Riddle;

use App\Repository\Riddle\RiddleQuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RiddleQuestionRepository::class)]
class RiddleQuestion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $position = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picture = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $text = null;

    #[ORM\ManyToOne(inversedBy: 'riddleQuestions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Riddle $riddle = null;

    /**
     * @var Collection<int, RiddleChoice>
     */
    #[ORM\OneToMany(targetEntity: RiddleChoice::class, mappedBy: 'riddleQuestion', orphanRemoval: true)]
    #[Orm\OrderBy(['id' => 'ASC'])]
    private Collection $riddleChoices;

    public function __construct()
    {
        $this->riddleChoices = new ArrayCollection();
    }

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

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): static
    {
        $this->picture = $picture;

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

    public function getRiddle(): ?Riddle
    {
        return $this->riddle;
    }

    public function setRiddle(?Riddle $riddle): static
    {
        $this->riddle = $riddle;

        return $this;
    }

    /**
     * @return Collection<int, RiddleChoice>
     */
    public function getRiddleChoices(): Collection
    {
        return $this->riddleChoices;
    }

    public function addRiddleChoice(RiddleChoice $riddleChoice): static
    {
        if (!$this->riddleChoices->contains($riddleChoice)) {
            $this->riddleChoices->add($riddleChoice);
            $riddleChoice->setRiddleQuestion($this);
        }

        return $this;
    }

    public function removeRiddleChoice(RiddleChoice $riddleChoice): static
    {
        if ($this->riddleChoices->removeElement($riddleChoice)) {
            // set the owning side to null (unless already changed)
            if ($riddleChoice->getRiddleQuestion() === $this) {
                $riddleChoice->setRiddleQuestion(null);
            }
        }

        return $this;
    }
}
