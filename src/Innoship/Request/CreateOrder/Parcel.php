<?php

namespace Innoship\Request\CreateOrder;

use Innoship\Traits\Setter;
use Innoship\Request\Contract;

/**
 * @property-write $sequenceNo
 * @property-write $size
 * @property-write $weight
 * @property-write $type
 * @property-write $reference1
 * @property-write $customerBarcode
 *
 * @method Parcel setSequenceNo(integer $value)
 * @method Parcel setSize(ParcelSize $value)
 * @method Parcel setWeight(float $value)
 * @method Parcel setType(string $value)
 * @method Parcel setReference1(string $value)
 * @method Parcel setCustomerBarcode(string $value)
 */
class Parcel implements Contract
{
    use Setter;

    /** @var integer */
    protected $sequenceNo;

    /** @var ParcelSize */
    protected $size;

    /** @var float value in kilograms */
    protected $weight;

    /** @var string Envelope (1), Parcel (2), Pallet (3) */
    protected $type;

    /** @var string[100] Content for parcel */
    protected $reference1;

    /** @var string Used if customer has internal barcodes on boxes, will be returned in AWB response so you can match each box with specific child AWB number from Courier */
    protected $customerBarcode;

    public function __construct()
    {
        $this->size = new ParcelSize();
    }

    public function data(): array
    {
        return array_filter([
            'SequenceNo' => $this->sequenceNo,
            'Size' => $this->size->data(),
            'Weight' => $this->weight,
            'Type' => $this->type,
            'Reference1' => $this->reference1,
            'CustomerBarcode' => $this->customerBarcode,
        ], function ($el) {
            return $el !== null && $el !== [];
        });
    }
}
