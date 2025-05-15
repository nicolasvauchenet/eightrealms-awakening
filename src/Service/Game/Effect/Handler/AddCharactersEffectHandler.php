<?php

namespace App\Service\Game\Effect\Handler;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Entity\Location\CharacterLocation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\Attribute\AsTaggedItem;

#[AsTaggedItem('riddle_effect.handler')]
readonly class AddCharactersEffectHandler implements EffectHandlerInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function supports(string $type): bool
    {
        return $type === 'add_characters';
    }

    public function apply(Player $player, mixed $data): void
    {
        $values = $data['value'] ?? [];
        $conditions = $data['conditions'] ?? null;

        $location = $player->getCurrentLocation();
        if(!$location) return;

        foreach($values as $slug) {
            $character = $this->entityManager->getRepository(Character::class)->findOneBy(['slug' => $slug]);
            if(!$character) continue;

            $existing = $this->entityManager->getRepository(CharacterLocation::class)->findOneBy([
                'character' => $character,
                'location' => $location,
            ]);
            if($existing) continue;

            $characterLocation = (new CharacterLocation())
                ->setCharacter($character)
                ->setLocation($location)
                ->setConditions($conditions);

            $this->entityManager->persist($characterLocation);
        }

        $this->entityManager->flush();
    }
}
