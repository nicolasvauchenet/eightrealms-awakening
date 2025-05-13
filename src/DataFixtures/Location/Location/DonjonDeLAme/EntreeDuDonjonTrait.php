<?php

namespace App\DataFixtures\Location\Location\DonjonDeLAme;

trait EntreeDuDonjonTrait
{
    const ENTREE_DU_DONJON_LOCATIONS = [
        [
            'name' => 'Entrée du Donjon',
            'picture' => 'img/chapter1/location/entree-du-donjon.webp',
            'description' => "<p>Le chemin serpente entre des pierres mortes et des arbres noircis, jusqu'à buter contre une façade massive, sculptée à même la roche. Aucun battant, aucune ouverture, ni même la moindre fissure ne trahit la présence d’une entrée. Le vent siffle dans le silence, et une étrange pression pèse sur la poitrine, comme si le lieu lui-même vous jaugeait.</p>",
            'descriptionAlt' => "<p>Les runes gravées sur la façade ont brillé un court instant… puis la pierre s’est fendue sans bruit. Là où il n’y avait rien quelques instants plus tôt, une ouverture béante se dresse désormais&nbsp;:&nbsp;un large hall plongé dans la pénombre. La poussière flotte en silence, troublée par de récentes empreintes de pas, brouillées par la confusion, ou autre chose. L’air y est plus froid, plus ancien. Quelque chose semble vous observer depuis l’obscurité.</p>",
            'type' => 'zone',
            'parent' => 'location_donjon_de_l_ame',
            'reference' => 'location_zone_entree_du_donjon',
        ],
    ];
}
