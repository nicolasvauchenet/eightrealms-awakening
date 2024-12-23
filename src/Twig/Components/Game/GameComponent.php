<?php

namespace App\Twig\Components\Game;

use App\Entity\Character\Player;
use App\Entity\Character\PlayerNpc;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Item;
use App\Entity\Location\Location;
use App\Entity\Location\Place;
use App\Entity\Quest\Quest;
use App\Entity\Quest\QuestStep;
use App\Entity\Scene\Scene;
use App\Entity\Screen\Screen;
use App\Service\Item\ItemService;
use App\Service\Location\CharacterLocationReputationService;
use App\Service\Quest\CharacterQuestService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsLiveComponent('Game', template: 'game/default/components/_index.html.twig')]
class GameComponent extends AbstractController
{
    use DefaultActionTrait;

    private EntityManagerInterface $entityManager;
    private CharacterLocationReputationService $characterLocationReputationService;
    private CharacterQuestService $characterQuestService;
    private ItemService $itemService;

    #[LiveProp(writable: true)]
    public Player $character;

    #[LiveProp(writable: true)]
    public Screen $currentScreen;

    #[LiveProp(writable: true)]
    public Scene $currentScene;

    #[LiveProp(writable: true)]
    public ?PlayerNpc $currentNpc = null;

    #[LiveProp(writable: true)]
    public bool $characterUpdated = false;

    #[LiveProp(writable: true)]
    public bool $mapUpdated = false;

    public string $currentScreenType;
    public string $currentScreenDescription = '';

    public function __construct(EntityManagerInterface             $entityManager,
                                CharacterLocationReputationService $characterLocationReputationService,
                                CharacterQuestService              $characterQuestService,
                                ItemService                        $itemService)
    {
        $this->entityManager = $entityManager;
        $this->characterLocationReputationService = $characterLocationReputationService;
        $this->characterQuestService = $characterQuestService;
        $this->itemService = $itemService;
    }

    #[PostMount]
    public function postMount(): void
    {
        $this->currentScreenType = strtolower((new \ReflectionClass($this->currentScreen))->getShortName());
        if($this->currentScreenType === 'tradescreen') {
            $this->meetNpc();
        }
        $this->updateDescription();
    }

    /**
     * @throws \ReflectionException
     */
    #[LiveAction]
    public function changeScreen(#[LiveArg] int $targetScreenId, #[LiveArg] int $targetSceneId, #[LiveArg] ?array $actionEffects): void
    {
        $this->currentScreen = $this->entityManager->getRepository(Screen::class)->find($targetScreenId);
        $this->currentScene = $this->entityManager->getRepository(Scene::class)->find($targetSceneId);
        $this->currentScreenType = strtolower((new \ReflectionClass($this->currentScreen))->getShortName());
        $this->updateDescription();

        if($actionEffects) {
            $this->doActions($actionEffects);
        }

        if($this->currentScreenType === 'tradescreen') {
            $this->meetNpc();
        }
    }

    #[LiveAction]
    public function buyItem(#[LiveArg] int $itemId, #[LiveArg] int $price, #[LiveArg] int $playerNpcId): void
    {
        $this->currentScreenType = strtolower((new \ReflectionClass($this->currentScreen))->getShortName());

        if($this->character->getFortune() >= $price) {
            $item = $this->entityManager->getRepository(Item::class)->find($itemId);
            $playerNpc = $this->entityManager->getRepository(PlayerNpc::class)->find($playerNpcId);
            $this->character = $this->itemService->buyItem($item, $playerNpc, $price, $this->character);
            $this->currentScreenDescription = 'Vous avez acheté ' . $item->getName() . ' pour ' . $price . ' couronne' . ($price > 1 ? 's' : '') . '.';
        } else {
            $this->currentScreenDescription = "Vous n'avez pas assez de couronnes pour acheter cet objet.";
        }
    }

    #[LiveAction]
    public function sellItem(#[LiveArg] int $characterItemId, #[LiveArg] int $price, #[LiveArg] int $playerNpcId): void
    {
        $this->currentScreenType = strtolower((new \ReflectionClass($this->currentScreen))->getShortName());

        $playerNpc = $this->entityManager->getRepository(PlayerNpc::class)->find($playerNpcId);
        if($playerNpc->getFortune() >= $price) {
            $characterItem = $this->entityManager->getRepository(CharacterItem::class)->find($characterItemId);
            $this->character = $this->itemService->sellItem($characterItem, $playerNpc, $price, $this->character);
            $this->currentScreenDescription = 'Vous avez vendu ' . $characterItem->getItem()->getName() . ' pour ' . $price . ' couronne' . ($price > 1 ? 's' : '') . '.';
        } else {
            $this->currentScreenDescription = $playerNpc->getNpc()->getName() . "n'a pas assez de couronnes pour vous acheter cet objet.";
        }
    }

    private function updateCharacterPlace(): void
    {
        $this->character->setCurrentPlace($this->currentScene->getPlace())
            ->addVisitedLocation($this->currentScene->getPlace()->getLocation())
            ->addVisitedPlace($this->currentScene->getPlace());
        $this->entityManager->persist($this->character);
        $this->entityManager->flush();
    }

    private function updateDescription(): void
    {
        if($this->currentScreenType === 'placescreen') {
            $this->currentScreenDescription = $this->currentScene->getPlace()->getDescription();
            $this->updateCharacterPlace();
        } else if($this->currentScreenType === 'dialoguescreen') {
            $this->currentScreenDescription = $this->currentScene->getDescription() . $this->currentScene->getNpc()->getDescription();
        } else if($this->currentScreenType === 'tradescreen') {
            $this->currentScreenDescription = $this->currentScene->getDescription();
        }
    }

    private function doActions(array $actionEffects): void
    {
        foreach($actionEffects as $effect => $value) {
            switch($effect) {
                case 'startQuest':
                    $quest = $this->entityManager->getRepository(Quest::class)->findOneBy(['slug' => $value['quest']]);
                    $step = $this->entityManager->getRepository(QuestStep::class)->findOneBy(['slug' => $value['step']]);
                    $location = $this->entityManager->getRepository(Location::class)->findOneBy(['slug' => $value['location']]);
                    $this->characterUpdated = !$this->characterQuestService->startQuest($this->character, $quest, $step, $location);

                    break;
                case 'addPlace':
                    if(!$this->character->getVisitedPlaces()->contains($this->entityManager->getRepository(Place::class)->findOneBy(['slug' => $value]))) {
                        $this->character->addVisitedPlace($this->entityManager->getRepository(Place::class)->findOneBy(['slug' => $value]));
                        $this->entityManager->persist($this->character);
                        $this->entityManager->flush();
                        $this->mapUpdated = true;
                    }
                    break;
                case 'decreaseFortune':
                    $this->character->setFortune($this->character->getFortune() - $value['amount'] * -1);
                    if($this->character->getFortune() < 0) {
                        $this->character->setFortune(0);
                    }
                    $this->entityManager->persist($this->character);
                    $this->entityManager->flush();
                    $this->characterUpdated = true;
                    break;
                case 'increaseLocationReputation':
                    $location = $this->entityManager->getRepository(Location::class)->findOneBy(['slug' => $value['location']]);
                    $this->characterLocationReputationService->modifyReputation($this->character, $location, $value['amount']);
                    $this->characterUpdated = true;
                    break;
                case 'decreaseLocationReputation':
                    $location = $this->entityManager->getRepository(Location::class)->findOneBy(['slug' => $value['location']]);
                    $this->characterLocationReputationService->modifyReputation($this->character, $location, ($value['amount'] * -1));
                    $this->characterUpdated = true;
                    break;
                default:
                    break;
            }
        }
    }

    private function meetNpc(): void
    {
        $npc = $this->currentScene->getNpc();
        $playerNpc = $this->entityManager->getRepository(PlayerNpc::class)->findOneBy(['player' => $this->character, 'npc' => $npc]);
        if(!$playerNpc) {
            $playerNpc = (new PlayerNpc())
                ->setPlayer($this->character)
                ->setNpc($npc)
                ->setFortune($npc->getFortune());
            $this->entityManager->persist($playerNpc);
            $this->character->addPlayerNpc($playerNpc);
            $this->entityManager->persist($this->character);
            $this->entityManager->flush();
        }

        $this->currentNpc = $playerNpc;
    }
}
