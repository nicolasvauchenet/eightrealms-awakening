<?php

namespace App\Service\Game\Screen\Cinematic;

use App\Entity\Character\Player;
use App\Entity\Screen\CinematicScreen;
use App\Entity\Location\Location;
use App\Entity\Reward\Reward;
use App\Service\Game\Screen\Location\LocationScreenService;
use Doctrine\ORM\EntityManagerInterface;

readonly class CinematicScreenService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private LocationScreenService  $locationScreenService,
    )
    {
    }

    public function getVictoryScreen(string $combatName, string $description, string $picture, ?Reward $reward, Location $redirectLocation, Player $player): CinematicScreen
    {
        $slug = 'victory_' . strtolower(str_replace(' ', '_', $combatName));

        $screen = $this->entityManager->getRepository(CinematicScreen::class)->findOneBy([
            'slug' => $slug,
        ]);

        if($screen) {
            return $screen;
        }

        $redirectScreen = $this->locationScreenService->getScreen($redirectLocation, $player);

        $screen = (new CinematicScreen())
            ->setName("<small class='text-success'>Victoire</small>$combatName")
            ->setSlug($slug)
            ->setPicture($picture)
            ->setDescription($description)
            ->setType('cinematic')
            ->setReward($reward)
            ->setActions([
                'footer' => [
                    [
                        'type' => 'location',
                        'slug' => $redirectScreen->getSlug(),
                        'label' => 'Continuer',
                        'thumbnail' => 'img/core/action/continue.png',
                    ],
                ],
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
