<?php

namespace App\DataFixtures\Dialog\DialogReply\PortSaintDoux;

trait GardeDuPalaisTrait
{
    const GARDE_DU_PALAIS_DIALOG_REPLIES = [
        // Dialogue : Accès aux Appartements Royaux
        [
            'text' => "Robert m'a autorisé à y aller",
            'dialogStep' => 'dialog_acces_aux_appartements_royaux_garde_du_palais_1',
            'nextStep' => 'dialog_acces_aux_appartements_royaux_garde_du_palais_2',
            'reference' => 'dialog_acces_aux_appartements_royaux_garde_du_palais_1_1',
        ],
        [
            'text' => "Robert ne sera pas content",
            'dialogStep' => 'dialog_acces_aux_appartements_royaux_garde_du_palais_2',
            'nextStep' => 'dialog_acces_aux_appartements_royaux_garde_du_palais_3',
            'reference' => 'dialog_acces_aux_appartements_royaux_garde_du_palais_2_1',
        ],
    ];
}
