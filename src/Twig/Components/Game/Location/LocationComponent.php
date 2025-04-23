<?php

namespace App\Twig\Components\Game\Location;

use App\Entity\Character\Player;
use App\Entity\Screen\LocationScreen;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('LocationScreen', template: 'game/screen/location/_component/_index.html.twig')]
class LocationComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public Player $character;

    #[LiveProp(writable: true)]
    public LocationScreen $screen;

    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

}
