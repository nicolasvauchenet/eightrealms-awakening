<?php

namespace App\DataFixtures\Quest\Secondary;

trait LaFiolePerdueTrait
{
    const LA_FIOLE_PERDUE_QUEST_STEPS = [
        [
            'description' => "<p>L’Arcaniste Wilbert est hors de lui&nbsp;:&nbsp;une fiole précieuse, contenant une essence de feu instable, lui a été dérobée lors d’un cambriolage étrange. Il soupçonne un voleur venu de loin, récemment aperçu dans les quartiers bas de la ville. D'après certains témoignages, il aurait fui vers le désert…</p><p>Les Sables Chauds sont loin, et dangereux. Mais je dois découvrir qui a volé la fiole… et ce qu’il compte en faire.</p>",
            'position' => 1,
            'last' => false,
            'quest' => 'quest_secondary_la_fiole_perdue',
            'reference' => 'quest_secondary_la_fiole_perdue_step_1',
        ],
        [
            'description' => "<p>Dans un camp abandonné au cœur des Sables Chauds, j’ai rencontré un marchand nomade. Il m’a parlé d’un homme étrange, capable de se rendre invisible, qui parlait d'une fiole et d'un médaillon combinés, et qu'il allait enfin pouvoir obtenir le pouvoir du Djinn. Il se serait retranché dans l’Oasis Sans Nom, un lieu chargé de légendes…</p>",
            'position' => 2,
            'last' => false,
            'quest' => 'quest_secondary_la_fiole_perdue',
            'reference' => 'quest_secondary_la_fiole_perdue_step_2',
        ],
        [
            'description' => "<p>Dans l’Oasis Sans Nom, j’ai combattu un faux Djinn. Grâce à la fiole volée et à un mystérieux Médaillon, il avait acquis un pouvoir élémentaire destructeur… mais instable. Après sa chute, j'ai récupéré le médaillon et la fiole, brisée. Les deux artefacts semblent… interagir l'un avec l'autre, comme s'ils communiquaient.</p>",
            'position' => 3,
            'last' => false,
            'quest' => 'quest_secondary_la_fiole_perdue',
            'reference' => 'quest_secondary_la_fiole_perdue_step_3',
        ],
        [
            'description' => "<p>Je m'interroge sur ces deux objets… Je vais retourner voir Wilbert, il m'en dira sûrement davantage.</p>",
            'position' => 4,
            'last' => false,
            'quest' => 'quest_secondary_la_fiole_perdue',
            'reference' => 'quest_secondary_la_fiole_perdue_step_4',
        ],
        [
            'description' => "<p>Wilbert a récupéré sa fiole brisée, mais il pourrait peut-être encore en tirer quelque chose. Il a également reconnu le Médaillon des Vents comme un artefact ancien, réceptif à la magie élémentaire. Il m’a conseillé de le garder, affirmant que sa valeur dépassait de loin celle de la fiole…</p>",
            'position' => 5,
            'last' => true,
            'quest' => 'quest_secondary_la_fiole_perdue',
            'reference' => 'quest_secondary_la_fiole_perdue_step_5',
        ],
    ];
}
