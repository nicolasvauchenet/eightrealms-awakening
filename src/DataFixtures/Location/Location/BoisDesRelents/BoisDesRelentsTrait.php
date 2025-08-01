<?php

namespace App\DataFixtures\Location\Location\BoisDesRelents;

trait BoisDesRelentsTrait
{
    const BOIS_DES_RELENTS_LOCATIONS = [
        [
            'name' => 'Bois des Relents',
            'picture' => 'img/chapter1/location/bois-des-relents.webp',
            'description' => "<p>Malgré sa canopée clairsemée et ses sentiers paisibles, une odeur tenace flotte dans l’air du Bois des Relents&nbsp;—&nbsp;mélange déroutant de terre détrempée, de mousse pourrissante et de quelque chose d’indéfinissable… comme un vieux souvenir oublié dans un coin humide.</p><p>Les habitants de Plouc évitent ces bois dès que le vent tourne, murmurant que les miasmes qui s’en échappent ne sont pas tous naturels. Certains disent qu’un ancien marais s’étend sous la surface, d’autres parlent de créatures tapies, à l’origine de ces relents peu engageants.</p>",
            'type' => 'location',
            'parent' => 'location_realm_royaume_de_l_ile_du_nord',
            'reference' => 'location_bois_des_relents',
        ],
    ];
}
