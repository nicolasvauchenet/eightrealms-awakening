<?php

namespace App\Service\Map;

use App\Entity\Character\Player;
use App\Entity\Item\Item;
use App\Entity\Location\Location;

readonly class MapService
{
    public function getRealmMap(Player $character): ?Item
    {
        foreach($character->getCharacterItems() as $characterItem) {
            if($characterItem->getItem()->getType() === 'realm') {
                return $characterItem->getItem();
            }
        }

        return null;
    }

    public function getLocationMap(Player $character): ?Item
    {
        $location = $this->getLocationData($character->getCurrentLocation(), 'walk');

        foreach($character->getCharacterItems() as $characterItem) {
            if($characterItem->getItem()->getSlug() === $location->getSlug()) {
                return $characterItem->getItem();
            }
        }

        return null;
    }

    public function getZones(Player $character): ?array
    {
        $zones = [];
        $location = $this->getLocationData($character->getCurrentLocation(), 'walk');

        foreach($location->getChildren() as $child) {
            if($child->getType() === 'zone') {
                $zones[] = $child;
            }
        }

        return $zones;
    }

    public function getLocationData(Location $location, string $content): Location
    {
        switch($location->getType()) {
            case 'zone':
                if($content === 'walk') {
                    return $location->getParent();
                } else if($content === 'travel') {
                    return $location->getParent()->getParent();
                }
                break;
            case 'location':
                if($content === 'walk') {
                    return $location;
                } else if($content === 'travel') {
                    return $location->getParent();
                }
                break;
        }

        return $location;
    }

    public function getWalkLocations(Location $location, Player $character): array
    {
        $currentLocation = $this->getLocationData($location, 'walk');
        $allZones = [];
        $knownZones = [];

        foreach($currentLocation->getChildren() as $child) {
            if($child->getType() === 'zone') {
                $allZones[] = $child;
            }
        }

        foreach($character->getCharacterItems() as $characterItem) {
            if($characterItem->getItem()->getSlug() === $currentLocation->getSlug()) {
                return $allZones;
            }
        }

        $knownLocations = $character->getCharacterLocations();

        foreach($allZones as $zone) {
            foreach($knownLocations as $knownLocation) {
                if($knownLocation->getLocation()->getId() === $zone->getId()) {
                    $knownZones[] = $zone;
                    break;
                }
            }
        }

        return $knownZones;
    }

    public function getTravelLocations(Location $location, Player $character): array
    {
        $realmLocation = $this->getLocationData($location, 'travel');
        $allPlaces = [];
        $knownZones = [];

        foreach($realmLocation->getChildren() as $child) {
            if($child->getType() === 'location') {
                $allPlaces[] = $child;
            }
        }

        foreach($character->getCharacterItems() as $characterItem) {
            $item = $characterItem->getItem();
            if($item->getType() === 'realm' && $item->getSlug() === $realmLocation->getSlug()) {
                return $allPlaces;
            }
        }

        $knownLocations = $character->getCharacterLocations();

        foreach($allPlaces as $zone) {
            foreach($knownLocations as $knownLocation) {
                if($knownLocation->getLocation()->getId() === $zone->getId()) {
                    $knownZones[] = $zone;
                    break;
                }
            }
        }

        return $knownZones;
    }
}
