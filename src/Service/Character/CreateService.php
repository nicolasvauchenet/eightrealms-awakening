<?php

namespace App\Service\Character;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Entity\Item\CharacterItem;
use App\Entity\Location\Place;
use App\Entity\Spell\CharacterSpell;
use App\Entity\User;
use App\Service\FileUploaderService;
use Doctrine\ORM\EntityManagerInterface;

class CreateService
{
    private EntityManagerInterface $entityManager;
    private FileUploaderService $fileUploaderService;

    public function __construct(EntityManagerInterface $entityManager,
                                FileUploaderService    $fileUploaderService)
    {
        $this->entityManager = $entityManager;
        $this->fileUploaderService = $fileUploaderService;
    }

    public function createCharacter(Character $preGenerated,
                                    User      $owner): Player
    {
        $exists = $this->entityManager->getRepository(Player::class)->findOneBy(['owner' => $owner]);
        if($exists) {
            return $exists;
        }

        $character = new Player();
        $character->setName($preGenerated->getName())
            ->setDescription($preGenerated->getDescription())
            ->setHealth($preGenerated->getHealth())
            ->setMana($preGenerated->getMana())
            ->setDefense($preGenerated->getDefense())
            ->setDamage($preGenerated->getDamage())
            ->setFortune($preGenerated->getFortune())
            ->setStrength($preGenerated->getStrength())
            ->setDexterity($preGenerated->getDexterity())
            ->setConstitution($preGenerated->getConstitution())
            ->setIntelligence($preGenerated->getIntelligence())
            ->setCharisma($preGenerated->getCharisma())
            ->setLevel(1)
            ->setExperience(0)
            ->setAlive(true)
            ->setRace($preGenerated->getRace())
            ->setProfession($preGenerated->getProfession())
            ->setOwner($owner);

        $pictureFileName = $this->fileUploaderService->copyFile('core/character/pregenerated', $preGenerated->getPicture(), 'character', $preGenerated->getSlug());
        $character->setPicture($pictureFileName);

        foreach($preGenerated->getCharacterItems() as $preGeneratedItem) {
            $characterItem = new CharacterItem();
            $characterItem->setItem($preGeneratedItem->getItem())
                ->setCharacter($character)
                ->setEquipped($preGeneratedItem->isEquipped())
                ->setSlot($preGeneratedItem->getSlot())
                ->setHealth($preGeneratedItem->getHealth())
                ->setCharge($preGeneratedItem->getCharge());
            $this->entityManager->persist($characterItem);
        }

        foreach($preGenerated->getCharacterSpells() as $preGeneratedSpell) {
            $characterSpell = new CharacterSpell();
            $characterSpell->setSpell($preGeneratedSpell->getSpell())
                ->setCharacter($character)
                ->setLevel(1);
            $this->entityManager->persist($characterSpell);
        }

        $this->entityManager->persist($character);
        $this->entityManager->flush();

        return $character;
    }
}
