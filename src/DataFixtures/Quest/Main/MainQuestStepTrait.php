<?php

namespace App\DataFixtures\Quest\Main;

trait MainQuestStepTrait
{
    const MAIN_QUEST_STEPS = [
        [
            'description' => "<p>Le Royaume de l’Île du Nord est plongé dans le doute depuis la disparition du Prince Alaric, parti explorer le mystérieux Donjon de l’Âme pour prouver sa bravoure. Lorsque le Roi Galdric III a tenté de le retrouver, il n’est jamais revenu non plus… Et depuis le Royaume est sans tête et la tension est palpable au sein du peuple de l'Île. Je ne sais absolument pas par quoi commencer… Il va falloir trouver des indices.</p>",
            'position' => 1,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_1',
        ],
        [
            'description' => "<p>En explorant les Anciens Docks, j’ai découvert une note étrange, signée du Prince Alaric lui-même. Elle mentionne des druides, des portes et une clé. Ce n’est sûrement pas un hasard… Cette piste semble liée à sa disparition. Il va falloir creuser davantage.</p>",
            'position' => 2,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_2',
        ],
        [
            'description' => "<p>Théobald Gris-Murmure, un ancien druide du Bois du Pendu, m’a révélé que le Prince Alaric avait tenté de consulter leur cercle avant sa disparition. Il cherchait un ancien rituel en lien avec le Donjon de l’Âme. Une piste… enfin. Je dois aller parler à ces druides…</p>",
            'position' => 3,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_3',
        ],
        [
            'description' => "<p>Théobald m’a également parlé d'une &laquo;clé&raquo;, qui permettrait d'ouvrir &laquo;le Tombeau&raquo;. Je n'ai pas tout compris, mais ce renseignement pourrait être utile, voire crucial pour la suite…</p>",
            'position' => 4,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_4',
        ],
        [
            'description' => "<p>J'ai trouvé un médaillon étrange, orné de motifs runiques. Il semble avoir une certaine importance, alors j'en ai parlé à Wilbert, l'Arcaniste de Port Saint-Doux. Il m'a dit que ce médaillon était lié à un ancien rituel druidique, et qu'il pourrait être une partie de la clé, qu'il a appelée &laquo;le Sceau&raquo;, pour ouvrir le &laquo;Tombeau&raquo;. Je dois en apprendre davantage sur ce rituel et sur cette amulette.</p>",
            'position' => 5,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_5',
        ],
        [
            'description' => "<p>Un gobelin que j'ai croisé aux abords du village de Plouc m'a livré une information surprenante&nbsp;:&nbsp;il a vu un vieil homme, apparemment un noble, peut-être même un roi… Il se dirigeait vers le Col du Vent Noir, aux portes des Monts Terribles. Il parlait tout seul et il avait l'air en colère contre son fils qui allait faire une grosse bêtise. Le vieil homme aurait également mentionné un nom, mais je n'ai pas pu le comprendre. Cela commençait par &laquo;Nash&raquo;… Et si ce gobelin avait croisé la route du Roi Galdric ?</p>",
            'position' => 6,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_6',
        ],
        [
            'description' => "<p>J'ai rencontré le Grand Druide, dans le cercle des Bois du Pendu. Il n'est pas commode, et n'acceptera de me parler que si je passe une épreuve.</p>",
            'position' => 7,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_7',
        ],
        [
            'description' => "<p>J'ai réussi l'épreuve du Grand Druide, Peut-être acceptera-t-il de me révéler ses secrets maintenant.</p>",
            'position' => 8,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_8',
        ],
        [
            'description' => "<p>Le Grand Druide a accepté de m'en dire plus sur le rituel et l'amulette. Le Rituel de l'Âme permet d'ouvrir la porte du Donjon de l'Âme, et le Médaillon des Vents n'est qu'une partie du Sceau du Tombeau, situé aux confins du donjon. Il a catégoriquement refusé de m'en dire davantage sur le deuxième fragment, en insistant sur le fait que &laquo;Ce qui est enfermé ne l'est jamais pour rien&raquo;… Il a aussi refusé de m'apprendre le Rituel de l'Âme, mais il a admis qu'il l'avait déjà enseigné auparavant… Je dois le convaincre, j'ai besoin du rituel pour accéder au Donjon.</p>",
            'position' => 9,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_9',
        ],
        [
            'description' => "<p>Je pense avoir trouvé de quoi décider le Grand Druide à m'enseigner le rituel… Je vais retourner le voir et jouer le tout pour le tout.</p>",
            'position' => 10,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_10',
        ],
        [
            'description' => "<p>Le Grand Druide a accepté de m'enseigner le Rituel de l'Âme. Je peux désormais trouver l'entrée du Donjon, mais il me reste à résoudre l'énigme du Sceau du Tombeau…</p><p><strong>Rappel du Rituel de l’Âme&nbsp;:</strong></p><ol><li>Tracer un cercle de cendre au sol.</li><li>Placer quatre pierres aux quatre points cardinaux, chacune gravée d’un mot&nbsp;:&nbsp;Âme (nord), Mémoire (sud), Chair (est), Sang (ouest).</li><li>Déposer au centre un objet lié à un mort, puis y verser quelques gouttes de son propre sang.</li><li>Prononcer ces paroles à voix haute&nbsp;:&nbsp;&laquo;Que les morts m’entendent, que les vivants me laissent passer. Que l’Âme parle, et que la Chair se taise&raquo;.</li></ol><p>Si tout est correctement exécuté, l’entrée du Donjon de l’Âme s’ouvrira… peut-être.</p>",
            'position' => 11,
            'last' => false,
            'quest' => 'quest_main',
            'reference' => 'quest_main_step_11',
        ],
    ];
}
