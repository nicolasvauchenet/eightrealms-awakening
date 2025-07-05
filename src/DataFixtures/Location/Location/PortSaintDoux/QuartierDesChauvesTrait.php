<?php

namespace App\DataFixtures\Location\Location\PortSaintDoux;

use App\Entity\Character\Npc;

trait QuartierDesChauvesTrait
{
    const QUARTIER_DES_CHAUVES_LOCATIONS = [
        [
            'name' => 'Quartier des Chauves',
            'picture' => 'img/chapter1/location/quartier-des-chauves.webp',
            'description' => "<p>Le Quartier des Chauves est le joyau scintillant de Port Saint-Doux, là où les pierres sont polies, les fontaines chantent à l’unisson et les gardes ont des plumes au casque — pas pour le style, mais parce qu’ils en ont les moyens. Derrière les balcons ouvragés et les grilles dorées se dissimulent les puissants de la ville&nbsp;:&nbsp;nobles, conseillers, diplomates… et quelques intrigants au sourire trop parfait pour être honnête.</p><p>Le Palais Royal trône fièrement sur la grande place, flanqué de l'Hôtel de Ville, où l’actuel maire exerce un pouvoir sans partage sous couvert de démocratie locale. Le marbre y est plus fréquent que le pavé, et on vous regarde de travers si vos bottes portent encore un peu de boue des ruelles du Marché.</p><p>Pas un mendiant à l’horizon, pas un gamin en loques. Juste des murmures feutrés, des regards en coin, et des secrets qui valent plus que l’or.</p>",
            'type' => 'zone',
            'parent' => 'location_port_saint_doux',
            'reference' => 'location_zone_quartier_des_chauves',
        ],

        // Bâtiment
        [
            'name' => 'Palais Royal',
            'picture' => 'img/chapter1/location/palais-royal.webp',
            'description' => "<p>Vestige éclatant d’une royauté désormais révolue, le Palais Royal surplombe le Quartier des Chauves avec une majesté hautaine. Ses hautes colonnes de marbre, ses jardins parfaitement taillés et ses vitraux aux armes du royaume témoignent d’un passé glorieux.</p><p>Bien que le trône soit désormais désert, le palais reste impeccablement entretenu, gardé jour et nuit par des soldats à l’armure aussi brillante que leurs moustaches sont taillées. Les curieux sont poliment refoulés&nbsp;—&nbsp;ou moins poliment, selon leur accoutrement.</p>",
            'type' => 'building',
            'thumbnail' => 'img/chapter1/location/palais-royal_thumb.webp',
            'conditions' => [
                'can_enter_location' => [
                    'conditions' => [
                        'quest_step_started' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 11,
                        ],
                    ],
                    'redirect_type' => 'dialog',
                    'redirect' => 'garde-du-quartier-des-chauves-acces-au-palais',
                ],
            ],
            'parent' => 'location_zone_quartier_des_chauves',
            'reference' => 'location_building_palais_royal',
        ],
        [
            'name' => 'Hôtel de Ville',
            'picture' => 'img/chapter1/location/hotel-de-ville.webp',
            'description' => "<p>L’Hôtel de Ville, siège de l’administration de Port Saint-Doux, affiche une austérité luxueuse&nbsp;:&nbsp;murs en pierre claire, tapisseries tissées à l’effigie du blason municipal, et escaliers en colimaçon qui grincent juste assez pour faire fuir les comploteurs discrets. C’est ici que siège le Maire, entouré d’une armée de secrétaires, scribes et courtisans zélés, tous bien plus occupés à brasser du vent qu’à le canaliser.</p><p>La salle du Conseil, interdite au public, est réputée pour ses débats enflammés… et ses plateaux de fromages d’exception. La bureaucratie y est une forme d’art, et il n’est pas rare qu’un simple formulaire doive être signé par trois personnes et tamponné à la cire pour être validé.</p><p>Un lieu où les décisions se prennent à huis clos, entre deux verres de vin et trois conseils d’anciens aux cheveux bien peignés.</p>",
            'type' => 'building',
            'thumbnail' => 'img/chapter1/location/hotel-de-ville_thumb.webp',
            'parent' => 'location_zone_quartier_des_chauves',
            'reference' => 'location_building_hotel_de_ville',
        ],

        // Room
        [
            'name' => 'Appartements Royaux',
            'picture' => 'img/chapter1/location/appartements-royaux.webp',
            'description' => "<p>Situés à l’étage du Palais Royal, les Appartements Royaux mêlent faste et silence dans une atmosphère figée hors du temps. Cette immense pièce, à la fois chambre et bureau, était jadis le cœur des décisions du royaume.</p><p>Le lit à baldaquin trône dans un coin, drapé de velours bleu nuit brodé d’or, tandis qu’au centre, un vaste bureau en bois sombre croule sous les parchemins, les cartes et les plumes figées dans l’encrier sec. Au mur, des portraits de souverains oubliés observent les visiteurs d’un regard sévère, comme s’ils jugeaient encore les affaires du royaume.</p><p>Tout semble prêt pour le retour d’un roi… mais aucun pas ne résonne sur le parquet ciré.</p>",
            'type' => 'building',
            'thumbnail' => 'img/chapter1/location/appartements-royaux_thumb.webp',
            'conditions' => [
                'can_enter_location' => [
                    'conditions' => [
                        'quest_status' => [
                            'quest' => 'un-cadeau-pour-la-servante',
                            'status' => 'completed',
                        ],
                    ],
                    'redirect_type' => 'dialog',
                    'redirect' => 'garde-du-palais-acces-aux-appartements-royaux',
                ],
            ],
            'parent' => 'location_building_palais_royal',
            'reference' => 'location_building_appartements_royaux',
        ],
        [
            'name' => 'Jardins de la Mairie',
            'picture' => 'img/chapter1/location/jardins-de-la-mairie.webp',
            'description' => "<p>Les jardins ont été soigneusement aménagés pour accueillir l’inauguration du Quartier de la Nouvelle Ville. Guirlandes tendues entre les arbres, tables garnies de victuailles, lampions colorés flottant au-dessus de la foule… Le Maire se mêle à la foule non sans une certaine réticence affichée sur son visage, entouré de ses concitoyens trop occupés à ripailler pour s'en rendre compte.</p>",
            'type' => 'building',
            'thumbnail' => 'img/chapter1/location/jardins-de-la-mairie_thumb.webp',
            'conditions' => [
                'can_enter_location' => [
                    'conditions' => [
                        'quest_started' => [
                            'quest' => 'banquet-inaugural',
                        ],
                    ],
                    'redirect_type' => 'hidden',
                ],
            ],
            'parent' => 'location_building_hotel_de_ville',
            'reference' => 'location_building_jardins_de_la_mairie',
        ],
    ];
}
