<?php

namespace App\Service\Game\Navigation;

use App\Entity\Character\Player;
use App\Entity\Screen\Screen;
use App\Repository\Location\CharacterLocationRepository;
use App\Service\Dialog\DialogService;

readonly class ExitActionResolver
{
    public function __construct(private CharacterLocationRepository $characterLocationRepository,
                                private DialogService               $dialogService)
    {
    }

    public function getExitAction(Screen $screen, ?Player $player = null): ?array
    {
        $actions = $this->getExitActions($screen, $player);

        return $actions[0] ?? null;
    }

    public function getExitActions(Screen $screen, ?Player $player = null): array
    {
        $actions = [];

        // Retour au personnage (depuis un écran métier)
        if(in_array($screen->getType(), ['repair', 'reload', 'trade'], true)) {
            $character = $screen->getCharacter();
            $actions[] = $this->buildAction(
                type: 'interaction',
                slug: $character->getSlug(),
                label: $character->getName(),
                thumbnail: $character->getThumbnail()
            );
        }

        // Retour au personnage (depuis un écran dialogue)
        if($screen->getType() === 'dialog') {
            $character = $screen->getDialogStep()->getDialog()->getCharacter();
            if($player && ($this->dialogService->findFirstDialogStep($character, $player)) || $this->dialogService->findFirstRumorStep($character, $player)) {
                $actions[] = $this->buildAction(
                    type: 'interaction',
                    slug: $character->getSlug(),
                    label: $character->getName(),
                    thumbnail: $character->getThumbnail()
                );
            }
        }

        // Retour au lieu (zone, building...)
        if(in_array($screen->getType(), ['interaction', 'trade', 'repair', 'reload'], true)) {
            $character = $screen->getCharacter();
            $charLoc = $this->characterLocationRepository->findOneBy(['character' => $character]);

            if($charLoc) {
                $actions[] = $this->buildAction(
                    type: 'location',
                    slug: $charLoc->getLocation()->getSlug(),
                    label: $charLoc->getLocation()->getName(),
                    thumbnail: 'img/core/action/leave.png'
                );
            }
        } else if($screen->getType() === 'dialog') {
            $character = $screen->getDialogStep()->getDialog()->getCharacter();
            $charLoc = $this->characterLocationRepository->findOneBy(['character' => $character]);

            if($charLoc) {
                $actions[] = $this->buildAction(
                    type: 'location',
                    slug: $charLoc->getLocation()->getSlug(),
                    label: $charLoc->getLocation()->getName(),
                    thumbnail: 'img/core/action/leave.png'
                );
            }
        }

        if($screen->getType() === 'location') {
            $location = $screen->getLocation();

            if($location->getType() === 'building') {
                $parent = $location->getParent();
                if($parent) {
                    $actions[] = $this->buildAction(
                        type: 'location',
                        slug: $parent->getSlug(),
                        label: $parent->getName(),
                        thumbnail: 'img/core/action/exit.png'
                    );
                }
            }
        }

        return $actions;
    }

    private function buildAction(string $type, string $slug, string $label, string $thumbnail): array
    {
        return [
            'type' => $type,
            'slug' => $slug,
            'label' => $label,
            'thumbnail' => $thumbnail,
        ];
    }
}
