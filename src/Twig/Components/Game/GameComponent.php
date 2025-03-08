<?php

namespace App\Twig\Components\Game;

use App\Entity\Action\Action;
use App\Entity\Character\Npc;
use App\Entity\Character\Player;
use App\Entity\Character\PlayerNpc;
use App\Entity\Combat\Combat;
use App\Entity\Combat\CreatureCombat;
use App\Entity\Combat\CreaturePlayerCombat;
use App\Entity\Combat\NpcPlayerCombat;
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
use App\Entity\Quest\PlayerQuest;
use App\Entity\Quest\Quest;
use App\Entity\Quest\Step;
use App\Entity\Screen\CinematicScreen;
use App\Entity\Screen\DialogueScreen;
use App\Entity\Screen\InteractionScreen;
use App\Entity\Screen\LocationScreen;
use App\Entity\Screen\Screen;
use App\Entity\Screen\TradeScreen;
use App\Entity\Spell\CharacterSpell;
use App\Service\Character\CharacterBonusService;
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

    private string $activeScreenSlug = 'laventure-commence';

    #[LiveProp(writable: true)]
    public array $turnOrder = [];

    #[LiveProp(writable: true)]
    public ?int $currentTurn = null;

    #[LiveProp(writable: true)]
    public ?int $nbTurns = 1;

    #[LiveProp(writable: true)]
    public ?Screen $activeScreen = null;

    #[LiveProp(writable: true)]
    public ?Screen $previousScreen = null;

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
                                private readonly CharacterBonusService      $characterBonusService,
                                private readonly ItemService                $itemService,
                                private readonly DialogueService            $dialogueService,
                                private readonly QuestService               $questService,
                                private readonly LocationService            $locationService,
                                private readonly CharacterItemService       $characterItemService)
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
        $this->character->setLocation($location);
        $this->entityManager->persist($this->character);
        $this->entityManager->flush();
        $screen = $this->entityManager->getRepository(LocationScreen::class)->findOneBy(['location' => $location]);
        $this->changeScreen($screen->getId());
        $this->description = '';
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
            foreach($combat->getCreatureCombats() as $creatureCombat) {
                $playerCreatureCombat = (new CreaturePlayerCombat())
                    ->setPlayerCombat($playerCombat)
                    ->setCreature($creatureCombat->getCreature())
                    ->setHealth($creatureCombat->getCreature()->getHealthMax())
                    ->setMana($creatureCombat->getCreature()->getManaMax());
                $this->entityManager->persist($playerCreatureCombat);
                $playerCombat->addCreaturePlayerCombat($playerCreatureCombat);
                $this->entityManager->persist($playerCombat);
                $this->entityManager->flush();
            }
            foreach($combat->getNpcCombats() as $npcCombat) {
                $playerNpcCombat = (new NpcPlayerCombat())
                    ->setPlayerCombat($playerCombat)
                    ->setNpc($npcCombat->getNpc())
                    ->setHealth($npcCombat->getNpc()->getHealthMax())
                    ->setMana($npcCombat->getNpc()->getManaMax());
                $this->entityManager->persist($playerNpcCombat);
                $playerCombat->addNpcPlayerCombat($playerNpcCombat);
                $this->entityManager->persist($playerCombat);
                $this->entityManager->flush();
            }
        } else {
            /*foreach($playerCombat->getCreaturePlayerCombats() as $creatureCombat) {
                $creatureCombat->setHealth($creatureCombat->getCreature()->getHealthMax())
                    ->setMana($creatureCombat->getCreature()->getManaMax());
                $this->entityManager->persist($creatureCombat);
            }

            foreach($playerCombat->getNpcPlayerCombats() as $npcCombat) {
                $npcCombat->setHealth($npcCombat->getNpc()->getHealthMax())
                    ->setMana($npcCombat->getNpc()->getManaMax());
                $this->entityManager->persist($npcCombat);
            }*/
        }

        $playerCombat->setStatus('progress');
        $this->entityManager->persist($playerCombat);
        $this->entityManager->flush();

        $this->playerCombat = $playerCombat;

        $screen = $this->playerCombat->getCombat()->getCombatScreen();
        $this->changeScreen($screen->getId());

        $this->startCombat();
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
            switch($effect) {
                case 'resurrect':
                    $this->character->setHealth($this->character->getHealthMax())
                        ->setMana($this->character->getManaMax())
                        ->setFortune($this->character->getFortune() - 50);
                    break;
                case 'changeLocation':
                    if(empty($data)) {
                        $this->exitScreen();

                        return;
                    } else {
                        $screen = $this->entityManager->getRepository(LocationScreen::class)->findOneBy(['slug' => $data]);
                        $location = $screen->getLocation();
                    }

                    if($location !== $this->character->getLocation()) {
                        $this->character->setLocation($location);

                        $playerLocationExists = false;
                        foreach($this->character->getPlayerLocations() as $playerLocation) {
                            if($playerLocation->getLocation() === $location) {
                                $playerLocationExists = true;
                            }
                        }
                        if(!$playerLocationExists) {
                            $playerLocation = (new PlayerLocation())
                                ->setPlayer($this->character)
                                ->setLocation($location);
                            $this->entityManager->persist($playerLocation);

                            if($location->getType() === 'zone' || $location->getType() === 'building') {
                                $playerParentLocationExists = false;
                                foreach($this->character->getPlayerLocations() as $playerLocation) {
                                    if($playerLocation->getLocation() === $location->getParent()) {
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

                            $this->characterLocationsUpdated = true;
                        }
                    }

                    $this->entityManager->persist($this->character);
                    $this->entityManager->flush();

                    $this->changeScreen($screen->getId());
                    break;
                default:
                    break;
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

            if($effect === 'increaseReputation') {
                $this->previousScreen = $this->entityManager->getRepository(LocationScreen::class)->findOneBy(['location' => $this->character->getLocation()]);
                foreach($this->previousScreen->getLocation()->getNpcs() as $npc) {
                    $playerNpc = $this->entityManager->getRepository(PlayerNpc::class)->findOneBy(['player' => $this->character, 'npc' => $npc]);
                    if($playerNpc) {
                        $playerNpc->setReputation($playerNpc->getReputation() + $data);
                    } else {
                        $playerNpc = $this->meetNpc($npc);
                        $playerNpc->setReputation($this->characterReputationService->getReputation($this->character, $npc) + $data);
                    }
                    $this->entityManager->persist($playerNpc);
                }
                $this->entityManager->flush();
            }

            if($effect === 'rewardQuest') {
                $quest = $this->entityManager->getRepository(Quest::class)->find($data);
                $playerQuest = $this->entityManager->getRepository(PlayerQuest::class)->findOneBy(['player' => $this->character, 'quest' => $quest]);

                if($playerQuest->getQuest()->getReward()) {
                    foreach($playerQuest->getQuest()->getReward() as $type => $value) {
                        switch($type) {
                            case 'xp':
                                $this->character->setExperience($this->character->getExperience() + $value);
                                break;
                            case 'crown':
                                $this->character->setFortune($this->character->getFortune() + $value);
                                break;
                            case 'items':
                                dd($value);
                                break;
                            default:
                                break;
                        }
                    }

                    $this->entityManager->persist($this->character);
                    $this->characterUpdated = true;
                }

                $playerQuest->setQuestStatus('rewarded');
                $this->entityManager->persist($playerQuest);
                $this->entityManager->flush();
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
        $playerInitiative = random_int(1, 20) + $this->character->getDexterity();
        $creaturesInitiative = [];

        // Récupération des créatures encore en vie et génération de leur jet d'initiative
        foreach($this->playerCombat->getCreaturePlayerCombats() as $creatureCombat) {
            if($creatureCombat->getHealth() > 0) {
                $creaturesInitiative[] = random_int(1, 20) + $creatureCombat->getCreature()->getDexterity();
            }
        }

        // Si une créature a une meilleure initiative que le joueur, il ne peut pas fuir
        foreach($creaturesInitiative as $initiative) {
            if($initiative >= $playerInitiative) {
                $this->description .= '<p class="text-danger">Vous tentez de fuir, mais les ennemis vous bloquent&nbsp;! Vous perdez votre tour.</p>';
                $this->nextTurn();

                return;
            }
        }

        // Si le joueur gagne, il quitte le combat
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
        $creatureCombat = $this->entityManager->getRepository(CreaturePlayerCombat::class)->find($creatureCombatId);

        switch($type) {
            case 'twohands':
                $characterItemRight = $this->characterItemService->getEquippedItems($this->character)['righthand'];
                $characterItemLeft = $this->characterItemService->getEquippedItems($this->character)['lefthand'];
                $this->description .= "<strong>Vous attaquez {$creatureCombat->getCreature()->getName()} $position avec votre {$characterItemRight->getItem()->getName()} et votre {$characterItemLeft->getItem()->getName()}.</strong><br/>";
                break;
            case 'righthand':
                $characterItem = $this->characterItemService->getEquippedItems($this->character)['righthand'];
                $this->description .= "<strong>Vous attaquez {$creatureCombat->getCreature()->getName()} $position avec votre {$characterItem->getItem()->getName()}</strong>.<br/>";
                break;
            case 'lefthand':
                $characterItem = $this->characterItemService->getEquippedItems($this->character)['lefthand'];
                $this->description .= "<strong>Vous attaquez {$creatureCombat->getCreature()->getName()} $position avec votre {$characterItem->getItem()->getName()}</strong>.<br/>";
                break;
            case 'bow':
                $characterItem = $this->characterItemService->getEquippedItems($this->character)['bow'];
                $this->description .= "<strong>Vous attaquez {$creatureCombat->getCreature()->getName()} $position votre {$characterItem->getItem()->getName()}</strong>.<br/>";
                break;
            default:
                break;
        }

        $this->resolveAttack($this->character, $creatureCombat, $type);
        $this->nextTurn();
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
                if($characterItem->getItem()->getTarget() === 'health') {
                    $this->character->setHealth($this->character->getHealth() + $characterItem->getItem()->getAmount());
                } else if($characterItem->getItem()->getTarget() === 'health') {
                    $this->character->setMana($this->character->getMana() + $characterItem->getItem()->getAmount());
                }
                $this->entityManager->persist($this->character);
                $this->entityManager->remove($characterItem);
                $this->entityManager->flush();

                $this->description .= "<p>Vous buvez votre {$characterItem->getItem()->getName()}.</p>";
                break;
            default:
                break;
        }

        $this->nextTurn();
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

    public function startCombat(): void
    {
        $this->initializeTurnOrder();
        $this->description .= "<h3>Tour {$this->nbTurns} :</h3><p>";
        $this->executeTurn();
    }

    private function executeTurn(): void
    {
        if($this->isCombatOver()) {
            return;
        }

        // Récupérer les informations du protagoniste actuel
        $currentEntityData = $this->turnOrder[$this->currentTurn];
        $currentEntity = $this->fetchEntityById($currentEntityData['type'], $currentEntityData['id']);

        if(($currentEntity instanceof CreaturePlayerCombat || $currentEntity instanceof NpcPlayerCombat) && $currentEntity->getHealth() <= 0) {
            $this->nextTurn();

            return;
        }

        if($currentEntity instanceof Player) {
            return;
        }

        if($currentEntity instanceof CreaturePlayerCombat || $currentEntity instanceof NpcPlayerCombat) {
            $this->executeEnemyAttack($currentEntity);
            $this->nextTurn();
        }
    }

    private function isCombatOver(): bool
    {
        foreach($this->turnOrder as $entityData) {
            $entity = $this->fetchEntityById($entityData['type'], $entityData['id']);

            if(($entity instanceof CreaturePlayerCombat && $entity->getHealth() > 0) ||
                ($entity instanceof NpcPlayerCombat && $entity->getHealth() > 0)) {
                return false;
            }
        }

        $this->description = '';

        // Si plus d'ennemis, marquer la victoire
        $this->playerCombat->setStatus('victory')
            ->setUpdatedAt(new \DateTimeImmutable());
        $this->entityManager->persist($this->playerCombat);

        if($this->playerCombat->getCombat()->getQuest()) {
            $playerQuest = $this->entityManager->getRepository(PlayerQuest::class)->findOneBy(['player' => $this->character, 'step' => $this->playerCombat->getCombat()->getStep()]);
            $playerQuest->setStatus('completed');
            if($this->playerCombat->getCombat()->getStep()->getReward()) {
                foreach($this->playerCombat->getCombat()->getStep()->getReward() as $type => $value) {
                    switch($type) {
                        case 'xp':
                            $this->character->setExperience($this->character->getExperience() + $value);
                            break;
                        case 'crown':
                            $this->character->setFortune($this->character->getFortune() + $value);
                            break;
                        case 'items':
                            dd($value);
                            break;
                        default:
                            break;
                    }
                }

                $this->entityManager->persist($this->character);
                $this->characterUpdated = true;
            }

            $nextStep = $this->entityManager->getRepository(Step::class)->findNextStep($this->playerCombat->getCombat()->getStep());
            if(!$nextStep) {
                $playerQuest->setQuestStatus('completed');
                $this->description .= "<p class='text-success'><strong>Vous avez terminé la quête {$this->playerCombat->getCombat()->getQuest()->getName()}&nbsp;!</strong></p>";
                $this->characterUpdated = true;
            }

            $this->entityManager->persist($playerQuest);
        }

        $this->entityManager->flush();
        $screen = $this->entityManager->getRepository(CinematicScreen::class)->findOneBy(['slug' => 'victoire']);
        $this->changeScreen($screen->getId());

        return true;
    }

    private function resolveAttack(Player $attacker, CreaturePlayerCombat|NpcPlayerCombat $target, string $type): void
    {
        $characterItems = $this->characterItemService->getEquippedItems($attacker);
        $weaponRight = $characterItems['righthand'];
        $weaponLeft = $characterItems['lefthand'];

        switch($type) {
            case 'righthand':
                $this->handleAttack($attacker, $target, $weaponRight, 'main droite', 0);
                break;

            case 'lefthand':
                $malus = ($weaponLeft && !$weaponLeft->getItem() instanceof Magical) ? -2 : 0;
                $this->handleAttack($attacker, $target, $weaponLeft, 'main gauche', $malus);
                break;

            case 'twohands':
                $isRightMagical = $weaponRight && $weaponRight->getItem() instanceof Magical;
                $isLeftMagical = $weaponLeft && $weaponLeft->getItem() instanceof Magical;

                $malusRight = $isRightMagical ? 0 : -1;
                $malusLeft = $isLeftMagical ? 0 : -2;

                $this->handleAttack($attacker, $target, $weaponRight, 'main droite', $malusRight);
                $this->handleAttack($attacker, $target, $weaponLeft, 'main gauche', $malusLeft);
                break;
        }
    }

    private function handleAttack(Player $attacker, CreaturePlayerCombat|NpcPlayerCombat $target, ?CharacterItem $weapon, string $hand, int $malus): void
    {
        if(!$weapon) {
            $this->description .= "Vous tentez une attaque avec $hand, mais vous n'avez pas d'arme équipée !<br/>";

            return;
        }

        $isMagical = $weapon->getItem() instanceof Magical;

        if($isMagical && $weapon->getCharge() <= 0) {
            $this->description .= "<span class='text-danger'>Votre {$weapon->getItem()->getName()} n'a plus de charges&nbsp;!</span><br/>";

            return;
        }

        // Jet d'attaque
        if($isMagical) {
            $attackRoll = random_int(7, 20) + $attacker->getIntelligence();
        } else {
            $attackRoll = random_int(1, 20) + $attacker->getStrength() + floor($attacker->getLevel() / 2) + $malus;
        }

        // Jet de défense
        if($target instanceof CreaturePlayerCombat) {
            $defenseRoll = $isMagical
                ? random_int(1, 15) + $target->getCreature()->getWisdom()
                : random_int(1, 20) + $target->getCreature()->getDexterity();
            $defenseBonus = floor($target->getCreature()->getDefense() / 2);
            $targetName = $target->getCreature()->getName();
        } else if($target instanceof NpcPlayerCombat) {
            $defenseRoll = $isMagical
                ? random_int(1, 15) + $target->getNpc()->getWisdom()
                : random_int(1, 20) + $target->getNpc()->getDexterity();
            $defenseBonus = floor($this->characterBonusService->getCharacterBonus($target->getNpc(), 'defense')['amount'] / 2);
            $targetName = $target->getNpc()->getName();
        }

        // Vérification de la réussite
        if($attackRoll >= $defenseRoll) {
            $isCritical = ($attackRoll == 20);

            if($isMagical) {
                $damage = $weapon->getItem()->getAmount(); // Dégâts fixes pour la magie
                $weapon->setCharge(max(0, $weapon->getCharge() - 1));
                $this->description .= "<span class='text-info'>L'arme magique {$weapon->getItem()->getName()} perd 1 charge !</span><br/>";
            } else {
                // Calcul des dégâts de l'arme physique
                $weaponDamage = $weapon->getItem()->getDamage(); // Dégâts propres à l'arme
                if($weapon->getItem()->getTarget() === 'damage') {
                    $weaponDamage += $weapon->getItem()->getAmount(); // Dégâts supplémentaires si arme enchantés
                }
                $strengthBonus = floor($attacker->getStrength() / 4); // Bonus de force
                $baseDamage = random_int($weaponDamage, $weaponDamage + 5) + $strengthBonus;

                // Application de la réduction d'armure sauf si coup critique
                $damage = $isCritical ? $baseDamage * 2 : max(1, $baseDamage - $defenseBonus);
            }

            if($isCritical) {
                $this->description .= "<strong class='text-danger'>Coup critique !</strong><br/>";
            }

            $target->setHealth(max(0, $target->getHealth() - $damage));
            $this->description .= "<span class='text-success'>Vous infligez $damage dégât" . ($damage > 1 ? 's' : '') . " à $targetName avec {$weapon->getItem()->getName()} ($hand).</span><br/>";

            if($target->getHealth() <= 0) {
                $this->description .= "<strong class='text-success'>Vous avez tué $targetName !</strong><br/>";
            }

            $this->entityManager->persist($target);
            $this->entityManager->persist($weapon);
            $this->entityManager->flush();
        } else {
            $this->description .= "Votre attaque échoue, $targetName esquive !<br/>";
        }
    }

    private function executeEnemyAttack($enemy): void
    {
        $target = $this->character;
        $attackRoll = random_int(1, 20);

        if($enemy instanceof CreaturePlayerCombat) {
            $attackRoll += $enemy->getCreature()->getStrength();
            $damageRange = [$enemy->getCreature()->getDamage(), $enemy->getCreature()->getDamage() + 4];
        } else if($enemy instanceof NpcPlayerCombat) {
            $attackRoll += $enemy->getNpc()->getStrength();
            $damageRange = [$this->characterBonusService->getCharacterBonus($enemy->getNpc(), 'damage')['amount'] - 2,
                $this->characterBonusService->getCharacterBonus($enemy->getNpc(), 'damage')['amount'] + 2];
        }

        $defenseRoll = random_int(1, 20) + $target->getDexterity();
        $defenseBonus = $this->characterBonusService->getCharacterBonus($target, 'defense')['amount'] + floor($target->getConstitution() / 2);

        if($attackRoll >= $defenseRoll) {
            $baseDamage = random_int($damageRange[0], $damageRange[1]);
            $damage = max(1, $baseDamage - $defenseBonus);

            if($attackRoll == 20) {
                $damage *= 2;
                $this->description .= "<strong class='text-danger'>{$enemy->getCreature()->getName()} vous inflige un coup critique !</strong><br/>";
            }

            $target->setHealth(max(0, $target->getHealth() - $damage));
            $this->description .= "<span class='text-warning'>{$enemy->getCreature()->getName()} vous attaque et inflige $damage dégât" . ($damage > 1 ? 's' : '') . ".</span><br/>";

        } else {
            $this->description .= "{$enemy->getCreature()->getName()} tente de vous attaquer mais vous esquivez !<br/>";
        }

        if($target->getHealth() <= 0) {
            $this->description = '';
            $screen = $this->entityManager->getRepository(CinematicScreen::class)->findOneBy(['slug' => 'defaite']);
            $this->changeScreen($screen->getId());
        }

        $this->entityManager->persist($target);
        $this->entityManager->flush();
    }

    private function nextTurn(): void
    {
        // Passer au protagoniste suivant
        $this->currentTurn++;

        // Si on a atteint la fin de la liste, recommencer depuis le premier
        if($this->currentTurn >= count($this->turnOrder)) {
            $this->currentTurn = 0;
            $this->initializeTurnOrder();
            $this->nbTurns++;
            $this->description .= "</p><h3>Tour {$this->nbTurns} :</h3>";
        }

        // Relancer l'exécution du tour pour le prochain protagoniste
        $this->executeTurn();
    }

    private function initializeTurnOrder(): void
    {
        $entities = [['type' => 'player', 'id' => $this->character->getId()]];
        $playerCombat = $this->entityManager->getRepository(PlayerCombat::class)->find($this->playerCombat->getId());

        $i = 0;
        foreach($playerCombat->getCreaturePlayerCombats() as $combatCreature) {
            $i++;
            if($combatCreature->getHealth() > 0) {
                $entities[] = ['type' => 'creature_combat', 'id' => $combatCreature->getId(), 'position' => $i];
            }
        }

        $i = 0;
        foreach($playerCombat->getNpcPlayerCombats() as $combatNpc) {
            $i++;
            if($combatNpc->getHealth() > 0) {
                $entities[] = ['type' => 'npc_combat', 'id' => $combatNpc->getId(), 'position' => $i];
            }
        }

        usort($entities, function($a, $b) {
            $initiativeA = $this->getInitiative($a['type'], $a['id']);
            $initiativeB = $this->getInitiative($b['type'], $b['id']);

            return $initiativeB <=> $initiativeA;
        });

        $this->turnOrder = $entities;
        $this->currentTurn = 0;
    }

    private function getInitiative(string $type, int $id): int
    {
        $entity = $this->fetchEntityById($type, $id);

        return match ($type) {
            'player' => random_int(1, 20) + $entity->getDexterity(),
            'creature_combat' => random_int(1, 20) + $entity->getCreature()->getDexterity(),
            'npc_combat' => random_int(1, 20) + $entity->getNpc()->getDexterity(),
            default => 0,
        };
    }

    private function fetchEntityById(string $type, int $id)
    {
        return match ($type) {
            'player' => $this->entityManager->getRepository(Player::class)->find($id),
            'creature_combat' => $this->entityManager->getRepository(CreaturePlayerCombat::class)->find($id),
            'npc_combat' => $this->entityManager->getRepository(NpcPlayerCombat::class)->find($id),
            default => throw new \Exception("Type d'entité inconnu pour l'ID : $id"),
        };
    }
}
