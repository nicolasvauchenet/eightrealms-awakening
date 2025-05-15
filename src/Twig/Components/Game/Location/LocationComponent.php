<?php

namespace App\Twig\Components\Game\Location;

use App\Entity\Character\Player;
use App\Entity\Riddle\RiddleTrigger;
use App\Entity\Screen\LocationScreen;
use App\Service\Game\Screen\Location\LocationScreenService;
use App\Service\Riddle\RiddleResolverService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsLiveComponent('LocationScreen', template: 'game/screen/location/_component/_index.html.twig')]
class LocationComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public Player $character;

    #[LiveProp(writable: true)]
    public LocationScreen $screen;

    #[LiveProp(writable: true)]
    public string $description = '';

    public function __construct(private readonly EntityManagerInterface $entityManager,
                                private readonly RiddleResolverService  $riddleResolver,
                                private readonly LocationScreenService  $locationScreenService)
    {
    }

    #[PostMount]
    public function postMount(): void
    {
        $this->description = $this->screen->getDescription();
    }

    #[LiveAction]
    public function resolveRiddle(#[LiveArg] int $riddleTriggerId): void
    {
        $riddleTrigger = $this->entityManager->getRepository(RiddleTrigger::class)->find($riddleTriggerId);
        $result = $this->riddleResolver->resolve($this->character, $riddleTrigger);
        $this->description .= $result->log;
        $this->screen = $this->locationScreenService->getScreen($this->character->getCurrentLocation(), $this->character);
    }
}
