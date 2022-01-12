<?php

namespace Innoship\Api;

use Innoship\Request\CreateOrder;
use Innoship\Response\Contract;
use Innoship\Traits\HasHttpClient;

class Price
{
    use HasHttpClient;

    public function get(CreateOrder $request): Contract
    {
        return $this->getClient()->post('Price', $request->data());
    }
}