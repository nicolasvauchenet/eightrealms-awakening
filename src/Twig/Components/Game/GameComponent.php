<?php

namespace App\Twig\Components\Game;

use App\Entity\Action\Action;
use App\Entity\Character\Player;
use App\Entity\Screen\LocationScreen;
use App\Entity\Screen\Screen;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsLiveComponent('Game', template: 'game/default/_component/_index.html.twig')]
class GameComponent
{
    use DefaultActionTrait;

    public ?Screen $activeScreen = null;

    private string $activeScreenSlug = 'laventure-commence';

    public ?string $activeScreenType = 'cinematic';

    public bool $characterUpdated = false;

    public bool $characterLocationsUpdated = false;

    #[LiveProp(writable: true)]
    public Player $character;

    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    #[postMount]
    public function postMount(): void
    {
        if($this->character->getLocation()) {
            $screen = $this->entityManager->getRepository(LocationScreen::class)->findOneBy(['location' => $this->character->getLocation()]);
            $this->setActiveScreen($screen->getSlug());
        } else {
            $this->activeScreen = $this->entityManager->getRepository(Screen::class)->findOneBy(['slug' => $this->activeScreenSlug]);
        }
    }

    private function setActiveScreen(string $slug): void
    {
        $this->activeScreen = $this->entityManager->getRepository(Screen::class)->findOneBy(['slug' => $slug]);
        $this->activeScreenSlug = $slug;
        $classParts = explode('\\', get_class($this->activeScreen));
        $this->activeScreenType = strtolower(str_replace('Screen', '', end($classParts)));
    }

    #[LiveAction]
    public function changeScreen(#[LiveArg] string $slug): void
    {
        $this->setActiveScreen($slug);
    }

    #[LiveAction]
    public function doAction(#[LiveArg] int $actionId): void
    {
        $action = $this->entityManager->getRepository(Action::class)->find($actionId);

        foreach($action->getEffects() as $effect => $data) {
            if($effect === 'changeLocation') {
                $screen = $this->entityManager->getRepository(LocationScreen::class)->findOneBy(['slug' => $data]);
                $location = $screen->getLocation();

                if($location !== $this->character->getLocation()) {
                    $this->characterLocationsUpdated = true;
                    $this->character->setLocation($location);
                }

                $this->entityManager->persist($this->character);
                $this->entityManager->flush();

                $this->setActiveScreen($screen->getSlug());
            }
        }
    }
}
