<?php

namespace App\DataFixtures\Location\Location\PortSaintDoux;

trait NouvelleVilleTrait
{
    const NOUVELLE_VILLE_LOCATIONS = [
        [
            'name' => 'Nouvelle Ville',
            'picture' => 'img/chapter1/location/nouvelle-ville.webp',
            'description' => "<p>Promue par les autorités comme le symbole du renouveau de Port Saint-Doux, la Nouvelle Ville tient davantage du chantier que du quartier. Entre les échafaudages branlants et les pavés encore humides de mortier, on devine l’ambition des urbanistes en mal de gloire&nbsp;:&nbsp;des rues larges, des bâtiments aux façades austères mais modernes, et une grande place centrale… qui sert pour l’instant de dépôt de matériaux et d’abreuvoir improvisé pour les chèvres errantes.</p><p>Quelques constructions sont déjà debout, comme la Maison des Guildes&nbsp;—&nbsp;à moitié occupée par des marchands, à moitié squattée par des ouvriers&nbsp;—&nbsp;ou encore le Bureau de l’Urbanisme, qui tient plus du cabanon de fortune que d’une institution. Les locaux parlent aussi d’une Grande Bibliothèque à venir, d’un Théâtre de la Renaissance en planification… mais pour l’heure, les rats ont plus d’accès au chantier que les érudits.</p><p>La rumeur dit que certains projets traînent à cause de querelles entre guildes, ou de détournements discrets de matériaux. D’autres accusent une ancienne malédiction du sol, réveillée lors du creusement des fondations… Toujours est-il que la Nouvelle Ville n’a de nouvelle que le nom, et de ville que les rêves accrochés aux échafauds.</p>"
            ,'type' => 'zone',
            'parent' => 'location_port_saint_doux',
            'reference' => 'location_zone_nouvelle_ville',
        ],
    ];
}
