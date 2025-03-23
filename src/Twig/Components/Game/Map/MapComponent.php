<?php

namespace App\Twig\Components\Game\Map;

use App\Entity\Character\Player;
use App\Entity\Combat\Combat;
use App\Entity\Location\Location;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsLiveComponent('Map', template: 'game/map/default/_component/_index.html.twig')]
class MapComponent extends AbstractController
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

        if(sizeof($this->location->getChildren()) === 0) {
            $this->activeContent = 'travel';
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

    #[LiveAction]
    public function walk(#[LiveArg] int $locationId): RedirectResponse
    {
        $location = $this->entityManager->getRepository(Location::class)->find($locationId);

        if($location->getType() === 'location' && !in_array($this->character->getLocation()->getType(), ['plain', 'forest', 'mountain'])) {
            $location = $this->randomEncounter($location);
        }

        $this->character->setLocation($location);
        $this->entityManager->persist($this->character);
        $this->entityManager->flush();

        return $this->redirectToRoute('app_game_home');
    }

    private function randomEncounter(Location $location): Location
    {
        // 25 % de chance de rencontre
        if(random_int(1, 100) <= 25) {
            $availableCombats = $this->entityManager->getRepository(Combat::class)->findBy(['step' => null]);
            foreach($availableCombats as $availableCombat) {
                if(in_array($availableCombat->getLocation()->getType(), ['plain', 'forest', 'mountain'])) {
                    return $availableCombat->getLocation();
                }
            }
        }

        return $location;
    }
}
