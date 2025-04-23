<?php

namespace App\Twig\Components\Map;

use App\Entity\Character\Character;
use App\Entity\Location\Location;
use App\Entity\Screen\LocationScreen;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('Map', template: 'map/_component/_index.html.twig')]
class MapComponent extends AbstractController
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public Character $character;

    #[LiveProp(writable: true)]
    public ?string $back = null;

    #[LiveProp(writable: true)]
    public string $activeContent = 'walk';

    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    #[LiveAction]
    public function setActiveContent(#[LiveArg] string $content): void
    {
        $this->activeContent = $content;
    }

    #[LiveAction]
    public function move(#[LiveArg] int $locationId): RedirectResponse
    {
        $location = $this->entityManager->getRepository(Location::class)->find($locationId);

        return $this->redirectToRoute('app_game_screen_location', [
            'slug' => $location->getSlug(),
        ]);
    }
}
