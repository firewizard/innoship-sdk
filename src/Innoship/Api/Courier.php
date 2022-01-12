<?php

namespace Innoship\Api;

use Innoship\Response\Contract;
use Innoship\Traits\HasHttpClient;

class Courier
{
    use HasHttpClient;

    public function requestPickup($courierId, $locationId, $lastPickupHour = 0, $lastPickMinute = 0): Contract
    {
        return $this->getClient()->post('Courier/RequestPickup', [
            'courierId' => $courierId,
            'locationId' => $locationId,
            'lastPickupHour' => $lastPickupHour,
            'lastPickMinute' => $lastPickMinute,
        ]);
    }

    public function all(): Contract
    {
        return $this->getClient()->get('Courier/All');
    }
}