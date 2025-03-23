<?php

namespace App\DataFixtures\Screen;

use App\Entity\Character\Npc;
use App\Entity\Screen\TradeScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TradeScreenFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $screens = [
            [
                'name' => 'Commercer avec Sophie la Marchande',
                'npc' => 'npc_sophie_la_marchande',
                'tradeType' => 'trade',
                'reference' => 'screen_trade_sophie_la_marchande',
            ],
            [
                'name' => 'Commercer avec Gart le Forgeron',
                'npc' => 'npc_gart_le_forgeron',
                'tradeType' => 'trade',
                'reference' => 'screen_trade_gart_le_forgeron',
            ],
            [
                'name' => 'Réparer avec Gart le Forgeron',
                'npc' => 'npc_gart_le_forgeron',
                'tradeType' => 'repair',
                'reference' => 'screen_trade_repair_gart_le_forgeron',
            ],
            [
                'name' => "Commercer avec Wilbert l'Arcaniste",
                'npc' => 'npc_wilbert_larcaniste',
                'tradeType' => 'trade',
                'reference' => 'screen_trade_wilbert_larcaniste',
            ],
            [
                'name' => "Recharger avec Wilbert l'Arcaniste",
                'npc' => 'npc_wilbert_larcaniste',
                'tradeType' => 'reload',
                'reference' => 'screen_trade_reload_wilbert_larcaniste',
            ],
            [
                'name' => 'Commercer avec Jarrod le Tavernier',
                'npc' => 'npc_jarrod_le_tavernier',
                'tradeType' => 'trade',
                'reference' => 'screen_trade_jarrod_le_tavernier',
            ],
            [
                'name' => 'Commercer avec le Pêcheur',
                'npc' => 'npc_pecheur',
                'tradeType' => 'trade',
                'reference' => 'screen_trade_pecheur',
            ],

            // Plouc
            [
                'name' => 'Commercer avec Gérard le Pêcheur',
                'npc' => 'npc_gerard_le_pecheur',
                'tradeType' => 'trade',
                'reference' => 'screen_trade_gerard_le_pecheur',
            ],
        ];

        foreach($screens as $data) {
            $screen = new TradeScreen();
            $screen->setName($data['name'])
                ->setNpc($this->getReference($data['npc'], Npc::class))
                ->setTradeType($data['tradeType']);
            $manager->persist($screen);
            $this->addReference($data['reference'], $screen);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 26;
    }
}
