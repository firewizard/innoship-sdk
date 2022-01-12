<?php

namespace Innoship\Api;

use Innoship\Response\Contract;
use Innoship\Traits\HasHttpClient;

class Feedback
{
    use HasHttpClient;

    public function get($from, $to): Contract
    {
        return $this->getClient()->get("Feedback/{$from}/{$to}");
    }
}