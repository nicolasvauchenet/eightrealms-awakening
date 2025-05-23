<?php

namespace App\Entity\Riddle;

use App\Repository\Riddle\RiddleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: RiddleRepository::class)]
class Riddle
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

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picture = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $thumbnail = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $characteristic = null;

    #[ORM\Column(nullable: true)]
    private ?int $difficulty = null;

    #[ORM\Column(nullable: true)]
    private ?array $successEffects = null;

    #[ORM\Column(nullable: true)]
    private ?array $failureEffects = null;

    #[ORM\Column]
    private ?bool $repeatOnFailure = null;

    /**
     * @var Collection<int, RiddleTrigger>
     */
    #[ORM\OneToMany(targetEntity: RiddleTrigger::class, mappedBy: 'riddle', orphanRemoval: true)]
    private Collection $riddleTriggers;

    /**
     * @var Collection<int, PlayerRiddle>
     */
    #[ORM\OneToMany(targetEntity: PlayerRiddle::class, mappedBy: 'riddle', orphanRemoval: true)]
    private Collection $playerRiddles;

    /**
     * @var Collection<int, RiddleQuestion>
     */
    #[ORM\OneToMany(targetEntity: RiddleQuestion::class, mappedBy: 'riddle', orphanRemoval: true)]
    private Collection $riddleQuestions;

    public function __construct()
    {
        $this->riddleTriggers = new ArrayCollection();
        $this->playerRiddles = new ArrayCollection();
        $this->riddleQuestions = new ArrayCollection();
    }

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

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?string $thumbnail): static
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

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

    public function getCharacteristic(): ?string
    {
        return $this->characteristic;
    }

    public function setCharacteristic(?string $characteristic): static
    {
        $this->characteristic = $characteristic;

        return $this;
    }

    public function getDifficulty(): ?int
    {
        return $this->difficulty;
    }

    public function setDifficulty(?int $difficulty): static
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getSuccessEffects(): array
    {
        return $this->successEffects;
    }

    public function setSuccessEffects(?array $successEffects): static
    {
        $this->successEffects = $successEffects;

        return $this;
    }

    public function getFailureEffects(): ?array
    {
        return $this->failureEffects;
    }

    public function setFailureEffects(?array $failureEffects): static
    {
        $this->failureEffects = $failureEffects;

        return $this;
    }

    public function isRepeatOnFailure(): ?bool
    {
        return $this->repeatOnFailure;
    }

    public function setRepeatOnFailure(bool $repeatOnFailure): static
    {
        $this->repeatOnFailure = $repeatOnFailure;

        return $this;
    }

    /**
     * @return Collection<int, RiddleTrigger>
     */
    public function getRiddleTriggers(): Collection
    {
        return $this->riddleTriggers;
    }

    public function addRiddleTrigger(RiddleTrigger $riddleTrigger): static
    {
        if(!$this->riddleTriggers->contains($riddleTrigger)) {
            $this->riddleTriggers->add($riddleTrigger);
            $riddleTrigger->setRiddle($this);
        }

        return $this;
    }

    public function removeRiddleTrigger(RiddleTrigger $riddleTrigger): static
    {
        if($this->riddleTriggers->removeElement($riddleTrigger)) {
            // set the owning side to null (unless already changed)
            if($riddleTrigger->getRiddle() === $this) {
                $riddleTrigger->setRiddle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PlayerRiddle>
     */
    public function getPlayerRiddles(): Collection
    {
        return $this->playerRiddles;
    }

    public function addPlayerRiddle(PlayerRiddle $playerRiddle): static
    {
        if(!$this->playerRiddles->contains($playerRiddle)) {
            $this->playerRiddles->add($playerRiddle);
            $playerRiddle->setRiddle($this);
        }

        return $this;
    }

    public function removePlayerRiddle(PlayerRiddle $playerRiddle): static
    {
        if($this->playerRiddles->removeElement($playerRiddle)) {
            // set the owning side to null (unless already changed)
            if($playerRiddle->getRiddle() === $this) {
                $playerRiddle->setRiddle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RiddleQuestion>
     */
    public function getRiddleQuestions(): Collection
    {
        return $this->riddleQuestions;
    }

    public function addRiddleQuestion(RiddleQuestion $riddleQuestion): static
    {
        if(!$this->riddleQuestions->contains($riddleQuestion)) {
            $this->riddleQuestions->add($riddleQuestion);
            $riddleQuestion->setRiddle($this);
        }

        return $this;
    }

    public function removeRiddleQuestion(RiddleQuestion $riddleQuestion): static
    {
        if($this->riddleQuestions->removeElement($riddleQuestion)) {
            // set the owning side to null (unless already changed)
            if($riddleQuestion->getRiddle() === $this) {
                $riddleQuestion->setRiddle(null);
            }
        }

        return $this;
    }

    public function getFirstQuestion(): ?RiddleQuestion
    {
        $questions = $this->getRiddleQuestions()->toArray();

        if(empty($questions)) {
            return null;
        }

        usort($questions, fn(RiddleQuestion $a, RiddleQuestion $b) => $a->getPosition() <=> $b->getPosition());

        return $questions[0] ?? null;
    }
}
