<?php

namespace App\Service\Game\Navigation;

use App\Entity\Screen\Screen;
use App\Repository\Location\CharacterLocationRepository;

readonly class ExitActionResolver
{
    public function __construct(private CharacterLocationRepository $characterLocationRepository)
    {
    }

    public function getExitAction(Screen $screen): ?array
    {
        $actions = $this->getExitActions($screen);

        return $actions[0] ?? null;
    }

    public function getExitActions(Screen $screen): array
    {
        $actions = [];

        // Retour au personnage (depuis un écran métier)
        if(in_array($screen->getType(), ['dialog', 'rumor', 'repair', 'reload', 'trade'], true)) {
            $character = $screen->getCharacter();
            $actions[] = $this->buildAction(
                type: 'interaction',
                slug: $character->getSlug(),
                label: $character->getName(),
                thumbnail: $character->getThumbnail()
            );
        }

        // Retour au lieu (zone, building...)
        if(in_array($screen->getType(), ['interaction', 'trade'], true)) {
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
