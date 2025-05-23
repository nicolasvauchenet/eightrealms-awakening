<?php

namespace App\DataFixtures\Item;

use App\Entity\Alignment\Alignment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AlignmentFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $alignments = [
            [
                'name' => 'Âme en Germe',
                'description' => "<p>Vous ne savez pas encore qui vous êtes. Et c’est très bien comme ça.</p>",
                'preferred' => [],
                'rejected' => [],
                'reference' => 'ame_en_germe',
            ],
            [
                'name' => 'Enfant du Cercle',
                'description' => "<p>Vous marchez en harmonie avec le vivant, les forces anciennes vous observent avec curiosité.</p>",
                'preferred' => ['symbiose', 'sagesse', 'empathie', 'silence'],
                'rejected' => ['vanité', 'guerre', 'cruauté'],
                'reference' => 'enfant_du_cercle',
            ],
            [
                'name' => 'Ombre des Toits',
                'description' => "<p>Vous voyez sans être vu. Le monde est un jeu d’opportunités et de silences.</p>",
                'preferred' => ['calcul', 'survie', 'détachement', 'esprit'],
                'rejected' => ['sacrifice', 'symbiose'],
                'reference' => 'ombre_des_toits',
            ],
            [
                'name' => 'Main d’Acier',
                'description' => "<p>Vous avancez sans fléchir. L’obstacle est une occasion de prouver votre valeur.</p>",
                'preferred' => ['force', 'sacrifice', 'autorité'],
                'rejected' => ['détachement', 'insouciance'],
                'reference' => 'main_d_acier',
            ],
            [
                'name' => 'Masque de l’Esprit',
                'description' => "<p>Vous cherchez la vérité derrière les illusions, même si elle vous consume.</p>",
                'preferred' => ['esprit', 'intuition', 'mystère'],
                'rejected' => ['force', 'vanité'],
                'reference' => 'masque_de_l_esprit',
            ],
            [
                'name' => 'Fureur Sauvage',
                'description' => "<p>Vous êtes un cri dans la tempête. L’instinct vous guide, et le sang vous suit.</p>",
                'preferred' => ['guerre', 'défi', 'chaos'],
                'rejected' => ['sagesse', 'équilibre'],
                'reference' => 'fureur_sauvage',
            ],
            [
                'name' => 'Brume du Dernier Souffle',
                'description' => "<p>Vous marchez avec la mort. Ni peur, ni joie, seulement le passage.</p>",
                'preferred' => ['détachement', 'oubli', 'rien'],
                'rejected' => ['symbiose', 'empathie'],
                'reference' => 'brume_du_dernier_souffle',
            ],
        ];

        foreach($alignments as $data) {
            $alignment = (new Alignment())
                ->setName($data['name'])
                ->setDescription($data['description'] ?? null)
                ->setPreferredMarkers($data['preferred'] ?? null)
                ->setRejectedMarkers($data['rejected'] ?? null);
            $manager->persist($alignment);
            $this->addReference('alignment_' . $data['reference'], $alignment);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 41;
    }
}
