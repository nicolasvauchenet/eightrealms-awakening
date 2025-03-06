<?php

namespace App\Twig\Components\Game;

use App\Entity\Action\Action;
use App\Entity\Character\Npc;
use App\Entity\Character\Player;
use App\Entity\Character\PlayerNpc;
use App\Entity\Combat\Combat;
use App\Entity\Combat\CreatureCombat;
use App\Entity\Combat\PlayerCombat;
use App\Entity\Dialogue\Dialogue;
use App\Entity\Item\Armor;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Item;
use App\Entity\Item\Magical;
use App\Entity\Item\PlayerNpcItem;
use App\Entity\Item\Shield;
use App\Entity\Item\Weapon;
use App\Entity\Location\Location;
use App\Entity\Location\PlayerLocation;
use App\Entity\Quest\Quest;
use App\Entity\Screen\CinematicScreen;
use App\Entity\Screen\DialogueScreen;
use App\Entity\Screen\InteractionScreen;
use App\Entity\Screen\LocationScreen;
use App\Entity\Screen\Screen;
use App\Entity\Screen\TradeScreen;
use App\Entity\Spell\CharacterSpell;
use App\Service\Character\CharacterReputationService;
use App\Service\Dialogue\DialogueService;
use App\Service\Item\CharacterItemService;
use App\Service\Item\ItemService;
use App\Service\Location\LocationService;
use App\Service\Quest\QuestService;
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
    public ?Dialogue $dialogue = null;

    #[LiveProp(writable: true)]
    public ?PlayerCombat $playerCombat = null;

    #[LiveProp(writable: true)]
    public bool $characterUpdated = false;

    #[LiveProp(writable: true)]
    public bool $characterLocationsUpdated = false;

    #[LiveProp(writable: true)]
    public ?string $description = '';

    #[LiveProp(writable: true)]
    public Player $character;

    public function __construct(private readonly EntityManagerInterface     $entityManager,
                                private readonly CharacterReputationService $characterReputationService,
                                private readonly ItemService                $itemService,
                                private readonly DialogueService            $dialogueService,
                                private readonly QuestService               $questService,
                                private readonly LocationService            $locationService, private readonly CharacterItemService $characterItemService)
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
    public function locationScreen(#[LiveArg] int $id): void
    {
        $location = $this->entityManager->getRepository(Location::class)->find($id);
        $screen = $this->entityManager->getRepository(LocationScreen::class)->findOneBy(['location' => $location]);
        $this->changeScreen($screen->getId());
    }

    #[LiveAction]
    public function interactionScreen(#[LiveArg] int $id): void
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
    public function tradeScreen(#[LiveArg] int $id): void
    {
        $this->playerNpc = $this->entityManager->getRepository(PlayerNpc::class)->findOneBy(['player' => $this->character, 'npc' => $id]);
        $screen = $this->entityManager->getRepository(TradeScreen::class)->findOneBy(['npc' => $this->playerNpc->getNpc()]);
        $this->changeScreen($screen->getId());
    }

    #[LiveAction]
    public function dialogueScreen(#[LiveArg] int $id, #[LiveArg] ?string $type = 'dialogue'): void
    {
        $this->playerNpc = $this->entityManager->getRepository(PlayerNpc::class)->find($id);
        $this->dialogue = $this->dialogueService->getCurrentDialogue($this->playerNpc, $type);
        $screen = $this->entityManager->getRepository(DialogueScreen::class)->findOneBy(['npc' => $this->playerNpc->getNpc()]);
        if($this->dialogue->getEffects()) {
            $this->doEffects($this->dialogue->getEffects());
        }
        $this->changeScreen($screen->getId());
    }

    #[LiveAction]
    public function combatScreen(#[LiveArg] int $id): void
    {
        $combat = $this->entityManager->getRepository(Combat::class)->find($id);

        $playerCombat = $this->entityManager->getRepository(PlayerCombat::class)->findOneBy(['player' => $this->character, 'combat' => $combat]);
        if(!$playerCombat) {
            $playerCombat = (new PlayerCombat())
                ->setPlayer($this->character)
                ->setCombat($combat)
                ->setStatus('progress');
            $this->entityManager->persist($playerCombat);
            $this->entityManager->flush();
        }

        $this->playerCombat = $playerCombat;
        $this->description = '';

        $screen = $this->playerCombat->getCombat()->getCombatScreen();
        $this->changeScreen($screen->getId());
    }

    #[LiveAction]
    public function exitScreen(): void
    {
        if($this->playerNpc && $this->playerNpc->getNpc()->getLocation()->getType() === 'building') {
            $screen = $this->entityManager->getRepository(LocationScreen::class)->findOneBy(['location' => $this->playerNpc->getNpc()->getLocation()]);
        } else {
            $screen = $this->entityManager->getRepository(LocationScreen::class)->findOneBy(['location' => $this->character->getLocation()]);
        }
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
                ->setEquipped(false)
                ->setQuestItem(false);
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
    public function blessing(#[LiveArg] ?int $id = null): void
    {
        $playerNpc = $this->entityManager->getRepository(PlayerNpc::class)->find($id);
        $playerNpc->setFortune($playerNpc->getFortune() + 10);
        $this->entityManager->persist($playerNpc);

        $this->character->setFortune($this->character->getFortune() - 10)
            ->setHealth($this->character->getHealthMax())
            ->setMana($this->character->getManaMax());
        $this->entityManager->persist($this->character);

        $this->entityManager->flush();

        $this->description = "<p>Vous avez reçu une bénédiction du {$playerNpc->getNpc()->getName()} et vous avez été soigné.</p><p>Cela vous a coûté 10 couronnes, mais vous vous sentez vraiment bien à présent…</p>";
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
                    $this->character->setLocation($location);
                    $this->characterLocationsUpdated = true;

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

    #[LiveAction]
    public function doEffects(#[LiveArg] ?array $effects = null): void
    {
        if(!$effects) {
            return;
        }

        foreach($effects as $effect => $data) {
            if($effect === 'startQuest') {
                $quest = $this->entityManager->getRepository(Quest::class)->find($data);
                $started = $this->questService->startQuest($quest, $this->character);
                $this->characterUpdated = $started;
            }

            if($effect === 'newLocation') {
                $location = $this->entityManager->getRepository(Location::class)->find($data);
                $exists = $this->locationService->addLocation($location, $this->character);
                $this->characterLocationsUpdated = $exists;
            }

            if($effect === 'addItem') {
                $item = $this->entityManager->getRepository(Item::class)->find($data['item']);
                $characterItem = (new CharacterItem())
                    ->setCharacter($this->character)
                    ->setItem($item)
                    ->setEquipped(false)
                    ->setQuestItem($data['questItem']);
                if($item instanceof Armor || $item instanceof Shield || $item instanceof Weapon) {
                    $characterItem->setHealth($item->getHealth());
                } else if($item instanceof Magical) {
                    $characterItem->setCharge($item->getCharge());
                }
                $this->entityManager->persist($characterItem);
                $this->entityManager->flush();
                $this->characterUpdated = true;
            }

            if($effect === 'changeDialogue') {
                $this->dialogue = $this->entityManager->getRepository(Dialogue::class)->find($data);
                $this->playerNpc = $this->entityManager->getRepository(PlayerNpc::class)->findOneBy(['player' => $this->character, 'npc' => $this->dialogue->getNpc()]);
                $screen = $this->entityManager->getRepository(DialogueScreen::class)->findOneBy(['npc' => $this->playerNpc->getNpc()]);
                if($this->dialogue->getEffects()) {
                    $this->doEffects($this->dialogue->getEffects());
                }
                $this->changeScreen($screen->getId());
            }
        }
    }

    #[LiveAction]
    public function flee(): void
    {
        $this->playerCombat->setStatus('fled')
            ->setUpdatedAt(new \DateTimeImmutable());
        $this->entityManager->persist($this->playerCombat);
        $this->entityManager->flush();

        $this->description = '<p class="text-warning mb-1">Vous avez fui le combat&nbsp;!</p>';
        $this->exitScreen();
    }

    #[LiveAction]
    public function attack(#[LiveArg] string $type, #[LiveArg] int $creatureCombatId, #[LiveArg] int $position): void
    {
        $creatureCombat = $this->entityManager->getRepository(CreatureCombat::class)->find($creatureCombatId);
        switch($type) {
            case 'twohands':
                $characterItemRight = $this->characterItemService->getEquippedItems($this->character)['righthand'];
                $characterItemLeft = $this->characterItemService->getEquippedItems($this->character)['lefthand'];
                $this->description .= "<p>Vous attaquez {$creatureCombat->getCreature()->getName()} $position avec votre {$characterItemRight->getItem()->getName()} et votre votre {$characterItemLeft->getItem()->getName()}.</p>";
                break;
            case 'righthand':
                $characterItem = $this->characterItemService->getEquippedItems($this->character)['righthand'];
                $this->description .= "<p>Vous attaquez {$creatureCombat->getCreature()->getName()} $position avec votre {$characterItem->getItem()->getName()}.</p>";
                break;
            case 'lefthand':
                $characterItem = $this->characterItemService->getEquippedItems($this->character)['lefthand'];
                $this->description .= "<p>Vous attaquez {$creatureCombat->getCreature()->getName()} $position avec votre {$characterItem->getItem()->getName()}.</p>";
                break;
            case 'bow':
                $characterItem = $this->characterItemService->getEquippedItems($this->character)['bow'];
                $this->description .= "<p>Vous attaquez {$creatureCombat->getCreature()->getName()} $position votre {$characterItem->getItem()->getName()}.</p>";
                break;
            default:
                break;
        }
    }

    #[LiveAction]
    public function use(#[LiveArg] string $type): void
    {
        switch($type) {
            case 'scroll':
                $characterItem = $this->characterItemService->getEquippedItems($this->character)['scroll'];
                $this->description .= "<p>Vous lisez votre Parchemin de {$characterItem->getItem()->getName()}.</p>";
                break;
            case 'potion':
                $characterItem = $this->characterItemService->getEquippedItems($this->character)['potion'];
                $this->description .= "<p>Vous buvez votre {$characterItem->getItem()->getName()}.</p>";
                break;
            default:
                break;
        }
    }

    #[LiveAction]
    public function cast(#[LiveArg] int $creatureCombatId, #[LiveArg] int $position, #[LiveArg] int $characterSpellId): void
    {
        $creatureCombat = $this->entityManager->getRepository(CreatureCombat::class)->find($creatureCombatId);
        $characterSpell = $this->entityManager->getRepository(CharacterSpell::class)->find($characterSpellId);

        if($characterSpell->getSpell()->getType() === 'Offensif') {
            $this->description .= "<p>Vous lancez le sort {$characterSpell->getSpell()->getName()} sur {$creatureCombat->getCreature()->getName()} $position.</p>";
        } else {
            $this->description .= "<p>Vous lancez le sort {$characterSpell->getSpell()->getName()}.</p>";

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
