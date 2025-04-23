<?php

namespace App\Service\Game\Screen\Location;

use App\Entity\Character\Player;
use App\Entity\Location\Location;
use App\Entity\Screen\LocationScreen;
use App\Service\Game\Navigation\ExitActionResolver;
use Doctrine\ORM\EntityManagerInterface;

readonly class LocationScreenService
{
    public function __construct(private EntityManagerInterface $entityManager,
                                private ExitActionResolver     $exitActionResolver)
    {
    }

    public function getScreen(Location $location, Player $player): LocationScreen
    {
        $screen = $this->entityManager->getRepository(LocationScreen::class)->findOneBy(['location' => $location]);
        if(!$screen) {
            $screen = (new LocationScreen())
                ->setName($location->getName())
                ->setPicture($location->getPicture())
                ->setDescription($location->getDescription())
                ->setType('location')
                ->setLocation($location);
        }

        $this->createScreenActions($screen, $location, $player);
        $this->entityManager->persist($screen);
        $this->entityManager->flush();

        return $screen;
    }

    private function createScreenActions(LocationScreen $screen, Location $location, Player $player): void
    {
        $footerActions = [];

        switch($location->getType()) {
            case 'location':
                // Accès aux bâtiments enfants
                $hasBuildings = false;
                foreach($location->getChildren() as $childLocation) {
                    if($childLocation->getType() === 'building') {
                        $hasBuildings = true;
                        $footerActions[] = [
                            'type' => 'location',
                            'slug' => $childLocation->getSlug(),
                            'label' => $childLocation->getName(),
                            'thumbnail' => $childLocation->getThumbnail(),
                        ];
                    }
                }

                // Explorer
                if(!$hasBuildings) {
                    $firstChild = $location->getChildren()->first();
                    if($firstChild) {
                        $footerActions[] = [
                            'type' => 'location',
                            'slug' => $firstChild->getSlug(),
                            'label' => 'Explorer',
                            'thumbnail' => 'img/core/action/walk.png',
                        ];
                    }
                }
                break;

            case 'zone':
                // Interactions avec personnages
                foreach($location->getCharacterLocations() as $characterLocation) {
                    $character = $characterLocation->getCharacter();
                    if($character instanceof Player) continue;
                    $footerActions[] = [
                        'type' => 'interaction',
                        'slug' => $character->getSlug(),
                        'label' => $character->getName(),
                        'thumbnail' => $character->getThumbnail(),
                    ];
                }

                // Accès aux bâtiments enfants
                foreach($location->getChildren() as $childLocation) {
                    if($childLocation->getType() === 'building') {
                        $footerActions[] = [
                            'type' => 'location',
                            'slug' => $childLocation->getSlug(),
                            'label' => $childLocation->getName(),
                            'thumbnail' => $childLocation->getThumbnail(),
                        ];
                    }
                }

                // Zone suivante
                $parent = $location->getParent();
                if($parent) {
                    $siblings = $parent->getChildren()->filter(
                        fn(Location $child) => $child->getType() === 'zone'
                    )->getValues();

                    $currentIndex = array_search($location, $siblings, true);

                    if($currentIndex !== false) {
                        $nextIndex = $currentIndex + 1;

                        if(isset($siblings[$nextIndex])) {
                            $nextZone = $siblings[$nextIndex];
                        } else {
                            // Boucle : retour à la première zone
                            $nextZone = $siblings[0] ?? null;
                        }

                        if($nextZone && $nextZone !== $location) {
                            $footerActions[] = [
                                'type' => 'location',
                                'slug' => $nextZone->getSlug(),
                                'label' => 'Explorer',
                                'thumbnail' => 'img/core/action/walk.png',
                            ];
                        }
                    }
                }
                break;

            case 'building':
                // Interactions avec personnages
                foreach($location->getCharacterLocations() as $characterLocation) {
                    $character = $characterLocation->getCharacter();
                    $footerActions[] = [
                        'type' => 'interaction',
                        'slug' => $character->getSlug(),
                        'label' => $character->getName(),
                        'thumbnail' => $character->getThumbnail(),
                    ];
                }

                // Retour vers la zone
                $exitAction = $this->exitActionResolver->getExitAction($screen);
                if($exitAction) {
                    $footerActions[] = $exitAction;
                }
                break;
        }

        if(!empty($footerActions)) {
            $screen->setActions(['footer' => $footerActions]);
        }
    }
}
