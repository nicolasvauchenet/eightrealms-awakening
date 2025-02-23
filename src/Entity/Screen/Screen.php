<?php

namespace App\Entity\Screen;

use App\Entity\Action\Action;
use App\Repository\Screen\ScreenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: ScreenRepository::class)]
#[ORM\InheritanceType('JOINED')]
#[ORM\DiscriminatorColumn(name: 'type', type: 'string')]
#[ORM\DiscriminatorMap(['cinematic' => CinematicScreen::class, 'location' => LocationScreen::class, 'interaction' => InteractionScreen::class, 'dialogue' => DialogueScreen::class, 'trade' => TradeScreen::class, 'combat' => CombatScreen::class])]
abstract class Screen
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

    /**
     * @var Collection<int, Action>
     */
    #[ORM\OneToMany(targetEntity: Action::class, mappedBy: 'screen')]
    private Collection $actions;

    public function __construct()
    {
        $this->actions = new ArrayCollection();
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

    /**
     * @return Collection<int, Action>
     */
    public function getActions(): Collection
    {
        return $this->actions;
    }

    public function addAction(Action $action): static
    {
        if(!$this->actions->contains($action)) {
            $this->actions->add($action);
            $action->setScreen($this);
        }

        return $this;
    }

    public function removeAction(Action $action): static
    {
        if($this->actions->removeElement($action)) {
            // set the owning side to null (unless already changed)
            if($action->getScreen() === $this) {
                $action->setScreen(null);
            }
        }

        return $this;
    }
}
