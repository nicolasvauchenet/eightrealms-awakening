<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait GardeDuPalaisTrait
{
    const GARDE_DU_PALAIS_DIALOG_STEPS = [
        // Dialogue : Accès aux Appartements Royaux
        [
            'name' => 'Garde du Palais - Accès aux Appartements Royaux',
            'text' => "<p>Vous vous approchez des escaliers. Arrivé à la première marche, un des gardes vous interpelle et se précipite vers vous.</p><p><em>Halte&nbsp;! Où comptez-vous aller comme ça&nbsp;?</em></p>",
            'first' => true,
            'dialog' => 'dialog_acces_aux_appartements_royaux_garde_du_palais',
            'reference' => 'dialog_acces_aux_appartements_royaux_garde_du_palais_1',
        ],
        [
            'name' => 'Garde du Palais - Accès aux Appartements Royaux',
            'text' => "<p><em>Le Palais n'est pas un jardin public. Et autorisation ou pas, l'accès aux étages est strictement interdit. Dégagez.</em></p>",
            'dialog' => 'dialog_acces_aux_appartements_royaux_garde_du_palais',
            'reference' => 'dialog_acces_aux_appartements_royaux_garde_du_palais_2',
        ],
        [
            'name' => 'Garde du Palais - Accès aux Appartements Royaux',
            'text' => "<p>Il vous barre le chemin, la main sur la garde de son arme et l'air menaçant.</p><p><em>Robert n'a plus autorité sur le Palais. D'autant plus en l'absence du Roi. Vous pouvez bien aller pleurer auprès de lui, ça ne changera rien. Barrez-vous.</em></p>",
            'dialog' => 'dialog_acces_aux_appartements_royaux_garde_du_palais',
            'reference' => 'dialog_acces_aux_appartements_royaux_garde_du_palais_3',
        ],
    ];
}
