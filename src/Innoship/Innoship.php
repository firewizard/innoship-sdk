<?php

namespace Innoship;

class Innoship
{
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function courier(): Api\Courier
    {
        return new Api\Courier($this->apiKey);
    }

    public function feedback(): Api\Feedback
    {
        return new Api\Feedback($this->apiKey);
    }

    public function label(): Api\Label
    {
        return new Api\Label($this->apiKey);
    }

    public function location(): Api\Location
    {
        return new Api\Location($this->apiKey);
    }

    public function order(): Api\Order
    {
        return new Api\Order($this->apiKey);
    }

    public function price(): Api\Price
    {
        return new Api\Price($this->apiKey);
    }

    public function track(): Api\Track
    {
        return new Api\Track($this->apiKey);
    }
}