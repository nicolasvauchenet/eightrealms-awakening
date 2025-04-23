<?php

namespace App\Service\Game\Screen\Combat;

use App\Entity\Combat\Combat;
use App\Entity\Character\Player;
use App\Entity\Screen\CombatScreen;
use App\Service\Game\Navigation\ExitActionResolver;
use Doctrine\ORM\EntityManagerInterface;

readonly class CombatScreenService
{
    public function __construct(private EntityManagerInterface $entityManager,
                                private ExitActionResolver     $exitActionResolver)
    {
    }

    public function getScreen(Combat $combat, Player $player): CombatScreen
    {
        $screen = $this->entityManager->getRepository(CombatScreen::class)->findOneBy(['combat' => $combat]);
        if(!$screen) {
            $screen = (new CombatScreen())
                ->setName($combat->getName())
                ->setPicture($combat->getPicture())
                ->setDescription($combat->getDescription())
                ->setType('combat')
                ->setCombat($combat);
        }

        $this->createScreenActions($screen);
        $this->entityManager->persist($screen);
        $this->entityManager->flush();

        return $screen;
    }

    private function createScreenActions(CombatScreen $screen): void
    {
        $footerActions = $this->exitActionResolver->getExitActions($screen);

        if(!empty($footerActions)) {
            $screen->setActions(['footer' => $footerActions]);
        }
    }
}
