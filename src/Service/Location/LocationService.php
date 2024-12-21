<?php

namespace App\Service\Location;

use App\Repository\Location\LocationRepository;

class LocationService
{
    private LocationRepository $locationRepository;

    public function __construct(LocationRepository $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    public function getLocations()
    {
        return $this->locationRepository->findAll();
    }
}
