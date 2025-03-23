<?php

namespace App\Twig\Components\Game\Map;

use App\Entity\Character\Player;
use App\Entity\Combat\Combat;
use App\Entity\Combat\CreaturePlayerCombat;
use App\Entity\Combat\NpcPlayerCombat;
use App\Entity\Combat\PlayerCombat;
use App\Entity\Location\Location;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsLiveComponent('Map', template: 'game/map/default/_component/_index.html.twig')]
class MapComponent extends AbstractController
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public Player $character;

    #[LiveProp(writable: true)]
    public string $activeContent = 'walk';

    #[LiveProp(writable: false)]
    public ?Location $location = null;

    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    #[PostMount]
    public function postMount(): void
    {
        if($this->location === null) {
            $this->setCurrentLocation();
        }

        if(sizeof($this->location->getChildren()) === 0) {
            $this->activeContent = 'travel';
        }
    }

    private function setCurrentLocation(): void
    {
        $this->location = $this->character->getLocation();

        if($this->location->getType() === 'building') {
            $this->location = $this->location->getParent();
        }

        if($this->location->getType() === 'zone') {
            $this->location = $this->location->getParent();
        }
    }

    #[LiveAction]
    public function setActiveContent(#[LiveArg] string $content): void
    {
        $this->activeContent = $content;
    }

    #[LiveAction]
    public function walk(#[LiveArg] int $locationId): RedirectResponse
    {
        $location = $this->entityManager->getRepository(Location::class)->find($locationId);

        if($location->getType() === 'location' && !in_array($this->character->getLocation()->getType(), ['plain', 'forest', 'mountain'])) {
            $location = $this->randomEncounter($location);
        }

        $this->character->setLocation($location);
        $this->entityManager->persist($this->character);
        $this->entityManager->flush();

        return $this->redirectToRoute('app_game_home');
    }

    private function randomEncounter(Location $destination): Location
    {
        // 25 % de chance de déclencher une rencontre
        if(random_int(1, 100) > 25) {
            return $destination;
        }

        // Récupérer tous les combats aléatoires (sans étape de quête)
        $availableCombats = $this->entityManager->getRepository(Combat::class)->findBy(['step' => null]);

        // Filtrer ceux associés à un lieu de type 'plain', 'forest', 'mountain'
        $filteredCombats = array_filter($availableCombats, function(Combat $combat) {
            return in_array($combat->getLocation()->getType(), ['plain', 'forest', 'mountain']);
        });

        // Appliquer un filtrage de niveau (combat <= niveau du personnage)
        $characterLevel = $this->character->getLevel();
        $levelFiltered = array_filter($filteredCombats, function(Combat $combat) use ($characterLevel) {
            return $combat->getLevel() <= $characterLevel;
        });

        // Si aucun combat n’est éligible, on va à la destination finale
        if(empty($levelFiltered)) {
            return $destination;
        }

        // Choisir un combat éligible au hasard
        $selectedCombat = $levelFiltered[array_rand($levelFiltered)];

        // Vérifier si un PlayerCombat existe déjà
        $existing = $this->entityManager->getRepository(PlayerCombat::class)
            ->findOneBy(['player' => $this->character, 'combat' => $selectedCombat]);

        if(!$existing) {
            $playerCombat = (new PlayerCombat())
                ->setPlayer($this->character)
                ->setCombat($selectedCombat)
                ->setStatus('progress');

            foreach($selectedCombat->getCreatureCombats() as $creatureCombat) {
                $creaturePlayerCombat = (new CreaturePlayerCombat())
                    ->setPlayerCombat($playerCombat)
                    ->setCreature($creatureCombat->getCreature())
                    ->setHealth($creatureCombat->getCreature()->getHealthMax())
                    ->setMana($creatureCombat->getCreature()->getManaMax());

                $this->entityManager->persist($creaturePlayerCombat);
                $playerCombat->addCreaturePlayerCombat($creaturePlayerCombat);
            }

            foreach($selectedCombat->getNpcCombats() as $npcCombat) {
                $npcPlayerCombat = (new NpcPlayerCombat())
                    ->setPlayerCombat($playerCombat)
                    ->setNpc($npcCombat->getNpc())
                    ->setHealth($npcCombat->getNpc()->getHealthMax())
                    ->setMana($npcCombat->getNpc()->getManaMax());

                $this->entityManager->persist($npcPlayerCombat);
                $playerCombat->addNpcPlayerCombat($npcPlayerCombat);
            }

            $this->entityManager->persist($playerCombat);
            $this->entityManager->flush();
        }

        // Rediriger vers le lieu du combat sélectionné (combat aléatoire)
        return $selectedCombat->getLocation();
    }
}
