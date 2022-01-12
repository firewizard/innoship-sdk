<?php

namespace Innoship\Request;

use Innoship\Traits\Setter;

class UpdateOrderStatus implements Contract
{
    use Setter;

    public function data(): array
    {
        return [
        ];
    }
}
