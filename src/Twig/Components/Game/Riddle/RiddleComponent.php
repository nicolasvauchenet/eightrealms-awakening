<?php

namespace App\Twig\Components\Game\Riddle;

use App\Entity\Alignment\Alignment;
use App\Entity\Alignment\PlayerAlignment;
use App\Entity\Character\Player;
use App\Entity\Riddle\RiddleChoice;
use App\Entity\Screen\RiddleScreen;
use App\Service\Character\CharacterAlignmentService;
use App\Service\Game\Screen\Cinematic\CinematicScreenService;
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
    public string $description = '';

    public function __construct(private readonly EntityManagerInterface    $entityManager,
                                private readonly CharacterAlignmentService $characterAlignmentService,
                                private readonly CinematicScreenService    $cinematicScreenService)
    {
    }

    #[
        PostMount]
    public function postMount(): void
    {
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
            $resultScreen = $this->cinematicScreenService->getTestResultScreen($this->character, $choice->getRiddleQuestion()->getRiddle());

            return $this->redirectToRoute('app_game_screen_cinematic', [
                'slug' => $resultScreen->getSlug(),
            ]);
        }
    }
}
