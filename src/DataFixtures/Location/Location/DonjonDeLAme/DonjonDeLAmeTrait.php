<?php

namespace App\DataFixtures\Location\Location\DonjonDeLAme;

trait DonjonDeLAmeTrait
{
    const DONJON_DE_L_AME_LOCATIONS = [
        [
            'name' => "Donjon de l'Âme",
            'picture' => 'img/chapter1/location/donjon-de-l-ame.webp',
            'description' => "<p>Adossé au flanc nord des Monts Terribles, le Donjon de l’Âme projette son ombre sur tout le royaume. Sa silhouette noire, anguleuse, semble avoir poussé de la montagne comme une excroissance malade. Personne ne sait qui l’a bâti, ni pourquoi, mais tous savent qu’il vaut mieux ne pas s’en approcher. Les légendes parlent de voix qui chuchotent dans le vent, de lumières qui dansent derrière les meurtrières, et de voyageurs jamais revenus.</p><p>Ses portes sont introuvables pour les yeux profanes, dissimulées par d’antiques sortilèges oubliés. Et même si on les trouvait… encore faudrait-il les ouvrir.</p>",
            'type' => 'location',
            'parent' => 'location_realm_royaume_de_l_ile_du_nord',
            'map' => 'map_donjon_de_l_ame',
            'reference' => 'location_donjon_de_l_ame',
        ],
    ];
}
