<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait MaireDePortSaintDouxTrait
{
    const MAIRE_DE_PORT_SAINT_DOUX_DIALOG_STEPS = [
        // Dialogue : Rencontre
        [
            'name' => 'Maire de Port Saint-Doux - Dialogue',
            'text' => "<p>Le Maire vous observe comme s’il jugeait un meuble abîmé. Après un silence trop long, il force un sourire crispé.</p><p><em>Ah, un nouveau venu. Port Saint-Doux attire décidément toutes sortes de… voyageurs. Alors&nbsp;? On se perd&nbsp;? On cherche sa place&nbsp;?</em></p>",
            'first' => true,
            'dialog' => 'dialog_rencontre_maire_de_port_saint_doux',
            'reference' => 'dialog_rencontre_maire_de_port_saint_doux_1',
        ],
        [
            'name' => 'Maire de Port Saint-Doux - Dialogue',
            'text' => "<p>Il éclate d’un petit rire sec, sans joie.</p><p><em>Observer&nbsp;? Très bien. Mais ici, on ne reste pas longtemps simple spectateur. On s’engage. On sert une cause. La mienne, de préférence.</em></p><p>Il fait un geste large vers la ville à travers la fenêtre.</p><p><em>Port Saint-Doux renaît. Grâce à moi. Je ne tolère ni le chaos, ni les passagers clandestins.</em></p>",
            'dialog' => 'dialog_rencontre_maire_de_port_saint_doux',
            'reference' => 'dialog_rencontre_maire_de_port_saint_doux_2',
        ],
        [
            'name' => 'Maire de Port Saint-Doux - Dialogue',
            'text' => "<p>Il se redresse, visiblement flatté.</p><p><em>Exactement. J’ai su prendre les rênes pendant que d’autres s’effondraient ou fuyaient leurs responsabilités.</em></p><p>Il prend un ton solennel, visiblement travaillé pour les grandes occasions.</p><p><em>Ici, je gouverne. Et je gouverne bien.</em></p><p>Il marque une pause dramatique.</p><p><em>Le Royaume aura tôt ou tard besoin d’un homme comme moi. Vision, poigne, sens du devoir… Ce sont des qualités qui se perdent.</em></p>",
            'dialog' => 'dialog_rencontre_maire_de_port_saint_doux',
            'reference' => 'dialog_rencontre_maire_de_port_saint_doux_3',
        ],
        [
            'name' => 'Maire de Port Saint-Doux - Dialogue',
            'text' => "<p>Un silence. Son sourire se fige. Il vous fixe, longuement.</p><p><em>Le Roi&nbsp;? Vraiment&nbsp;? Allons… Galdric III a disparu sans un mot, sans laisser de trace. Son héritier s'est perdu dans je ne sais quelle quête de gloire imbéc…</em></p><p>Il toussote et se reprend.</p><p><em>Bref. Si le roi était vivant, croyez-vous qu’il resterait caché&nbsp;?</em></p><p>Il marque une pause en vous fixant, comme s'il voulait vous laisser le temps de bien vous imprégner de ses dernières paroles.</p><p><em>Non. Il est parti. Définitivement. Et ce vide… je l’ai comblé. Par nécessité.</em></p><p>Il se rapproche d’un pas.</p><p><em>Ne laissez pas vos illusions troubler l’ordre que j’ai instauré. Je suis le Maire de Port Saint-Doux. Je sais tout, je vois tout, et j'entends tout. Croyez-moi.</em></p><p>Il se recule, se retourne et vous laisse en plan, sans un mot de plus, retournant vers ses conseillers.</p>",
            'dialog' => 'dialog_rencontre_maire_de_port_saint_doux',
            'reference' => 'dialog_rencontre_maire_de_port_saint_doux_4',
        ],

        // Ragots : Quartier de la Nouvelle Ville
        [
            'name' => 'Maire de Port Saint-Doux - Nouvelle Ville',
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
            'name' => 'Maire de Port Saint-Doux - Nouvelle Ville',
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
