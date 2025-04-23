<?php

namespace App\Twig\Components\Game\Interaction;

use App\Entity\Character\Player;
use App\Entity\Screen\InteractionScreen;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('InteractionScreen', template: 'game/screen/interaction/_component/_index.html.twig')]
class InteractionComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public Player $character;

    #[LiveProp(writable: true)]
    public InteractionScreen $screen;

    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }
}
