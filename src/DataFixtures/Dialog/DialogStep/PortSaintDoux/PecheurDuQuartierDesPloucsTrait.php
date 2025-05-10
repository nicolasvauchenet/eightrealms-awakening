<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait PecheurDuQuartierDesPloucsTrait
{
    const PECHEUR_DU_QUARTIER_DES_PLOUCS_DIALOG_STEPS = [
        // Ragots
        [
            'name' => 'Pêcheur du Quartier des Ploucs - Ragots',
            'text' => "<p><em>Les gens parlent de disparitions, de monstres et d’ombres. Moi, j’vois surtout le prix du sel qui a encore augmenté. Vous savez combien de poissons faut vendre pour s’acheter une botte de carottes&nbsp;? Trop. Mais bon, la mer est fidèle… tant qu’on ne la provoque pas.</em></p>",
            'first' => true,
            'dialog' => 'rumor_pecheur',
            'reference' => 'rumor_step_pecheur_1',
        ],
    ];
}
