<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait GartLeForgeronTrait
{
    const GART_LE_FORGERON_DIALOG_STEPS = [
        // Ragots
        [
            'name' => 'Gart - Ragots',
            'text' => "<p><em>Moi je ne crois pas aux mages, aux spectres ou aux histoires de bouquins hantés. Un bon acier, un feu bien nourri et un marteau solide : c’est ça, la vraie magie. Et si vous survivez à Port Saint-Doux avec une épée rouillée… vous aurez mérité votre place dans la forge.</em></p>",
            'first' => true,
            'dialog' => 'rumor_gart_le_forgeron',
            'reference' => 'rumor_step_gart_le_forgeron_1',
        ],
    ];
}
