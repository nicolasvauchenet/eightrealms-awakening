<?php

namespace App\Twig\Components\Character;

use App\Entity\Character\Player;
use App\Service\Character\CharacterBonusService;
use App\Service\Item\CharacterItemService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsLiveComponent('PlayerLevel', template: 'character/sheet/level/_component/_index.html.twig')]
class LevelComponent extends AbstractController
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public Player $character;

    #[LiveProp(writable: true)]
    public string $characterType;

    #[LiveProp(writable: true)]
    public string $activeContent = 'details';

    #[LiveProp(writable: true)]
    public int $characteristicBonusMax = 0;

    #[LiveProp(writable: true)]
    public int $characteristicBonus = 0;

    #[LiveProp(writable: true)]
    public int $strength = 0;

    #[LiveProp(writable: true)]
    public int $dexterity = 0;

    #[LiveProp(writable: true)]
    public int $constitution = 0;

    #[LiveProp(writable: true)]
    public int $wisdom = 0;

    #[LiveProp(writable: true)]
    public int $intelligence = 0;

    #[LiveProp(writable: true)]
    public int $charisma = 0;

    #[LiveProp(writable: true)]
    public int $health = 0;

    #[LiveProp(writable: true)]
    public int $mana = 0;

    #[LiveProp(writable: true)]
    public string $description = '';

    #[LiveProp(writable: true)]
    public ?string $back = null;

    public function __construct(private readonly EntityManagerInterface $entityManager,
                                private readonly CharacterItemService   $characterItemService,
                                private readonly CharacterBonusService  $characterBonusService, private readonly RouterInterface $router)
    {
    }

    #[PostMount]
    public function postMount(): void
    {
        $this->character->setHealth($this->character->getHealthMax());
        $this->character->setMana($this->character->getManaMax());

        $this->characteristicBonusMax = 3;
        $this->strength = $this->character->getStrength();
        $this->dexterity = $this->character->getDexterity();
        $this->constitution = $this->character->getConstitution();
        $this->wisdom = $this->character->getWisdom();
        $this->intelligence = $this->character->getIntelligence();
        $this->charisma = $this->character->getCharisma();
        $this->health = $this->character->getHealthMax() + $this->characterBonusService->getHealth($this->character)['amount'];
        $this->mana = $this->character->getManaMax() + $this->characterBonusService->getMana($this->character)['amount'];

        $this->description = strip_tags($this->character->getDescription());
    }

    #[LiveAction]
    public function setActiveContent(#[LiveArg] string $content): void
    {
        $this->activeContent = $content;
    }

    #[LiveAction]
    public function increaseCharacteristic(#[LiveArg] string $characteristic): void
    {
        if($this->characteristicBonus < $this->characteristicBonusMax) {
            switch($characteristic) {
                case 'strength':
                    if($this->strength === $this->character->getStrength()) {
                        $this->strength++;
                        $this->characteristicBonus++;
                    }
                    break;
                case 'dexterity':
                    if($this->dexterity === $this->character->getDexterity()) {
                        $this->dexterity++;
                        $this->characteristicBonus++;
                    }
                    break;
                case 'constitution':
                    if($this->constitution === $this->character->getConstitution()) {
                        $this->constitution++;
                        $this->health = $this->constitution * 10;
                        $this->health = $this->health + $this->characterBonusService->getHealth($this->character)['amount'];
                        $this->characteristicBonus++;
                    }
                    break;
                case 'wisdom':
                    if($this->wisdom === $this->character->getWisdom()) {
                        $this->wisdom++;
                        $this->characteristicBonus++;
                    }
                    break;
                case 'intelligence':
                    if($this->intelligence === $this->character->getIntelligence()) {
                        $this->intelligence++;
                        $this->mana = $this->intelligence * 5;
                        $this->mana = $this->mana + $this->characterBonusService->getMana($this->character)['amount'];
                        $this->characteristicBonus++;
                    }
                    break;
                case 'charisma':
                    if($this->charisma === $this->character->getCharisma()) {
                        $this->charisma++;
                        $this->characteristicBonus++;
                    }
                    break;
                default:
                    break;
            }
        }
    }

    #[LiveAction]
    public function decreaseCharacteristic(#[LiveArg] string $characteristic): void
    {
        switch($characteristic) {
            case 'strength':
                if($this->strength === $this->character->getStrength() + 1) {
                    $this->strength--;
                    $this->characteristicBonus--;
                }
                break;
            case 'dexterity':
                if($this->dexterity === $this->character->getDexterity() + 1) {
                    $this->dexterity--;
                    $this->characteristicBonus--;
                }
                break;
            case 'constitution':
                if($this->constitution === $this->character->getConstitution() + 1) {
                    $this->constitution--;
                    $this->health = $this->constitution * 10;
                    $this->health = $this->health + $this->characterBonusService->getHealth($this->character)['amount'];
                    $this->characteristicBonus--;
                }
                break;
            case 'wisdom':
                if($this->wisdom === $this->character->getWisdom() + 1) {
                    $this->wisdom--;
                    $this->characteristicBonus--;
                }
                break;
            case 'intelligence':
                if($this->intelligence === $this->character->getIntelligence() + 1) {
                    $this->intelligence--;
                    $this->mana = $this->intelligence * 5;
                    $this->mana = $this->mana + $this->characterBonusService->getMana($this->character)['amount'];
                    $this->characteristicBonus--;
                }
                break;
            case 'charisma':
                if($this->charisma === $this->character->getCharisma() + 1) {
                    $this->charisma--;
                    $this->characteristicBonus--;
                }
                break;
            default:
                break;
        }
    }

    #[LiveAction]
    public function validateLevel(): RedirectResponse
    {
        if($this->characteristicBonus !== $this->characteristicBonusMax) {
            $this->addFlash('warning', "Vous n'avez pas réparti tous vos points de bonus&nbsp;!");

            return $this->redirectToRoute('app_game_character_level_home');
        }
        $this->character->setLevel($this->character->getLevel() + 1);
        $this->character->setStrength($this->strength);
        $this->character->setDexterity($this->dexterity);
        $this->character->setConstitution($this->constitution);
        $this->character->setWisdom($this->wisdom);
        $this->character->setIntelligence($this->intelligence);
        $this->character->setCharisma($this->charisma);

        $this->character->setHealthMax($this->health);
        $this->character->setHealth($this->health);
        $this->character->setManaMax($this->mana);
        $this->character->setMana($this->mana);
        $this->character->setDescription($this->description);

        $this->entityManager->persist($this->character);
        $this->entityManager->flush();

        $this->addFlash('success', "{$this->character->getName()} passe au niveau {$this->character->getLevel()}&nbsp;!");

        return $this->redirectToRoute('app_character_sheet_player', [
            'back' => $this->back,
        ]);
    }
}
