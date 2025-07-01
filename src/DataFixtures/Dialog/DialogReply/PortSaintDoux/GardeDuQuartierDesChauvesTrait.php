<?php

namespace App\DataFixtures\Dialog\DialogReply\PortSaintDoux;

trait GardeDuQuartierDesChauvesTrait
{
    const GARDE_DU_QUARTIER_DES_CHAUVES_DIALOG_REPLIES = [
        // Dialogue : Accès au Palais
        [
            'text' => "Le Palais est fermé&nbsp;?",
            'dialogStep' => 'dialog_acces_au_palais_garde_du_quartier_des_chauves_1',
            'nextStep' => 'dialog_acces_au_palais_garde_du_quartier_des_chauves_2',
            'reference' => 'dialog_acces_au_palais_garde_du_quartier_des_chauves_1_1',
        ],
    ];
}
