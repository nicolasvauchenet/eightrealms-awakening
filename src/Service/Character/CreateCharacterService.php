<?php

namespace App\Service\Character;

use App\Entity\Alignment\Alignment;
use App\Entity\Alignment\PlayerAlignment;
use App\Entity\Character\Player;
use App\Entity\Character\PreGenerated;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Food;
use App\Entity\Item\Gift;
use App\Entity\Spell\CharacterSpell;
use App\Entity\User;
use App\Service\FileUploaderService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

readonly class CreateCharacterService
{
    public function __construct(private EntityManagerInterface $entityManager,
                                private FileUploaderService    $fileUploaderService,
                                private SluggerInterface       $slugger)
    {

    }

    public function createCharacter(PreGenerated  $preGenerated,
                                    UserInterface $owner): Player
    {
        $character = new Player();
        $character = $this->initCharacterStats($preGenerated, $owner, $character);
        $character = $this->initCharacterItems($preGenerated, $character);
        $character = $this->initCharacterSpells($preGenerated, $character);
        $character = $this->initCharacterGifts($character);
        $character = $this->initCharacterAlignment($character);

        return $character;
    }

    public function saveCharacter(Player $character, PreGenerated $preGenerated, ?UploadedFile $pictureFile = null): void
    {
        if($pictureFile) {
            if($character->getPicture()) {
                $this->fileUploaderService->remove('character', $character->getPicture());
            }
            $pictureFileName = $this->fileUploaderService->upload($pictureFile, 'character', strtolower($this->slugger->slug($character->getName())));
        } else {
            $pictureFileName = $this->fileUploaderService->copyFile('core/pregenerated', $preGenerated->getPicture(), 'character', strtolower($this->slugger->slug($character->getName())));
        }
        $character->setPicture($pictureFileName)
            ->setDescription('<p>' . $character->getDescription() . '</p>');

        $this->entityManager->persist($character);
        $this->entityManager->flush();
    }

    private function initCharacterStats(PreGenerated  $preGenerated,
                                        UserInterface $owner,
                                        Player        $character): Player
    {
        $character->setOwner($this->entityManager->getRepository(User::class)->find($owner->getId()))
            ->setRace($preGenerated->getRace())
            ->setProfession($preGenerated->getProfession())
            ->setName($preGenerated->getName())
            ->setDescription(strip_tags($preGenerated->getDescription()))
            ->setPicture($preGenerated->getPicture())
            ->setStrength($preGenerated->getStrength())
            ->setDexterity($preGenerated->getDexterity())
            ->setConstitution($preGenerated->getConstitution())
            ->setWisdom($preGenerated->getWisdom())
            ->setIntelligence($preGenerated->getIntelligence())
            ->setCharisma($preGenerated->getCharisma())
            ->setHealthMax($preGenerated->getConstitution() * 10)
            ->setHealth($preGenerated->getConstitution() * 10)
            ->setManaMax($preGenerated->getIntelligence() * 5)
            ->setMana($preGenerated->getIntelligence() * 5)
            ->setFortune($preGenerated->getFortune())
            ->setLevel(1)
            ->setExperience(0);

        return $character;
    }

    private function initCharacterItems(PreGenerated $preGenerated,
                                        Player       $character): Player
    {
        foreach($preGenerated->getCharacterItems() as $preGeneratedItem) {
            $characterItem = (new CharacterItem())
                ->setCharacter($character)
                ->setItem($preGeneratedItem->getItem())
                ->setEquipped(false)
                ->setSlot(null)
                ->setHealth($preGeneratedItem->getHealth() ?? null)
                ->setCharge($preGeneratedItem->getCharge() ?? null)
                ->setQuestItem(false);
            $this->entityManager->persist($characterItem);
        }

        return $character;
    }

    private function initCharacterSpells(PreGenerated $preGenerated,
                                         Player       $character): Player
    {
        foreach($preGenerated->getCharacterSpells() as $characterSpell) {
            $newCharacterSpell = (new CharacterSpell())
                ->setCharacter($character)
                ->setSpell($characterSpell->getSpell())
                ->setLevel($characterSpell->getLevel())
                ->setManaCost($characterSpell->getManaCost())
                ->setAmountBonus($characterSpell->getAmountBonus())
                ->setAreaBonus($characterSpell->getAreaBonus())
                ->setDurationBonus($characterSpell->getDurationBonus());
            $this->entityManager->persist($newCharacterSpell);
        }

        return $character;
    }

    private function initCharacterGifts(Player $character): Player
    {
        $bread = $this->entityManager->getRepository(Food::class)->findOneBy(['slug' => 'miche-de-pain']);
        $characterItem = (new CharacterItem())
            ->setCharacter($character)
            ->setItem($bread)
            ->setEquipped(false)
            ->setQuestItem(false);
        $this->entityManager->persist($characterItem);

        $beer = $this->entityManager->getRepository(Food::class)->findOneBy(['slug' => 'chope-de-biere']);
        $characterItem = (new CharacterItem())
            ->setCharacter($character)
            ->setItem($beer)
            ->setEquipped(false)
            ->setQuestItem(false);
        $this->entityManager->persist($characterItem);

        $flowers = $this->entityManager->getRepository(Gift::class)->findOneBy(['slug' => 'bouquet-de-fleurs']);
        $characterItem = (new CharacterItem())
            ->setCharacter($character)
            ->setItem($flowers)
            ->setEquipped(false)
            ->setQuestItem(false);
        $this->entityManager->persist($characterItem);

        return $character;
    }

    public function initCharacterAlignment(Player $character): Player
    {
        $alignment = $this->entityManager->getRepository(Alignment::class)->findOneBy(['slug' => 'ame-en-germe']);
        $playerAlignment = (new PlayerAlignment())
            ->setPlayer($character)
            ->setAlignment($alignment);
        $this->entityManager->persist($playerAlignment);

        $character->setPlayerAlignment($playerAlignment);

        return $character;
    }
}
