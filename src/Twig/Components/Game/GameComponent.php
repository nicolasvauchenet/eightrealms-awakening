<?php

namespace App\Twig\Components\Game;

use App\Entity\Action\Action;
use App\Entity\Character\Npc;
use App\Entity\Character\Player;
use App\Entity\Character\PlayerNpc;
use App\Entity\Location\PlayerLocation;
use App\Entity\Screen\InteractionScreen;
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

    public ?PlayerNpc $playerNpc = null;

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
    public function doAction(#[LiveArg] ?int $id = null, #[LiveArg] ?string $type = null): void
    {
        if($type) {
            switch($type) {
                case 'interaction':
                    $npc = $this->entityManager->getRepository(Npc::class)->find($id);

                    $playerNpc = null;
                    foreach($this->character->getPlayerNpcs() as $existingPlayerNpc) {
                        if($existingPlayerNpc->getNpc() === $npc) {
                            $playerNpc = $existingPlayerNpc;
                        }
                    }
                    if(!$playerNpc) {
                        $playerNpc = (new PlayerNpc())
                            ->setPlayer($this->character)
                            ->setNpc($npc)
                            ->setHealth($npc->getHealthMax())
                            ->setMana($npc->getManaMax())
                            ->setFortune($npc->getFortune())
                            ->setReputation(0);
                        $this->entityManager->persist($playerNpc);
                        $this->entityManager->flush();
                    }
                    $this->playerNpc = $playerNpc;

                    $screen = $this->entityManager->getRepository(InteractionScreen::class)->findOneBy(['npc' => $npc]);
                    $this->changeScreen($screen->getSlug());
                    break;
                case 'exit':
                    $screen = $this->entityManager->getRepository(LocationScreen::class)->findOneBy(['location' => $this->character->getLocation()]);
                    $this->setActiveScreen($screen->getSlug());
                    break;
                default:
                    break;
            }
        } else {
            $action = $this->entityManager->getRepository(Action::class)->find($id);

            foreach($action->getEffects() as $effect => $data) {
                if($effect === 'changeLocation') {
                    $screen = $this->entityManager->getRepository(LocationScreen::class)->findOneBy(['slug' => $data]);
                    $location = $screen->getLocation();

                    if($location !== $this->character->getLocation()) {
                        $this->characterLocationsUpdated = true;
                        $this->character->setLocation($location);

                        $playerLocationExists = false;
                        foreach($this->character->getPlayerLocations() as $playerLocation) {
                            if($playerLocation === $location) {
                                $playerLocationExists = true;
                            }
                        }
                        if(!$playerLocationExists) {
                            $playerLocation = (new PlayerLocation())
                                ->setPlayer($this->character)
                                ->setLocation($location);
                            $this->entityManager->persist($playerLocation);

                            if($location->getType() === 'zone') {
                                $playerParentLocationExists = false;
                                foreach($this->character->getPlayerLocations() as $playerLocation) {
                                    if($playerLocation === $location->getParent()) {
                                        $playerParentLocationExists = true;
                                    }
                                }
                                if(!$playerParentLocationExists) {
                                    $playerParentLocation = (new PlayerLocation())
                                        ->setPlayer($this->character)
                                        ->setLocation($location->getParent());
                                    $this->entityManager->persist($playerParentLocation);
                                }
                            }
                        }
                    }

                    $this->entityManager->persist($this->character);
                    $this->entityManager->flush();

                    $this->setActiveScreen($screen->getSlug());
                }
            }
        }
    }
}
