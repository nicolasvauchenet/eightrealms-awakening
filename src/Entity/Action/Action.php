<?php

namespace App\Entity\Action;

use App\Entity\Scene\Scene;
use App\Entity\Screen\Screen;
use App\Repository\Action\ActionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActionRepository::class)]
#[ORM\InheritanceType('JOINED')]
#[ORM\DiscriminatorColumn(name: 'type', type: 'string')]
#[ORM\DiscriminatorMap(['transition' => TransitionAction::class, 'dialogue' => DialogueAction::class, 'combat' => CombatAction::class, 'trade' => TradeAction::class, 'steal' => StealAction::class])]
abstract class Action
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\ManyToOne(inversedBy: 'actions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Scene $scene = null;

    #[ORM\ManyToOne(inversedBy: 'actions')]
    private ?Scene $targetScene = null;

    #[ORM\ManyToOne(inversedBy: 'actions')]
    private ?Screen $targetScreen = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getScene(): ?Scene
    {
        return $this->scene;
    }

    public function setScene(?Scene $scene): static
    {
        $this->scene = $scene;

        return $this;
    }

    public function getTargetScene(): ?Scene
    {
        return $this->targetScene;
    }

    public function setTargetScene(?Scene $targetScene): static
    {
        $this->targetScene = $targetScene;

        return $this;
    }

    public function getTargetScreen(): ?Screen
    {
        return $this->targetScreen;
    }

    public function setTargetScreen(?Screen $targetScreen): static
    {
        $this->targetScreen = $targetScreen;

        return $this;
    }
}
