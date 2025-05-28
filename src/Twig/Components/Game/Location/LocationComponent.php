<?php

namespace App\Twig\Components\Game\Location;

use App\Entity\Character\Player;
use App\Entity\Quest\PlayerQuestStep;
use App\Entity\Quest\Quest;
use App\Entity\Quest\QuestStep;
use App\Entity\Riddle\RiddleTrigger;
use App\Entity\Screen\LocationScreen;
use App\Service\Game\Screen\Location\LocationScreenService;
use App\Service\Quest\CharacterQuestService;
use App\Service\Quest\QuestProgressionService;
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

    public function __construct(private readonly EntityManagerInterface  $entityManager,
                                private readonly RiddleResolverService   $riddleResolver,
                                private readonly LocationScreenService   $locationScreenService,
                                private readonly QuestProgressionService $questProgressionService,
                                private readonly CharacterQuestService   $characterQuestService)
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
        $this->description .= $this->riddleResolver->resolve($this->character, $riddleTrigger);
        $this->screen = $this->locationScreenService->getScreen($this->character->getCurrentLocation(), $this->character);
    }

    #[LiveAction]
    public function sleep(#[LiveArg] string $slug): void
    {
        // Reset player mana
        $this->character->setMana($this->character->getManaMax());
        $this->entityManager->persist($this->character);
        $this->entityManager->flush();

        if($slug === 'le-refuge') {
            $hasQuestStep = false;
            $stepConditions = [3, 5];
            foreach($stepConditions as $step) {
                if($this->characterQuestService->hasQuestStep($this->character, [
                    'quest' => 'le-gardien-du-refuge',
                    'quest_step' => $step,
                    'status' => 'progress',
                ])) {
                    $hasQuestStep = true;
                    break;
                }
            }
            if($hasQuestStep) {
                $this->questProgressionService->editQuestStepStatus($this->character, [
                    'quest' => 'le-gardien-du-refuge',
                    'quest_step' => 6,
                    'status' => 'progress',
                ]);
            } else {
                $this->questProgressionService->editQuestStepStatus($this->character, [
                    'quest' => 'le-gardien-du-refuge',
                    'quest_step' => 1,
                    'status' => 'completed',
                ]);
                $this->questProgressionService->editQuestStepStatus($this->character, [
                    'quest' => 'le-gardien-du-refuge',
                    'quest_step' => 2,
                    'status' => 'completed',
                ]);
            }

            $this->description .= "<p class='text-info'>Vous dormez dans le refuge.</p>";
            $this->screen = $this->locationScreenService->getScreen($this->character->getCurrentLocation(), $this->character);
        }
    }
}
