<?php

namespace App\DataFixtures\Location\Location\SablesChauds;

trait OasisSansNomTrait
{
    const OASIS_SANS_NOM_LOCATIONS = [
        [
            'name' => 'Oasis Sans Nom',
            'picture' => 'img/chapter1/location/oasis-sans-nom.webp',
            'description' => "<p>Un minuscule point de verdure au milieu de nulle part. Quelques palmiers tremblent sous le vent, et une flaque d’eau limpide semble y résister à la sécheresse. Les nomades disent que les rêves les plus anciens dorment au fond de cette oasis, et qu’il faut se taire en y buvant.</p>",
            'type' => 'zone',
            'parent' => 'location_sables_chauds',
            'reference' => 'location_zone_oasis_sans_nom',
        ],
    ];
}
