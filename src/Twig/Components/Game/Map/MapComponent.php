<?php

namespace App\Twig\Components\Game\Map;

use App\Entity\Character\Player;
use App\Entity\Location\Location;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsLiveComponent('Map', template: 'game/map/default/_component/_index.html.twig')]
class MapComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public Player $character;

    #[LiveProp(writable: true)]
    public string $activeContent = 'walk';

    #[LiveProp(writable: false)]
    public ?Location $location = null;

    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    #[PostMount]
    public function postMount(): void
    {
        if($this->location === null) {
            $this->setCurrentLocation();
        }
    }

    private function setCurrentLocation(): void
    {
        $this->location = $this->character->getLocation();

        if($this->location->getType() === 'building') {
            $this->location = $this->location->getParent();
        }

        if($this->location->getType() === 'zone') {
            $this->location = $this->location->getParent();
        }
    }

    #[LiveAction]
    public function setActiveContent(#[LiveArg] string $content): void
    {
        $this->activeContent = $content;
    }
}
