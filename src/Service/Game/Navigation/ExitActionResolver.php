<?php

namespace App\Service\Game\Navigation;

use App\Entity\Location\Location;
use App\Entity\Screen\Screen;
use App\Entity\Screen\InteractionScreen;
use App\Entity\Screen\LocationScreen;
use App\Repository\Location\CharacterLocationRepository;

readonly class ExitActionResolver
{
    public function __construct(private CharacterLocationRepository $characterLocationRepository)
    {
    }

    public function getExitAction(Screen $screen): ?array
    {
        if($screen instanceof LocationScreen) {
            $location = $screen->getLocation();

            if($location->getType() === 'building') {
                $parent = $location->getParent();
                if($parent) {
                    return $this->buildAction($parent, 'Retour', 'img/core/action/exit.png');
                }
            }
        }

        if($screen instanceof InteractionScreen) {
            $character = $screen->getCharacter();
            $charLoc = $this->characterLocationRepository->findOneBy(['character' => $character]);

            if($charLoc) {
                return $this->buildAction($charLoc->getLocation(), 'Retour', 'img/core/action/leave.png');
            }
        }

        return null;
    }

    private function buildAction(Location $location, string $label, string $thumbnail): array
    {
        return [
            'type' => 'location',
            'slug' => $location->getSlug(),
            'label' => $label,
            'thumbnail' => $thumbnail,
        ];
    }
}
