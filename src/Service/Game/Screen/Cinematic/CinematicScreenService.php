<?php

namespace App\Service\Game\Screen\Cinematic;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Entity\Combat\Combat;
use App\Entity\Screen\CinematicScreen;
use App\Entity\Location\Location;
use App\Service\Game\Screen\Interaction\InteractionScreenService;
use App\Service\Game\Screen\Location\LocationScreenService;
use Doctrine\ORM\EntityManagerInterface;

readonly class CinematicScreenService
{
    public function __construct(
        private EntityManagerInterface   $entityManager,
        private LocationScreenService    $locationScreenService,
        private InteractionScreenService $interactionScreenService
    )
    {
    }

    public function getVictoryScreen(Combat $combat, Player $player): CinematicScreen
    {
        $slug = 'victory_' . strtolower(str_replace(' ', '_', $combat->getName()));

        $screen = $this->entityManager->getRepository(CinematicScreen::class)->findOneBy(['slug' => $slug]);
        if($screen) {
            return $screen;
        }

        // Choix de redirection dynamique
        if($combat->getRedirectToInteraction()) {
            $character = $this->entityManager->getRepository(Character::class)->findOneBy(['slug' => $combat->getRedirectToInteraction()]);
            $redirectSlug = $this->interactionScreenService->getScreen($character, $player)->getSlug();
        } else {
            $redirectSlug = $this->locationScreenService->getScreen($combat->getLocation(), $player)->getSlug();
        }

        $screen = (new CinematicScreen())
            ->setName("<small class='text-success'>Victoire</small>" . $combat->getName())
            ->setSlug($slug)
            ->setPicture($combat->getPicture())
            ->setDescription($combat->getVictoryDescription())
            ->setType('cinematic')
            ->setReward($combat->getReward())
            ->setActions([
                'footer' => [[
                    'type' => ($combat->getRedirectToInteraction() ? 'interaction' : 'location'),
                    'slug' => $redirectSlug,
                    'label' => 'Continuer',
                    'thumbnail' => 'img/core/action/continue.png',
                ]],
            ]);

        $this->entityManager->persist($screen);
        $this->entityManager->flush();

        return $screen;
    }

    public function getDefeatScreen(string $combatName, string $description, string $picture, Player $player): CinematicScreen
    {
        $slug = 'defeat_' . strtolower(str_replace(' ', '_', $combatName));

        $screen = $this->entityManager->getRepository(CinematicScreen::class)->findOneBy([
            'slug' => $slug,
        ]);

        if($screen) {
            return $screen;
        }

        $templeLocation = $this->entityManager->getRepository(Location::class)->findOneBy([
            'slug' => 'temple-de-port-saint-doux',
        ]);

        if(!$templeLocation) {
            throw new \RuntimeException('Le temple de Port Saint-Doux est introuvable.');
        }

        $redirectScreen = $this->locationScreenService->getScreen($templeLocation, $player);

        $screen = (new CinematicScreen())
            ->setName("<small class='text-danger'>Défaite</small>$combatName")
            ->setSlug($slug)
            ->setPicture($picture)
            ->setDescription($description)
            ->setType('cinematic')
            ->setActions([
                'footer' => [
                    [
                        'type' => 'location',
                        'slug' => $redirectScreen->getSlug(),
                        'label' => 'Ressusciter',
                        'thumbnail' => 'img/core/action/continue.png',
                    ],
                ],
            ]);

        $this->entityManager->persist($screen);
        $this->entityManager->flush();

        return $screen;
    }
}
