<?php

namespace Innoship\Traits;

use Innoship\Client;

trait HasHttpClient
{
    protected $client;

    public function __construct($apiKey)
    {
        $this->client = new Client($apiKey);
    }

    protected function getClient(): Client
    {
        return $this->client;
    }
}