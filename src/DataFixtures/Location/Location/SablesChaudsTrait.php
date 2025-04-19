<?php

namespace App\DataFixtures\Location\Location;

trait SablesChaudsTrait
{
    const SABLES_CHAUDS_LOCATIONS = [
        // Lieu
        [
            'name' => 'Sables Chauds',
            'picture' => 'img/chapter1/location/sables-chauds.webp',
            'description' => "<p>Le désert des Sables Chauds s’étend jusqu’à l’horizon, bordé d’un côté par la mer et de l’autre par des falaises ocres. Les dunes y chantent au moindre souffle du vent. Des mirages dansent à la surface du sable, et les traces de pas s’effacent presque aussitôt. C’est un lieu oublié des cartes et des hommes, où les légendes se cachent dans les grains brûlants.</p>",
            'type' => 'location',
            'parent' => 'location_realm_royaume_de_l_ile_du_nord',
            'map' => 'map_sables_chauds',
            'reference' => 'location_sables_chauds',
        ],

        // Zone
        [
            'name' => 'Camp Abandonné',
            'picture' => 'img/chapter1/location/camp-abandonne.webp',
            'description' => "<p>Des toiles déchirées battent au vent. Le feu de camp est froid depuis longtemps. On trouve encore des restes d’objets, des notes griffonnées sur du cuir… mais aucune trace de ceux qui les ont laissés. Le silence y est oppressant, et le sable semble refuser de recouvrir cet endroit.</p>",
            'type' => 'zone',
            'parent' => 'location_sables_chauds',
            'reference' => 'location_zone_camp_abandonne',
        ],
        [
            'name' => 'Oasis Sans Nom',
            'picture' => 'img/chapter1/location/oasis-sans-nom.webp',
            'description' => "<p>Un minuscule point de verdure au milieu de nulle part. Quelques palmiers tremblent sous le vent, et une flaque d’eau limpide semble y résister à la sécheresse. Les nomades disent que les rêves les plus anciens dorment au fond de cette oasis, et qu’il faut se taire en y buvant.</p>",
            'type' => 'zone',
            'parent' => 'location_sables_chauds',
            'reference' => 'location_zone_oasis_sans_nom',
        ],
        [
            'name' => 'Plage de la Sirène',
            'picture' => 'img/chapter1/location/plage-de-la-sirene.webp',
            'description' => "<p>Ici, le désert rejoint la mer. Les vagues effleurent les dunes avec une lenteur étrange, comme si elles hésitaient à revenir. La brise y transporte un chant à peine audible, comme un appel oublié. On dit que c’est là qu’une promesse fut noyée… et qu’un objet précieux y repose toujours, enfoui dans le sable.</p>",
            'type' => 'zone',
            'parent' => 'location_sables_chauds',
            'reference' => 'location_zone_plage_de_la_sirene',
        ],
    ];
}
