<?php

namespace App\Service\Game\Screen\Repair;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Entity\Screen\RepairScreen;
use App\Service\Game\Navigation\ExitActionResolver;
use Doctrine\ORM\EntityManagerInterface;

readonly class RepairScreenService
{
    public function __construct(private EntityManagerInterface $entityManager,
                                private ExitActionResolver     $exitActionResolver)
    {
    }

    public function getScreen(Character $character, Player $player): RepairScreen
    {
        $screen = $this->entityManager->getRepository(RepairScreen::class)->findOneBy(['character' => $character]);
        if(!$screen) {
            $screen = (new RepairScreen())
                ->setName($character->getName())
                ->setPicture($character->getPicture())
                ->setDescription($character->getDescription())
                ->setType('repair')
                ->setCharacter($character);
        }

        $this->createScreenActions($screen, $player);
        $this->entityManager->persist($screen);
        $this->entityManager->flush();

        return $screen;
    }

    private function createScreenActions(RepairScreen $screen, Player $player): void
    {
        $footerActions = $this->exitActionResolver->getExitActions($screen, $player);

        if(!empty($footerActions)) {
            $screen->setActions(['footer' => $footerActions]);
        }
    }
}
