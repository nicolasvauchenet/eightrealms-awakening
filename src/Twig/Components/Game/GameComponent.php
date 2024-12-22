<?php

namespace App\Twig\Components\Game;

use App\Entity\Character\Player;
use App\Entity\Location\Location;
use App\Entity\Location\Place;
use App\Entity\Scene\Scene;
use App\Entity\Screen\Screen;
use App\Service\Location\CharacterLocationReputationService;
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

    #[LiveProp(writable: true)]
    public Player $character;

    #[LiveProp(writable: true)]
    public Screen $currentScreen;

    #[LiveProp(writable: true)]
    public Scene $currentScene;

    #[LiveProp(writable: true)]
    public bool $characterUpdated = false;

    #[LiveProp(writable: true)]
    public bool $mapUpdated = false;

    public string $currentScreenType;
    public string $currentScreenDescription = '';

    public function __construct(EntityManagerInterface             $entityManager,
                                CharacterLocationReputationService $characterLocationReputationService)
    {
        $this->entityManager = $entityManager;
        $this->characterLocationReputationService = $characterLocationReputationService;
    }

    #[PostMount]
    public function postMount(): void
    {
        $this->currentScreenType = strtolower((new \ReflectionClass($this->currentScreen))->getShortName());
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
        }
    }

    private function doActions(array $actionEffects): void
    {
        foreach($actionEffects as $effect => $value) {
            switch($effect) {
                case 'decreaseFortune':
                    $this->character->setFortune($this->character->getFortune() - $value['amount'] * -1);
                    if($this->character->getFortune() < 0) {
                        $this->character->setFortune(0);
                    }
                    $this->entityManager->persist($this->character);
                    $this->entityManager->flush();
                    $this->characterUpdated = true;
                    break;
                case 'addPlace':
                    if(!$this->character->getVisitedPlaces()->contains($this->entityManager->getRepository(Place::class)->findOneBy(['slug' => $value]))) {
                        $this->character->addVisitedPlace($this->entityManager->getRepository(Place::class)->findOneBy(['slug' => $value]));
                        $this->entityManager->persist($this->character);
                        $this->entityManager->flush();
                        $this->mapUpdated = true;
                    }
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
}
