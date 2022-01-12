<?php

namespace Innoship\Api;

use Innoship\Response\Contract;
use Innoship\Traits\HasHttpClient;

class Track
{
    use HasHttpClient;

    public function byAwb($courierId, $awb): Contract
    {
        return $this->getClient()->post('Track/by-awb/with-return', ['courier' => $courierId, 'awbList' => (array)$awb]);
    }
}