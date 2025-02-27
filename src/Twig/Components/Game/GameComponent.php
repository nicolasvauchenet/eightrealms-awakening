<?php

namespace App\Twig\Components\Game;

use App\Entity\Action\Action;
use App\Entity\Character\Npc;
use App\Entity\Character\Player;
use App\Entity\Character\PlayerNpc;
use App\Entity\Item\Armor;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Magical;
use App\Entity\Item\PlayerNpcItem;
use App\Entity\Item\Shield;
use App\Entity\Item\Weapon;
use App\Entity\Location\PlayerLocation;
use App\Entity\Screen\CinematicScreen;
use App\Entity\Screen\InteractionScreen;
use App\Entity\Screen\LocationScreen;
use App\Entity\Screen\Screen;
use App\Entity\Screen\TradeScreen;
use App\Service\Character\CharacterReputationService;
use App\Service\Item\ItemService;
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

    #[LiveProp(writable: true)]
    public ?Screen $activeScreen = null;

    #[LiveProp(writable: true)]
    public ?Screen $previousScreen = null;

    private string $activeScreenSlug = 'laventure-commence';

    #[LiveProp(writable: true)]
    public ?string $activeScreenType = 'cinematic';

    #[LiveProp(writable: true)]
    public ?PlayerNpc $playerNpc = null;

    #[LiveProp(writable: true)]
    public bool $characterUpdated = false;

    #[LiveProp(writable: true)]
    public bool $characterLocationsUpdated = false;

    public ?string $description = null;

    #[LiveProp(writable: true)]
    public Player $character;

    public function __construct(private readonly EntityManagerInterface     $entityManager,
                                private readonly CharacterReputationService $characterReputationService,
                                private readonly ItemService                $itemService)
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
    public function changeScreen(#[LiveArg] int $id): void
    {
        $screen = $this->entityManager->getRepository(Screen::class)->find($id);
        $this->setActiveScreen($screen->getSlug());
    }

    #[LiveAction]
    public function interactionScreen(#[LiveArg] ?int $id = null): void
    {
        $npc = $this->entityManager->getRepository(Npc::class)->find($id);

        $playerNpc = null;
        foreach($this->character->getPlayerNpcs() as $existingPlayerNpc) {
            if($existingPlayerNpc->getNpc() === $npc) {
                $playerNpc = $existingPlayerNpc;
            }
        }
        if(!$playerNpc) {
            $playerNpc = $this->meetNpc($npc);
        }
        $this->playerNpc = $playerNpc;

        $screen = $this->entityManager->getRepository(InteractionScreen::class)->findOneBy(['npc' => $npc]);
        $this->changeScreen($screen->getId());
    }

    #[LiveAction]
    public function tradeScreen(#[LiveArg] ?int $id = null): void
    {
        $this->playerNpc = $this->entityManager->getRepository(PlayerNpc::class)->findOneBy(['player' => $this->character, 'npc' => $id]);
        $screen = $this->entityManager->getRepository(TradeScreen::class)->findOneBy(['npc' => $this->playerNpc->getNpc()]);
        $this->changeScreen($screen->getId());
    }

    #[LiveAction]
    public function exitScreen(): void
    {
        $screen = $this->entityManager->getRepository(LocationScreen::class)->findOneBy(['location' => $this->character->getLocation()]);
        $this->changeScreen($screen->getId());
    }

    #[LiveAction]
    public function buy(#[LiveArg] ?int $id = null): void
    {
        $characterItem = $this->entityManager->getRepository(PlayerNpcItem::class)->find($id);
        $itemPrice = $this->itemService->getBuyPrice($characterItem);

        if($itemPrice > $this->character->getFortune()) {
            $this->description = "<p>Vous n'avez pas assez de couronnes pour acheter cet objet.</p>";
        } else {
            $newCharacterItem = (new CharacterItem())
                ->setCharacter($this->character)
                ->setItem($characterItem->getItem())
                ->setEquipped(false);
            if($characterItem->getItem() instanceof Armor || $characterItem->getItem() instanceof Shield || $characterItem->getItem() instanceof Weapon) {
                $newCharacterItem->setHealth($characterItem->getItem()->getHealth());
            } else if($characterItem->getItem() instanceof Magical) {
                $newCharacterItem->setCharge($characterItem->getItem()->getCharge());
            }
            $this->entityManager->persist($newCharacterItem);

            $playerNpcItem = $this->entityManager->getRepository(PlayerNpcItem::class)->findOneBy(['playerNpc' => $this->playerNpc, 'item' => $characterItem->getItem()]);
            if($playerNpcItem && !$playerNpcItem->isOriginal()) {
                $this->entityManager->remove($playerNpcItem);
            }

            $this->character->setFortune($this->character->getFortune() - $itemPrice);
            $this->playerNpc->setFortune($this->playerNpc->getFortune() + $itemPrice);
            $this->entityManager->persist($this->character);
            $this->entityManager->persist($this->playerNpc);

            $this->entityManager->flush();

            $this->description = "<p>Vous avez acheté 1 {$characterItem->getItem()->getName()} à {$this->playerNpc->getNpc()->getName()} pour $itemPrice couronne" . ($itemPrice > 1 ? 's' : '') . ".</p>";
        }
    }

    #[LiveAction]
    public function sell(#[LiveArg] ?int $id = null): void
    {
        $characterItem = $this->entityManager->getRepository(CharacterItem::class)->find($id);
        $itemPrice = $this->itemService->getSellPrice($characterItem, $this->playerNpc);

        if($itemPrice > $this->playerNpc->getFortune()) {
            $this->description = "<p>{$this->playerNpc->getNpc()->getName()} n'a pas assez de couronnes pour vous acheter cet objet.</p>";
        } else {
            $playerNpcItem = $this->entityManager->getRepository(PlayerNpcItem::class)->findOneBy(['playerNpc' => $this->playerNpc, 'item' => $characterItem->getItem()]);
            if(!$playerNpcItem || !$playerNpcItem->isOriginal()) {
                $playerNpcItem = (new PlayerNpcItem())
                    ->setPlayerNpc($this->playerNpc)
                    ->setItem($characterItem->getItem())
                    ->setEquipped(false)
                    ->setOriginal(false);
                if($characterItem->getItem() instanceof Armor || $characterItem->getItem() instanceof Shield || $characterItem->getItem() instanceof Weapon) {
                    $playerNpcItem->setHealth($characterItem->getItem()->getHealth());
                } else if($characterItem->getItem() instanceof Magical) {
                    $playerNpcItem->setCharge($characterItem->getItem()->getCharge());
                }
                $this->entityManager->persist($playerNpcItem);
            }
            $this->entityManager->remove($characterItem);

            $this->playerNpc->setFortune($this->playerNpc->getFortune() - $itemPrice);
            $this->character->setFortune($this->character->getFortune() + $itemPrice);

            $this->entityManager->persist($this->character);
            $this->entityManager->persist($this->playerNpc);

            $this->entityManager->flush();

            $this->description = "<p>Vous avez vendu 1 {$characterItem->getItem()->getName()} à {$this->playerNpc->getNpc()->getName()} pour $itemPrice couronne" . ($itemPrice > 1 ? 's' : '') . ".</p>";
        }
    }

    #[LiveAction]
    public function steal(#[LiveArg] ?int $id = null): void
    {
        $this->playerNpc = $this->entityManager->getRepository(PlayerNpc::class)->findOneBy(['player' => $this->character, 'npc' => $id]);
        $baseDifficulty = 15;

        $repMalus = $this->playerNpc->getReputation() < 0 ? $this->playerNpc->getReputation() * -1 : 0;
        $levelBonus = (int)floor($this->character->getLevel() / 3);
        $dexterityBonus = (int)floor(($this->character->getDexterity() - 10) / 2);
        $totalMalus = $baseDifficulty + $repMalus - $levelBonus - $dexterityBonus;

        $maxCrowns = (int)floor($this->playerNpc->getFortune() * 0.25);
        $maxCrowns = max($maxCrowns, 1);
        $stolenCrowns = random_int(1, $maxCrowns);

        $roll = random_int(1, 20);

        if($roll >= $totalMalus) {
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
                if($this->character->getExperience() < 0) {
                    $this->character->setExperience(0);
                }
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
                    $playerNpc = $this->meetNpc($npc);
                    $playerNpc->setReputation($this->characterReputationService->getReputation($this->character, $npc) - 2);
                }
            }
            $screen = $this->entityManager->getRepository(CinematicScreen::class)->findOneBy(['slug' => 'en-prison']);
        }
        $this->changeScreen($screen->getId());
    }

    #[LiveAction]
    public function doAction(#[LiveArg] ?int $id = null): void
    {
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

                $this->changeScreen($screen->getId());
            }
        }
    }

    private function meetNpc(Npc $npc): PlayerNpc
    {
        $playerNpc = (new PlayerNpc())
            ->setPlayer($this->character)
            ->setNpc($npc)
            ->setHealth($npc->getHealthMax())
            ->setMana($npc->getManaMax())
            ->setFortune($npc->getFortune())
            ->setReputation($this->characterReputationService->getReputation($this->character, $npc));
        foreach($npc->getCharacterItems() as $npcCharacterItem) {
            $playerNpcItem = (new PlayerNpcItem())
                ->setPlayerNpc($playerNpc)
                ->setItem($npcCharacterItem->getItem())
                ->setEquipped($npcCharacterItem->isEquipped())
                ->setSlot($npcCharacterItem->getSlot())
                ->setHealth($npcCharacterItem->getHealth())
                ->setCharge($npcCharacterItem->getCharge())
                ->setOriginal(true);
            $this->entityManager->persist($playerNpcItem);
        }
        $this->entityManager->persist($playerNpc);
        $this->entityManager->flush();

        return $playerNpc;
    }
}
