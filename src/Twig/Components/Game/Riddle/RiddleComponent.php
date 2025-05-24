<?php

namespace App\Twig\Components\Game\Riddle;

use App\Entity\Alignment\Alignment;
use App\Entity\Alignment\PlayerAlignment;
use App\Entity\Character\Player;
use App\Entity\Quest\PlayerQuestStep;
use App\Entity\Quest\QuestStep;
use App\Entity\Riddle\PlayerRiddle;
use App\Entity\Riddle\RiddleChoice;
use App\Entity\Screen\RiddleScreen;
use App\Service\Character\CharacterAlignmentService;
use App\Service\Game\Screen\Cinematic\CinematicScreenService;
use App\Service\Quest\QuestProgressionService;
use App\Service\Quest\QuestSelectorService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsLiveComponent('RiddleScreen', template: 'game/screen/riddle/_component/_index.html.twig')]
class RiddleComponent extends AbstractController
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public Player $character;

    #[LiveProp(writable: true)]
    public RiddleScreen $screen;

    #[LiveProp(writable: true)]
    public PlayerRiddle $playerRiddle;

    #[LiveProp(writable: true)]
    public string $description = '';

    public function __construct(private readonly EntityManagerInterface    $entityManager,
                                private readonly CharacterAlignmentService $characterAlignmentService,
                                private readonly CinematicScreenService    $cinematicScreenService,
                                private readonly QuestSelectorService      $questService,
                                private readonly QuestProgressionService   $questProgressionService
    )
    {
    }

    #[
        PostMount]
    public function postMount(): void
    {
        $this->playerRiddle = $this->entityManager->getRepository(PlayerRiddle::class)->findOneBy([
            'player' => $this->character,
            'riddle' => $this->screen->getRiddleQuestion()->getRiddle(),
        ]);
        $this->entityManager->refresh($this->playerRiddle);

        $this->description = $this->screen->getRiddleQuestion()->getText();
    }

    #[LiveAction]
    public function choice(#[LiveArg] int $choiceId): RedirectResponse
    {
        $choice = $this->entityManager->getRepository(RiddleChoice::class)->find($choiceId);
        $marker = $choice->getMarker();

        $playerAlignment = $this->entityManager->getRepository(PlayerAlignment::class)->findOneBy(['player' => $this->character]);
        if(!$playerAlignment) {
            $playerAlignment = (new PlayerAlignment())
                ->setPlayer($this->character)
                ->setMarkerCounts([])
                ->setAlignment($this->entityManager->getRepository(Alignment::class)->findOneBy(['slug' => 'ame-en-germe']));
        }
        $playerAlignment->addMarker($marker);
        $matchedAlignment = $this->characterAlignmentService->match($playerAlignment);
        $playerAlignment->setAlignment($matchedAlignment);
        $this->entityManager->persist($playerAlignment);
        $this->entityManager->flush();

        if($choice->getNextRiddleQuestion()) {
            return $this->redirectToRoute('app_game_screen_riddle', [
                'id' => $choice->getNextRiddleQuestion()->getId(),
            ]);
        } else {
            if(true) {
                // Énigme résolue
                $this->playerRiddle->setSuccess(true)
                    ->setSolved(true);
                $this->entityManager->persist($this->playerRiddle);

                // Si une étape de quête est associée, on la complète
                $questStep = $this->screen->getRiddleQuestion()->getRiddle()->getQuestStep();
                if($questStep) {
                    $stepsToUnlock = $this->buildQuestStepsToUnlock($questStep);
                    $this->questProgressionService->editQuestStepStatus($this->character, $stepsToUnlock);
                }

                // Écran de résultat
                $resultScreen = $this->cinematicScreenService->getTestResultScreen($this->character, $choice->getRiddleQuestion()->getRiddle(), true);
            } else {
                // Énigme non résolue
                $this->playerRiddle->setSuccess(false)
                    ->setSolved(false);
                $this->entityManager->persist($this->playerRiddle);

                // Écran de résultat
                $resultScreen = $this->cinematicScreenService->getTestResultScreen($this->character, $choice->getRiddleQuestion()->getRiddle());
            }
            $this->entityManager->flush();

            return $this->redirectToRoute('app_game_screen_cinematic', [
                'slug' => $resultScreen->getSlug(),
            ]);
        }
    }

    private function buildQuestStepsToUnlock(QuestStep $questStep): array
    {
        $steps = [[
            'quest' => $questStep->getQuest()->getSlug(),
            'quest_step' => $questStep->getPosition(),
            'status' => 'completed',
        ]];

        $nextStep = $this->questService->getNextQuestStep($questStep);
        while($nextStep) {
            $playerStep = $this->entityManager->getRepository(PlayerQuestStep::class)
                ->findOneBy(['player' => $this->character, 'questStep' => $nextStep]);

            if(!$playerStep) {
                $steps[] = [
                    'quest' => $questStep->getQuest()->getSlug(),
                    'quest_step' => $nextStep->getPosition(),
                    'status' => 'progress',
                ];
                break;
            }

            if($playerStep->getStatus() !== 'skipped') {
                break;
            }

            $nextStep = $this->questService->getNextQuestStep($nextStep);
        }

        return $steps;
    }
}
