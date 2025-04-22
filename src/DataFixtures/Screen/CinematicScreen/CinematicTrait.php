<?php

namespace App\DataFixtures\Screen\CinematicScreen;

use App\Entity\Screen\CinematicScreen;

trait CinematicTrait
{
    const CINEMATIC_SCREENS = [
        [
            'name' => "Chapitre I : L'Éveil",
            'picture' => 'img/core/cover.webp',
            'description' => "<p>Sur la petite île qui compose le Royaume de l’Île du Nord, un mystère grandit. Le Prince Alaric, parti courageusement explorer le redouté Donjon de l’Âme, n’a plus donné signe de vie.</p><p>Lorsque le Roi Galdric III lui-même a tenté de le secourir, il a disparu à son tour.</p><p>Désormais, les habitants de la capitale, Port Saint-Doux, murmurent des rumeurs inquiétantes : le donjon abriterait un mal ancien réveillé par l’imprudence royale.</p><p>C’est au cœur de Port Saint-Doux, dans le très animé Quartier du Marché, que votre aventure commence. Entre marchands, gardes bourrus et passants bavards, chaque rencontre pourrait vous guider vers la vérité… ou vous détourner sur un chemin inattendu.</p>",
            'actions' => [
                'reward' => [
                    'items' => [
                        'miche-de-pain',
                        'chope-de-biere',
                        'bouquet-de-fleurs',
                    ],
                ],
                'footer' => [
                    [
                        'type' => 'location',
                        'slug' => 'port-saint-doux',
                        'label' => 'Commencer',
                    ],
                ],
            ],
            'screenClass' => CinematicScreen::class,
            'reference' => 'screen_cinematic_introduction',
        ],
        [
            'name' => 'En prison…',
            'picture' => 'img/core/screen/jail.webp',
            'description' => "<p>Vous vous êtes fait arrêter, et vous atterrissez dans les geôles de Port Saint-Doux.</p><p>Vous êtes seul dans votre cellule, si on ne compte pas les rats pour de la compagnie, bien sûr.</p><p>Vous avez faim et soif, vous avez froid, vous êtes fatigué et sale. Votre peine vient de prendre fin. Vous avez hâte de sortir de cet endroit.</p>",
            'actions' => [
                'footer' => [
                    [
                        'type' => 'location',
                        'slug' => null,
                        'label' => 'Sortir',
                    ],
                ],
            ],
            'screenClass' => CinematicScreen::class,
            'reference' => 'screen_cinematic_jail',
        ],
    ];
}
