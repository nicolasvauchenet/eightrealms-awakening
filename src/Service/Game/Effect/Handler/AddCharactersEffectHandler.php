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

    public function apply(Player $player, mixed $value): void
    {
        $values = $value['value'] ?? [];
        $conditions = $value['conditions'] ?? null;

        $location = $player->getCurrentLocation();
        if(!$location) return;

        foreach($values as $slug) {
            if(!is_string($slug) || empty($slug)) continue;
            $character = $this->entityManager->getRepository(Character::class)->findOneBy(['slug' => $slug]);
            if(!$character) continue;

            $characterLocation = $this->entityManager->getRepository(CharacterLocation::class)->findOneBy([
                'character' => $character,
                'location' => $location,
            ]);

            if(!$characterLocation) {
                $characterLocation = (new CharacterLocation())
                    ->setCharacter($character)
                    ->setLocation($location)
                    ->setConditions($conditions);
            }
            $this->entityManager->persist($characterLocation);
        }

        $this->entityManager->flush();
    }
}
