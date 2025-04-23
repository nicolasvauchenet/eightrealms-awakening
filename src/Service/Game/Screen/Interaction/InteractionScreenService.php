<?php

namespace App\Service\Game\Screen\Interaction;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Entity\Screen\InteractionScreen;
use App\Service\Game\Navigation\ExitActionResolver;
use Doctrine\ORM\EntityManagerInterface;

readonly class InteractionScreenService
{
    public function __construct(private EntityManagerInterface $entityManager,
                                private ExitActionResolver     $exitActionResolver)
    {
    }

    public function getScreen(Character $character, Player $player): InteractionScreen
    {
        $screen = $this->entityManager->getRepository(InteractionScreen::class)->findOneBy(['character' => $character]);
        if(!$screen) {
            $screen = (new InteractionScreen())
                ->setName($character->getName())
                ->setPicture($character->getPicture())
                ->setDescription($character->getDescription())
                ->setType('interaction')
                ->setCharacter($character);
        }

        $this->createScreenActions($screen);
        $this->entityManager->persist($screen);
        $this->entityManager->flush();

        return $screen;
    }

    private function createScreenActions(InteractionScreen $screen): void
    {
        $footerActions = [];
        $character = $screen->getCharacter();

        // Actions métier
        $profession = $character->getProfession();
        if($profession) {
            $tradeProfessions = ['marchand', 'forgeron', 'arcaniste', 'tavernier', 'pecheur'];
            if(in_array($profession->getSlug(), $tradeProfessions, true)) {
                $footerActions[] = [
                    'type' => 'trade',
                    'slug' => $character->getSlug(),
                    'label' => 'Marchander avec ' . $character->getName(),
                    'thumbnail' => 'img/core/action/trade.png',
                ];
            } else if($profession->getSlug() === 'pretre') {
                $footerActions[] = [
                    'type' => 'pray',
                    'slug' => $character->getSlug(),
                    'label' => 'Prier avec ' . $character->getName(),
                    'thumbnail' => 'img/core/action/pray.png',
                ];
            }
        }

        // Bouton retour
        $exitAction = $this->exitActionResolver->getExitAction($screen);
        if($exitAction) {
            $footerActions[] = $exitAction;
        }

        if(!empty($footerActions)) {
            $screen->setActions(['footer' => $footerActions]);
        }
    }
}
