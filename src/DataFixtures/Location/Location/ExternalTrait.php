<?php

namespace App\DataFixtures\Location\Location;

trait ExternalTrait
{
    const EXTERNAL_LOCATIONS = [
        [
            'name' => 'Rencontre en ville',
            'picture' => 'img/core/location/encounter-ville.webp',
            'description' => "<p>Dans les ruelles étroites, l’agitation cache mal les intentions de certains. Une silhouette vous suit depuis quelques pas… et le vacarme de la foule ne couvre pas tout.</p>",
            'type' => 'encounter',
            'reference' => 'location_screen_encounter_ville',
        ],
        [
            'name' => 'Rencontre en plaine',
            'picture' => 'img/core/location/encounter-plaine.webp',
            'description' => "<p>Les herbes hautes ondulent comme une mer verte, mais un mouvement y trouble la surface. Une ombre passe furtivement, trop rapide pour être le vent.</p>",
            'type' => 'encounter',
            'reference' => 'location_screen_encounter_plaine',
        ],
        [
            'name' => 'Rencontre dans le désert',
            'picture' => 'img/core/location/encounter-desert.webp',
            'description' => "<p>La chaleur écrase tout. Au loin, un mirage danse… mais celui-ci vous regarde. Le sable se creuse sous vos pieds, comme avalé par une gueule invisible.</p>",
            'type' => 'encounter',
            'reference' => 'location_screen_encounter_desert',
        ],
        [
            'name' => 'Rencontre en forêt',
            'picture' => 'img/core/location/encounter-foret.webp',
            'description' => "<p>Le sous-bois devient plus sombre. Chaque pas craque un peu trop fort, chaque branche semble se tendre vers vous. Le silence est un piège, et vous venez d’y entrer.</p>",
            'type' => 'encounter',
            'reference' => 'location_screen_encounter_foret',
        ],
        [
            'name' => 'Rencontre en montagne',
            'picture' => 'img/core/location/encounter-montagne.webp',
            'description' => "<p>Le vent hurle entre les pics, emportant avec lui des murmures rocailleux. Une silhouette se détache sur la crête… puis une autre. Vous n’êtes pas seul dans ces hauteurs.</p>",
            'type' => 'encounter',
            'reference' => 'location_screen_encounter_montagne',
        ],
        [
            'name' => 'Rencontre sur la plage',
            'picture' => 'img/core/location/encounter-plage.webp',
            'description' => "<p>Les vagues s’écrasent en rythme, comme une respiration trop calme pour être rassurante. Des empreintes apparaissent dans le sable… mais vous n’avez encore rien vu.</p>",
            'type' => 'encounter',
            'reference' => 'location_screen_encounter_plage',
        ],
    ];
}
