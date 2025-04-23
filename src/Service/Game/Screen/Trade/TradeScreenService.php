<?php

namespace App\Service\Game\Screen\Trade;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Entity\Screen\TradeScreen;
use App\Service\Game\Navigation\ExitActionResolver;
use Doctrine\ORM\EntityManagerInterface;

readonly class TradeScreenService
{
    public function __construct(private EntityManagerInterface $entityManager,
                                private ExitActionResolver     $exitActionResolver)
    {
    }

    public function getScreen(Character $character, Player $player): TradeScreen
    {
        $screen = $this->entityManager->getRepository(TradeScreen::class)->findOneBy(['character' => $character]);
        if(!$screen) {
            $screen = (new TradeScreen())
                ->setName($character->getName())
                ->setPicture($character->getPicture())
                ->setDescription($character->getDescription())
                ->setType('trade')
                ->setCharacter($character);
        }

        $this->createScreenActions($screen);
        $this->entityManager->persist($screen);
        $this->entityManager->flush();

        return $screen;
    }

    private function createScreenActions(TradeScreen $screen): void
    {
        $footerActions = $this->exitActionResolver->getExitActions($screen);

        if(!empty($footerActions)) {
            $screen->setActions(['footer' => $footerActions]);
        }
    }
}
