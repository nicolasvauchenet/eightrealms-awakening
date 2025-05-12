<?php

namespace App\Service\Game\Navigation;

use App\Entity\Character\Player;
use App\Entity\Location\CharacterLocation;
use App\Entity\Screen\Screen;
use App\Repository\Location\CharacterLocationRepository;
use App\Service\Character\CharacterLocationSelectorService;
use App\Service\Game\Dialog\DialogService;
use Doctrine\ORM\EntityManagerInterface;

readonly class ExitActionResolver
{
    public function __construct(private CharacterLocationRepository      $characterLocationRepository,
                                private DialogService                    $dialogService,
                                private CharacterLocationSelectorService $characterLocationSelector, private EntityManagerInterface $entityManager,)
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
        $addLeaveButton = true;

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

            // On vérifie d'abord que le personnage est toujours dans une location valide
            $charLoc = $this->characterLocationSelector->getValidLocationForCharacter($character, $player);

            if($player && $charLoc && (
                    $this->dialogService->findFirstDialogStep($character, $player) ||
                    $this->dialogService->findFirstRumorStep($character, $player)
                )) {
                // Le perso est visible et a un dialogue ou une rumeur active
                $actions[] = $this->buildAction(
                    type: 'interaction',
                    slug: $character->getSlug(),
                    label: $character->getName(),
                    thumbnail: $character->getThumbnail()
                );
            }

            // On propose quand même un retour à l’emplacement d’origine du perso (même s’il a disparu)
            if(!$charLoc) {
                $charLoc = $this->entityManager->getRepository(CharacterLocation::class)->findOneBy(['character' => $character]);
                $actions[] = $this->buildAction(
                    type: 'location',
                    slug: $charLoc->getLocation()->getSlug(),
                    label: $charLoc->getLocation()->getName(),
                    thumbnail: 'img/core/action/leave.png'
                );
                $addLeaveButton = false;
            }
        }

        // Retour au lieu (zone, building...)
        if(in_array($screen->getType(), ['interaction', 'trade', 'repair', 'reload'], true)) {
            $character = $screen->getCharacter();
            $charLoc = $this->characterLocationSelector->getValidLocationForCharacter($character, $player);

            if($charLoc && $addLeaveButton) {
                $actions[] = $this->buildAction(
                    type: 'location',
                    slug: $charLoc->getLocation()->getSlug(),
                    label: $charLoc->getLocation()->getName(),
                    thumbnail: 'img/core/action/leave.png'
                );
            }
        } else if($screen->getType() === 'dialog') {
            $character = $screen->getDialogStep()->getDialog()->getCharacter();
            $charLoc = $this->characterLocationSelector->getValidLocationForCharacter($character, $player);

            if($charLoc && $addLeaveButton) {
                $actions[] = $this->buildAction(
                    type: 'location',
                    slug: $charLoc->getLocation()->getSlug(),
                    label: $charLoc->getLocation()->getName(),
                    thumbnail: 'img/core/action/leave.png'
                );
            }
        }

        if(in_array($screen->getType(), ['location', 'building'], true)) {
            $location = $screen->getLocation();

            if($location->getType() === 'building') {
                $parent = $location->getParent();
                if($parent) {
                    $actions[] = $this->buildAction(
                        type: 'location',
                        slug: $parent->getSlug(),
                        label: $parent->getName(),
                        thumbnail: 'img/core/action/' . (in_array($location->getParent()->getType(), ['location', 'zone'], true) ? 'exit' : 'leave') . '.png'
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
