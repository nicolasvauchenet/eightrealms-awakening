<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait ServanteDuPalaisTrait
{
    const SERVANTE_DU_PALAIS_DIALOG_STEPS = [
        // Quête secondaire : Un Cadeau pour la Servante
        [
            'name' => 'Servante du Palais - Rencontre',
            'text' => "<p>Vous vous approchez de la servante. Elle est agenouillée, occupée à briquer le marbre des marches du trône royal avec une énergie presque rageuse. Son chiffon humide glisse d’un geste régulier, et elle relève la tête en remarquant votre présence</p><p><em>Ah… encore un qui veut passer par ici&nbsp;? Vous n’avez pas de meilleure idée que de me faire perdre du temps, hein&nbsp;?</em></p>",
            'first' => true,
            'dialog' => 'quest_secondary_servante_du_palais',
            'reference' => 'quest_secondary_servante_du_palais_1',
        ],
        [
            'name' => 'Servante du Palais - Occupée',
            'text' => "<p>Elle pousse un petit soupir, presque imperceptible.</p><p><em>Bonjour… mais si c’est pour rester planté là à me regarder, je vous demanderais de ne pas m’interrompre. J’ai du travail.</em></p>",
            'dialog' => 'quest_secondary_servante_du_palais',
            'reference' => 'quest_secondary_servante_du_palais_2',
        ],
        [
            'name' => 'Servante du Palais - Discussion',
            'text' => "<p>La servante soupire bruyamment cette fois, laisse tomber son chiffon dans son seau et se relève en s’époussetant, le regard visiblement agacé mais résignée.</p><p><em>Très bien… mais faites vite. Je n’ai pas toute la journée.</em></p>",
            'effects' => [
                'start_quest' => 'un-cadeau-pour-la-servante',
            ],
            'dialog' => 'quest_secondary_servante_du_palais',
            'reference' => 'quest_secondary_servante_du_palais_3',
        ],
        [
            'name' => 'Servante du Palais - Au revoir',
            'text' => "<p>Elle se remet à frotter avec un peu plus d'énergie. Vous l'entendez grommeler en vous retournant.</p>",
            'dialog' => 'quest_secondary_servante_du_palais',
            'reference' => 'quest_secondary_servante_du_palais_4',
        ],
        [
            'name' => 'Servante du Palais - Refus',
            'text' => "<p>Elle croise les bras, visiblement agacée, et vous lance un regard noir.</p><p><em>Détourner l’attention des gardes&nbsp;? Vous rêvez&nbsp;! Vous croyez que j’ai envie de perdre ma place pour vos beaux yeux&nbsp;?</em></p>",
            'dialog' => 'quest_secondary_servante_du_palais',
            'reference' => 'quest_secondary_servante_du_palais_5',
        ],
        [
            'name' => 'Servante du Palais - Se plaint',
            'text' => "<p>Elle serre le poing et pointe un doigt accusateur vers vous, les yeux brillants de colère.</p><p><em>Vous voulez savoir ce que j’ai&nbsp;? Je vais vous le dire&nbsp;:&nbsp;personne ici ne me respecte&nbsp;! Je travaille comme une mule, je frotte jour et nuit, et tout ce qu’on trouve à dire, c’est que je suis lente ou inutile&nbsp;!</em></p><p>Baissant son doigt, elle fait de gros efforts pour ne pas exploser. Elle pince les lèvres si fort qu'elles commencent à blanchir, mais ne dit plus rien.</p>",
            'dialog' => 'quest_secondary_servante_du_palais',
            'reference' => 'quest_secondary_servante_du_palais_6',
        ],
        [
            'name' => 'Servante du Palais - Se radoucit',
            'text' => "<p>Elle marque un temps d’arrêt, toujours tendue. Elle déglutit, puis ramasse son chiffon. Sa voix est plus douce quand elle reprend.</p><p><em>…Merci. Je ne sais pas pourquoi je vous dis ça. Ça ne changera rien… mais merci quand même.</em></p><p>Elle retourne à sa tâche, la tête légèrement baissée.</p>",
            'dialog' => 'quest_secondary_servante_du_palais',
            'reference' => 'quest_secondary_servante_du_palais_7',
        ],
    ];
}
