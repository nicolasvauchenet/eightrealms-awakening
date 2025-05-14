<?php

namespace App\DataFixtures\Dialog;

use App\DataFixtures\Dialog\DialogStep\BoisDuPendu\TheobaldGrisMurmureTrait;
use App\DataFixtures\Dialog\DialogStep\Plouc\ChefGobelinTrait;
use App\DataFixtures\Dialog\DialogStep\Plouc\GerardLePecheurTrait;
use App\DataFixtures\Dialog\DialogStep\PortSaintDoux\BiloLePassantTrait;
use App\DataFixtures\Dialog\DialogStep\PortSaintDoux\GartLeForgeronTrait;
use App\DataFixtures\Dialog\DialogStep\PortSaintDoux\GrandPretreDePortSaintDouxTrait;
use App\DataFixtures\Dialog\DialogStep\PortSaintDoux\JarrodLeTavernierTrait;
use App\DataFixtures\Dialog\DialogStep\PortSaintDoux\MaireDePortSaintDouxTrait;
use App\DataFixtures\Dialog\DialogStep\PortSaintDoux\MyraLaVieilleTrait;
use App\DataFixtures\Dialog\DialogStep\PortSaintDoux\PecheurDuQuartierDesPloucsTrait;
use App\DataFixtures\Dialog\DialogStep\PortSaintDoux\RobertLeGardeTrait;
use App\DataFixtures\Dialog\DialogStep\PortSaintDoux\SireneDesDocksDeLOuestTrait;
use App\DataFixtures\Dialog\DialogStep\PortSaintDoux\SophieLaMarchandeTrait;
use App\DataFixtures\Dialog\DialogStep\PortSaintDoux\WilbertLArcanisteTrait;
use App\DataFixtures\Dialog\DialogStep\SablesChauds\FaroukLeNomadeTrait;
use App\DataFixtures\Dialog\DialogStep\SablesChauds\FauxDjinnTrait;
use App\Entity\Dialog\Dialog;
use App\Entity\Dialog\DialogStep;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DialogStepFixtures extends Fixture implements OrderedFixtureInterface
{
    use BiloLePassantTrait;
    use GartLeForgeronTrait;
    use GrandPretreDePortSaintDouxTrait;
    use JarrodLeTavernierTrait;
    use MyraLaVieilleTrait;
    use SireneDesDocksDeLOuestTrait;
    use PecheurDuQuartierDesPloucsTrait;
    use RobertLeGardeTrait;
    use SophieLaMarchandeTrait;
    use WilbertLArcanisteTrait;
    use MaireDePortSaintDouxTrait;
    use FaroukLeNomadeTrait;
    use FauxDjinnTrait;
    use TheobaldGrisMurmureTrait;
    use GerardLePecheurTrait;
    use ChefGobelinTrait;

    public function load(ObjectManager $manager): void
    {
        $dialogSteps = [
            // Port Saint-Doux
            self::BILO_LE_PASSANT_DIALOG_STEPS,
            self::GART_LE_FORGERON_DIALOG_STEPS,
            self::GRAND_PRETRE_DE_PORT_SAINT_DOUX_DIALOG_STEPS,
            self::JARROD_LE_TAVERNIER_DIALOG_STEPS,
            self::MYRA_LA_VIEILLE_DIALOG_STEPS,
            self::SIRENE_DES_DOCKS_DE_L_OUEST_DIALOG_STEPS,
            self::PECHEUR_DU_QUARTIER_DES_PLOUCS_DIALOG_STEPS,
            self::ROBERT_LE_GARDE_DIALOG_STEPS,
            self::SOPHIE_LA_MARCHANDE_DIALOG_STEPS,
            self::WILBERT_L_ARCANISTE_DIALOG_STEPS,
            self::MAIRE_DE_PORT_SAINT_DOUX_DIALOG_STEPS,

            // Sables Chauds
            self::FAROUK_LE_NOMADE_DIALOG_STEPS,
            self::FAUX_DJINN_DIALOG_STEPS,

            // Bois du Pendu
            self::THEOBALD_GRIS_MURMURE_DIALOG_STEPS,

            // Plouc
            self::GERARD_LE_PECHEUR_DIALOG_STEPS,
            self::CHEF_GOBELIN_DIALOG_STEPS,
        ];

        foreach($dialogSteps as $dialogStepData) {
            foreach($dialogStepData as $data) {
                $dialogStep = new DialogStep();
                $dialogStep->setName($data['name'])
                    ->setText($data['text'])
                    ->setFirst($data['first'] ?? false)
                    ->setConditions($data['conditions'] ?? null)
                    ->setEffects($data['effects'] ?? null)
                    ->setRedirectToCombat($data['redirectToCombat'] ?? null)
                    ->setDialog($this->getReference($data['dialog'], Dialog::class));
                $manager->persist($dialogStep);
                $this->addReference($data['reference'], $dialogStep);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 34;
    }
}
