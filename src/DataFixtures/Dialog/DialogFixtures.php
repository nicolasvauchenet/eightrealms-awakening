<?php

namespace App\DataFixtures\Dialog;

use App\DataFixtures\Dialog\Dialog\BoisDuPendu\TheobaldGrisMurmureTrait;
use App\DataFixtures\Dialog\Dialog\Plouc\ChefGobelinTrait;
use App\DataFixtures\Dialog\Dialog\Plouc\GerardLePecheurTrait;
use App\DataFixtures\Dialog\Dialog\PortSaintDoux\BiloLePassantTrait;
use App\DataFixtures\Dialog\Dialog\PortSaintDoux\GartLeForgeronTrait;
use App\DataFixtures\Dialog\Dialog\PortSaintDoux\GrandPretreDePortSaintDouxTrait;
use App\DataFixtures\Dialog\Dialog\PortSaintDoux\JarrodLeTavernierTrait;
use App\DataFixtures\Dialog\Dialog\PortSaintDoux\MaireDePortSaintDouxTrait;
use App\DataFixtures\Dialog\Dialog\PortSaintDoux\MyraLaVieilleTrait;
use App\DataFixtures\Dialog\Dialog\PortSaintDoux\PecheurDuQuartierDesPloucsTrait;
use App\DataFixtures\Dialog\Dialog\PortSaintDoux\RobertLeGardeTrait;
use App\DataFixtures\Dialog\Dialog\PortSaintDoux\SireneDesDocksDeLOuestTrait;
use App\DataFixtures\Dialog\Dialog\PortSaintDoux\SophieLaMarchandeTrait;
use App\DataFixtures\Dialog\Dialog\PortSaintDoux\WilbertLArcanisteTrait;
use App\DataFixtures\Dialog\Dialog\SablesChauds\FaroukLeNomadeTrait;
use App\DataFixtures\Dialog\Dialog\SablesChauds\FauxDjinnTrait;
use App\Entity\Dialog\Dialog;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DialogFixtures extends Fixture implements OrderedFixtureInterface
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
        $dialogs = [
            // Port Saint-Doux
            self::BILO_LE_PASSANT_DIALOGS,
            self::GART_LE_FORGERON_DIALOGS,
            self::GRAND_PRETRE_DE_PORT_SAINT_DOUX_DIALOGS,
            self::JARROD_LE_TAVERNIER_DIALOGS,
            self::MYRA_LA_VIEILLE_DIALOGS,
            self::SIRENE_DES_DOCKS_DE_L_OUEST_DIALOGS,
            self::PECHEUR_DU_QUARTIER_DES_PLOUCS_DIALOGS,
            self::ROBERT_LE_GARDE_DIALOGS,
            self::SOPHIE_LA_MARCHANDE_DIALOGS,
            self::WILBERT_L_ARCANISTE_DIALOGS,
            self::MAIRE_DE_PORT_SAINT_DOUX_DIALOGS,

            // Sables Chauds
            self::FAROUK_LE_NOMADE_DIALOGS,
            self::FAUX_DJINN_DIALOGS,

            // Bois du Pendu
            self::THEOBALD_GRIS_MURMURE_DIALOGS,

            // Plouc
            self::GERARD_LE_PECHEUR_DIALOGS,
            self::CHEF_GOBELIN_DIALOGS,
        ];

        foreach($dialogs as $dialogData) {
            foreach($dialogData as $data) {
                $dialog = new Dialog();
                $dialog->setType($data['type'])
                    ->setConditions($data['conditions'] ?? null)
                    ->setCharacter($this->getReference($data['character'], $data['characterClass']));
                $manager->persist($dialog);
                $this->addReference($data['reference'], $dialog);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 33;
    }
}
