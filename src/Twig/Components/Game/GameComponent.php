<?php

namespace App\Twig\Components\Game;

use App\Entity\Action\Action;
use App\Entity\Character\Npc;
use App\Entity\Character\Player;
use App\Entity\Character\PlayerNpc;
use App\Entity\Location\PlayerLocation;
use App\Entity\Screen\CinematicScreen;
use App\Entity\Screen\InteractionScreen;
use App\Entity\Screen\LocationScreen;
use App\Entity\Screen\Screen;
use App\Entity\Screen\TradeScreen;
use App\Service\Character\CharacterReputationService;
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

    public ?Screen $previousScreen = null;

    private string $activeScreenSlug = 'laventure-commence';

    public ?string $activeScreenType = 'cinematic';

    public ?PlayerNpc $playerNpc = null;

    public bool $characterUpdated = false;

    public bool $characterLocationsUpdated = false;

    public ?string $description = null;

    #[LiveProp(writable: true)]
    public Player $character;

    public function __construct(private readonly EntityManagerInterface     $entityManager,
                                private readonly CharacterReputationService $characterReputationService)
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
                            ->setReputation($this->characterReputationService->getReputation($this->character, $npc));
                        $this->entityManager->persist($playerNpc);
                        $this->entityManager->flush();
                    }
                    $this->playerNpc = $playerNpc;

                    $screen = $this->entityManager->getRepository(InteractionScreen::class)->findOneBy(['npc' => $npc]);
                    $this->changeScreen($screen->getSlug());
                    break;
                case 'steal':
                    $this->playerNpc = $this->entityManager->getRepository(PlayerNpc::class)->findOneBy(['player' => $this->character, 'npc' => $id]);
                    $baseDifficulty = 14;

                    $repMalus = $this->characterReputationService->getReputation($this->character, $this->playerNpc->getNpc()) < 0 ? $this->characterReputationService->getReputation($this->character, $this->playerNpc->getNpc()) : 0;
                    $totalMalus = $repMalus;
                    $finalDifficulty = $baseDifficulty + $totalMalus;

                    $dexScore = $this->character->getDexterity();
                    $dexBonus = (int)floor(($dexScore - 10) / 2);
                    $level = $this->character->getLevel();
                    $levelBonus = (int)floor($level / 2);

                    $d20 = random_int(1, 20);
                    $stealRoll = $d20 + $dexBonus + $levelBonus;

                    $maxCrowns = (int)floor($this->playerNpc->getFortune() * 0.25);
                    $maxCrowns = max($maxCrowns, 1);
                    $stolenCrowns = random_int(1, $maxCrowns);

                    if($stealRoll >= $finalDifficulty) {
                        if($stolenCrowns <= $this->playerNpc->getFortune()) {
                            $this->character->setFortune($this->character->getFortune() + $stolenCrowns);
                            $this->character->setExperience($this->character->getExperience() + $stolenCrowns);
                            $this->playerNpc->setFortune($this->playerNpc->getFortune() - $stolenCrowns);
                            $this->entityManager->persist($this->character);
                            $this->entityManager->persist($this->playerNpc);
                            $this->entityManager->flush();

                            $this->characterUpdated = true;
                            $this->description = "<p>Vous avez volé {$stolenCrowns} couronne" . ($stolenCrowns > 1 ? 's' : '') . " à {$this->playerNpc->getNpc()->getName()}, et gagné $stolenCrowns point" . ($stolenCrowns > 1 ? 's' : '') . " d'expérience.</p>";
                        } else {
                            $this->description = "<p>Vous avez tenté de voler {$this->playerNpc->getNpc()->getName()} mais il n'avait rien sur lui.</p>";
                        }
                        $screen = $this->entityManager->getRepository(InteractionScreen::class)->findOneBy(['npc' => $this->playerNpc->getNpc()]);
                    } else {
                        $this->description = "<p>Vous avez tenté de voler {$this->playerNpc->getNpc()->getName()} mais vous avez échoué.</p>";
                        $this->character->setFortune($this->character->getFortune() - 50);
                        if($this->character->getFortune() < 0) {
                            $this->character->setFortune(0);
                            $this->character->setExperience($this->character->getExperience() - $stolenCrowns);
                            $this->description .= "<p>Vous n'avez pas assez de couronnes pour payer l'amende, alors vous avez perdu {$stolenCrowns} point" . ($stolenCrowns > 1 ? 's' : '') . " d'expérience, et votre réputation a diminué auprès des personnes présentes.</p>";
                        } else {
                            $this->description .= "<p>Vous avez écopé d'une amende de 50 couronnes, et votre réputation a diminué auprès des personnes présentes.</p>";
                        }
                        $this->entityManager->persist($this->character);
                        $this->entityManager->flush();

                        $this->previousScreen = $this->entityManager->getRepository(LocationScreen::class)->findOneBy(['location' => $this->character->getLocation()]);
                        foreach($this->previousScreen->getLocation()->getNpcs() as $npc) {
                            $playerNpc = $this->entityManager->getRepository(PlayerNpc::class)->findOneBy(['player' => $this->character, 'npc' => $npc]);
                            if($playerNpc) {
                                $playerNpc->setReputation($playerNpc->getReputation() - 2);
                            } else {
                                $playerNpc = (new PlayerNpc())
                                    ->setPlayer($this->character)
                                    ->setNpc($npc)
                                    ->setHealth($npc->getHealthMax())
                                    ->setMana($npc->getManaMax())
                                    ->setFortune($npc->getFortune())
                                    ->setReputation($this->characterReputationService->getReputation($this->character, $npc) - 2);
                            }
                            $this->entityManager->persist($playerNpc);
                            $this->entityManager->flush();
                        }
                        $screen = $this->entityManager->getRepository(CinematicScreen::class)->findOneBy(['slug' => 'en-prison']);
                    }
                    $this->changeScreen($screen->getSlug());
                    break;
                case 'trade':
                    $this->playerNpc = $this->entityManager->getRepository(PlayerNpc::class)->findOneBy(['player' => $this->character, 'npc' => $id]);
                    $screen = $this->entityManager->getRepository(TradeScreen::class)->findOneBy(['npc' => $this->playerNpc->getNpc()]);
                    $this->setActiveScreen($screen->getSlug());
                    break;
                case 'exit':
                    $screen = $this->entityManager->getRepository(LocationScreen::class)->findOneBy(['location' => $this->character->getLocation()]);
                    $this->setActiveScreen($screen->getSlug());
                    break;
                case 'changeScreen':
                    $screen = $this->entityManager->getRepository(LocationScreen::class)->find($id);
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
