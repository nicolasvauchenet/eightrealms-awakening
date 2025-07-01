<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait GardeDuQuartierDesChauvesTrait
{
    const GARDE_DU_QUARTIER_DES_CHAUVES_DIALOG_STEPS = [
        // Dialogue : Accès au Palais
        [
            'name' => 'Garde du Quartier des Chauves - Accès au Palais',
            'text' => "<p>Un garde vous barre la route.</p><p><em>Halte&nbsp;! Le Palais est fermé. Ordre du Maire.</em></p>",
            'first' => true,
            'dialog' => 'dialog_acces_au_palais_garde_du_quartier_des_chauves',
            'reference' => 'dialog_acces_au_palais_garde_du_quartier_des_chauves_1',
        ],
        [
            'name' => 'Garde du Quartier des Chauves - Accès au Palais',
            'text' => "<p><em>Vous avez tout compris. Passez votre chemin.</em></p>",
            'dialog' => 'dialog_acces_au_palais_garde_du_quartier_des_chauves',
            'reference' => 'dialog_acces_au_palais_garde_du_quartier_des_chauves_2',
        ],
    ];
}
