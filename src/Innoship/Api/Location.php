<?php

namespace Innoship\Api;

use Innoship\Request\GetFixedLocations;
use Innoship\Response\Contract;
use Innoship\Traits\HasHttpClient;

class Location
{
    use HasHttpClient;

    public function clientLocations(): Contract
    {
        return $this->getClient()->get('Location/ClientLocations');
    }

    public function fixedLocations(GetFixedLocations $request): Contract
    {
        return $this->getClient()->get('Location/FixedLocations', $request->data());
    }

    public function countries(): Contract
    {
        return $this->getClient()->get('Location/Countries');
    }

    public function regions($country): Contract
    {
        return $this->getClient()->get("Location/Counties/{$country}");
    }

    public function cities($regionId): Contract
    {
        return $this->getClient()->get("Location/Localities/{$regionId}");
    }

    public function getStreetsByPostcode($country, $postcode): Contract
    {
        return $this->getClient()->get("Location/Postalcodes/{$country}/{$postcode}");
    }

    public function getStreetsByLocality($cityId): Contract
    {
        return $this->getClient()->get("Location/Postalcodes/{$cityId}");
    }
}