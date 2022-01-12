<?php

namespace Innoship\Request\CreateOrder;

use Innoship\Traits\Setter;
use Innoship\Request\Contract;

/**
 * @property-write $width
 * @property-write $length
 * @property-write $height
 *
 * @method ParcelSize setWidth(float $value)
 * @method ParcelSize setLength(float $value)
 * @method ParcelSize setHeight(float $value)
 */
class ParcelSize implements Contract
{
    use Setter;

    /** @var float in centimeters */
    protected $width;

    /** @var float in centimeters */
    protected $length;

    /** @var float in centimeters */
    protected $height;

    public function data(): array
    {
        return array_filter([
            'Width' => $this->width,
            'Length' => $this->length,
            'Height' => $this->height,
        ]);
    }
}
