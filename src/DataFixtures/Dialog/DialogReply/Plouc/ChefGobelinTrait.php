<?php

namespace App\DataFixtures\Dialog\DialogReply\Plouc;

trait ChefGobelinTrait
{
    const CHEF_GOBELIN_DIALOG_REPLIES = [
        // Quête
        [
            'text' => "Pourquoi attaquez-vous le village&nbsp;?",
            'dialogStep' => 'quest_step_chef_gobelin_1',
            'nextStep' => 'quest_step_chef_gobelin_2',
            'reference' => 'quest_reply_chef_gobelin_1_1',
        ],
        [
            'text' => "Et si je leur parlais en votre nom&nbsp;?",
            'dialogStep' => 'quest_step_chef_gobelin_2',
            'nextStep' => 'quest_step_chef_gobelin_3',
            'reference' => 'quest_reply_chef_gobelin_2_1',
        ],
        [
            'text' => "Vous allez partir loin et ne plus revenir",
            'dialogStep' => 'quest_step_chef_gobelin_2',
            'nextStep' => 'quest_step_chef_gobelin_4',
            'reference' => 'quest_reply_chef_gobelin_2_2',
        ],
        [
            'text' => "Merci. Bon courage avec les pêcheurs",
            'dialogStep' => 'quest_step_chef_gobelin_5',
            'nextStep' => 'quest_step_chef_gobelin_6',
            'reference' => 'quest_reply_chef_gobelin_5_1',
        ],
    ];
}
