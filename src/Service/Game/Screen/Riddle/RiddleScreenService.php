<?php

namespace App\Service\Game\Screen\Riddle;

use App\Entity\Character\Player;
use App\Entity\Riddle\RiddleQuestion;
use App\Entity\Screen\RiddleScreen;
use App\Service\Game\Navigation\ExitActionResolver;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

readonly class RiddleScreenService
{
    public function __construct(
        private EntityManagerInterface     $entityManager,
        private ExitActionResolver         $exitActionResolver,
        private EventDispatcherInterface   $eventDispatcher
    )
    {
    }

    public function getScreen(RiddleQuestion $riddleQuestion, Player $player): RiddleScreen
    {
        $screen = $this->entityManager->getRepository(RiddleScreen::class)->findOneBy(['riddleQuestion' => $riddleQuestion]);
        if(!$screen) {
            $screen = (new RiddleScreen())
                ->setName($riddleQuestion->getRiddle()->getName())
                ->setPicture($riddleQuestion->getPicture())
                ->setDescription($riddleQuestion->getText())
                ->setType('riddle')
                ->setRiddleQuestion($riddleQuestion);
        }

        $this->createScreenActions($screen, $player);
        $this->entityManager->persist($screen);
        $this->entityManager->flush();

        return $screen;
    }

    private function createScreenActions(RiddleScreen $screen, Player $player): void
    {
        $footerActions = $this->exitActionResolver->getExitActions($screen, $player);

        $screen->setActions([
            'footer' => $footerActions,
        ]);
    }
}
