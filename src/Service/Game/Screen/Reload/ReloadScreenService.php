<?php

namespace App\Service\Game\Screen\Reload;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Entity\Screen\ReloadScreen;
use App\Service\Game\Navigation\ExitActionResolver;
use Doctrine\ORM\EntityManagerInterface;

readonly class ReloadScreenService
{
    public function __construct(private EntityManagerInterface $entityManager,
                                private ExitActionResolver     $exitActionResolver)
    {
    }

    public function getScreen(Character $character, Player $player): ReloadScreen
    {
        $screen = $this->entityManager->getRepository(ReloadScreen::class)->findOneBy(['character' => $character]);
        if(!$screen) {
            $screen = (new ReloadScreen())
                ->setName($character->getName())
                ->setPicture($character->getPicture())
                ->setDescription($character->getDescription())
                ->setType('reload')
                ->setCharacter($character);
        }

        $this->createScreenActions($screen, $player);
        $this->entityManager->persist($screen);
        $this->entityManager->flush();

        return $screen;
    }

    private function createScreenActions(ReloadScreen $screen, Player $player): void
    {
        $footerActions = $this->exitActionResolver->getExitActions($screen, $player);

        if(!empty($footerActions)) {
            $screen->setActions(['footer' => $footerActions]);
        }
    }
}
