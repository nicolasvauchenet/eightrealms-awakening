<?php

namespace App\DataFixtures\Location\Location\DonjonDeLAme;

trait AntichambreDuRoiTrait
{
    const ANTICHAMBRE_DU_ROI_LOCATIONS = [
        [
            'name' => 'Antichambre du Roi',
            'picture' => 'img/chapter1/location/antichambre-du-roi.webp',
            'description' => "<p>Une voix en colère résonne entre les murs : Alaric. Il tente en vain d’ouvrir la porte massive qui mène à la dernière salle. Son visage trahit l’impatience, peut-être même la folie, ou la peur. Le reste de la pièce est vide, mais la tension qui y règne semble prête à se matérialiser à tout moment.</p>",
            'type' => 'zone',
            'parent' => 'location_donjon_de_l_ame',
            'reference' => 'location_zone_antichambre_du_roi',
        ],
    ];
}
