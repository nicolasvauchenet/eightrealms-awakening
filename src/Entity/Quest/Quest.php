<?php

namespace App\Entity\Quest;

use App\Repository\Quest\QuestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: QuestRepository::class)]
class Quest
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

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    /**
     * @var Collection<int, QuestStep>
     */
    #[ORM\OneToMany(targetEntity: QuestStep::class, mappedBy: 'quest', orphanRemoval: true)]
    private Collection $questSteps;

    public function __construct()
    {
        $this->questSteps = new ArrayCollection();
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, QuestStep>
     */
    public function getQuestSteps(): Collection
    {
        return $this->questSteps;
    }

    public function addQuestStep(QuestStep $questStep): static
    {
        if (!$this->questSteps->contains($questStep)) {
            $this->questSteps->add($questStep);
            $questStep->setQuest($this);
        }

        return $this;
    }

    public function removeQuestStep(QuestStep $questStep): static
    {
        if ($this->questSteps->removeElement($questStep)) {
            // set the owning side to null (unless already changed)
            if ($questStep->getQuest() === $this) {
                $questStep->setQuest(null);
            }
        }

        return $this;
    }
}
