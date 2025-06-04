<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait MaireDePortSaintDouxTrait
{
    const MAIRE_DE_PORT_SAINT_DOUX_DIALOG_STEPS = [
        // Ragots : Quartier de la Nouvelle Ville
        [
            'name' => 'Maire de Port Saint-Doux - Dialogue',
            'text' => "<p><em>Ah, la Nouvelle Ville… Mon projet le plus ambitieux à ce jour&nbsp;! Un quartier flambant neuf, un joyau d’urbanisme qui fera resplendir notre chère Port Saint-Doux dans tout le continent en-dessous. Enfin, nous aurons une capitale digne de ce nom, au cœur même de ce Royaume de Ploucs et de barbares. Je vous assure, sans moi, cette ville ne serait qu’un port de pêche boueux envahi de marchands illettrés.</em></p>",
            'first' => true,
            'conditions' => [
                'location_unknown' => 'nouvelle-ville',
            ],
            'dialog' => 'rumor_nouvelle_ville_maire_de_port_saint_doux',
            'reference' => 'rumor_nouvelle_ville_maire_de_port_saint_doux_1',
        ],
        [
            'name' => "Maire de Port Saint-Doux - Nouvelle Ville",
            'text' => "<p><em>Au nord de la ville bien sûr, où voulez-vous qu'on construise&nbsp;? Vous n'étiez pas à la réunion&nbsp;? Imaginez donc&nbsp;:&nbsp;un Théâtre de la Renaissance, plus raffiné encore que les salles elfiques&nbsp;;&nbsp;une Grande Bibliothèque, où chaque langue du monde trouvera sa place, sauf peut-être les dialectes gobelins&nbsp;;&nbsp;une Maison des Guildes pour enfin remettre de l’ordre dans le capharnaüm commercial ambiant&nbsp;—&nbsp;fini les fraudes&nbsp;! Et surtout, la Maison de l’Urbanisme, mon chef-d'œuvre administratif, où les plus brillants architectes centraliseront les plans de la ville, recoin par recoin. Ce sera… grandiose&nbsp;! Merveilleux&nbsp;! À mon image, en somme.</em></p>",
            'effects' => [
                'reveal_location' => 'nouvelle-ville',
            ],
            'dialog' => 'rumor_nouvelle_ville_maire_de_port_saint_doux',
            'reference' => 'rumor_nouvelle_ville_maire_de_port_saint_doux_2',
        ],
        [
            'name' => 'Maire de Port Saint-Doux - Dialogue',
            'text' => "<p><em>Soyons francs. Le chantier avance, certes, mais plus lentement que prévu. Le Palais a coupé les vivres depuis le départ du Roi&nbsp;—&nbsp;quelle idée, aussi, de quitter la ville à ce moment-là… Bref. Si ça continue, je devrai gouverner seul, sans directives royales. Mais rassurez-vous, la ville ne pourrait rêver d’un meilleur guide que moi. Parce qu'il y a encore fort à faire&nbsp;:&nbsp;le vieux port n'a plus sa place, par exemple. Il faut rénover ce quartier également. Faire moderne&nbsp;! Audacieux&nbsp;!</em></p>",
            'dialog' => 'rumor_nouvelle_ville_maire_de_port_saint_doux',
            'reference' => 'rumor_nouvelle_ville_maire_de_port_saint_doux_3',
        ],

        // Ragots
        [
            'name' => 'Maire de Port Saint-Doux - Ragots',
            'text' => "<p><em>Ces pêcheurs du village de Plouc… Toujours plus nombreux, toujours plus envahissants. Je leur ai offert un quartier&nbsp;—&nbsp;un vrai geste d'ouverture&nbsp;—&nbsp;et qu’en ont-ils fait&nbsp;? Un cloaque, évidemment. Et maintenant, ils rêvent de s'étendre. Mais je veille. On ne va pas laisser la capitale se faire grignoter par des rustres. Et je ne parle même pas des druides, des nains, des orcs ou des elfes… Chacun chez soi, voilà la clé d’une ville qui fonctionne.</em></p>",
            'first' => true,
            'conditions' => [
                'location_known' => 'nouvelle-ville',
            ],

            'dialog' => 'rumor_maire_de_port_saint_doux',
            'reference' => 'rumor_maire_de_port_saint_doux_1',
        ],
    ];
}
