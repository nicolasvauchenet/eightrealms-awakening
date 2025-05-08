<?php

namespace App\DataFixtures\Dialog;

use App\DataFixtures\Dialog\DialogReply\PortSaintDoux\BiloLePassantTrait;
use App\DataFixtures\Dialog\DialogReply\PortSaintDoux\GartLeForgeronTrait;
use App\DataFixtures\Dialog\DialogReply\PortSaintDoux\GrandPretreDePortSaintDouxTrait;
use App\DataFixtures\Dialog\DialogReply\PortSaintDoux\JarrodLeTavernierTrait;
use App\DataFixtures\Dialog\DialogReply\PortSaintDoux\MyraLaVieilleTrait;
use App\DataFixtures\Dialog\DialogReply\PortSaintDoux\PecheurDuQuartierDesPloucsTrait;
use App\DataFixtures\Dialog\DialogReply\PortSaintDoux\RobertLeGardeTrait;
use App\DataFixtures\Dialog\DialogReply\PortSaintDoux\SophieLaMarchandeTrait;
use App\DataFixtures\Dialog\DialogReply\PortSaintDoux\WilbertLArcanisteTrait;
use App\DataFixtures\Dialog\DialogReply\SablesChauds\FaroukLeNomadeTrait;
use App\DataFixtures\Dialog\DialogReply\SablesChauds\FauxDjinnTrait;
use App\Entity\Dialog\DialogReply;
use App\Entity\Dialog\DialogStep;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DialogReplyFixtures extends Fixture implements OrderedFixtureInterface
{
    use BiloLePassantTrait;
    use GartLeForgeronTrait;
    use GrandPretreDePortSaintDouxTrait;
    use JarrodLeTavernierTrait;
    use MyraLaVieilleTrait;
    use PecheurDuQuartierDesPloucsTrait;
    use RobertLeGardeTrait;
    use SophieLaMarchandeTrait;
    use WilbertLArcanisteTrait;
    use FaroukLeNomadeTrait;
    use FauxDjinnTrait;

    public function load(ObjectManager $manager): void
    {
        $dialogReplies = [
            // Port Saint-Doux
            self::BILO_LE_PASSANT_DIALOG_REPLIES,
            self::GART_LE_FORGERON_DIALOG_REPLIES,
            self::GRAND_PRETRE_DE_PORT_SAINT_DOUX_DIALOG_REPLIES,
            self::JARROD_LE_TAVERNIER_DIALOG_REPLIES,
            self::MYRA_LA_VIEILLE_DIALOG_REPLIES,
            self::PECHEUR_DU_QUARTIER_DES_PLOUCS_DIALOG_REPLIES,
            self::ROBERT_LE_GARDE_DIALOG_REPLIES,
            self::SOPHIE_LA_MARCHANDE_DIALOG_REPLIES,
            self::WILBERT_L_ARCANISTE_DIALOG_REPLIES,

            // Sables chauds
            self::FAROUK_LE_NOMADE_DIALOG_REPLIES,
            self::FAUX_DJINN_DIALOG_REPLIES,
        ];

        foreach($dialogReplies as $dialogReplyData) {
            foreach($dialogReplyData as $data) {
                $dialogReply = new DialogReply();
                $dialogReply->setText($data['text'] ?? null)
                    ->setConditions($data['conditions'] ?? null)
                    ->setEffects($data['effects'] ?? null)
                    ->setDialogStep($this->getReference($data['dialogStep'], DialogStep::class))
                    ->setNextStep($this->getReference($data['nextStep'], DialogStep::class));
                $manager->persist($dialogReply);
                $this->addReference($data['reference'], $dialogReply);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 33;
    }
}
