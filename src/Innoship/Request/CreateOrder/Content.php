<?php

namespace Innoship\Request\CreateOrder;

use Innoship\Traits\Setter;
use Innoship\Request\Contract;

/**
 * @property-write $envelopeCount
 * @property-write $parcelsCount
 * @property-write $palettesCount
 * @property-write $totalWeight
 * @property-write $contents
 * @property-write $package
 * @property-write $oversizedPackage
 * @property-write $parcels
 *
 * @method Content setEnvelopeCount(integer $value)
 * @method Content setParcelsCount(integer $value)
 * @method Content setPalettesCount(integer $value)
 * @method Content setTotalWeight(float $value)
 * @method Content setContents(string $value)
 * @method Content setPackage(string $value)
 * @method Content setOversizedPackage(boolean $value)
 * @method Content setParcels(array $parcels)
 */
class Content implements Contract
{
    use Setter;

    /** @var integer Count of unit of transport */
    protected $envelopeCount = 0;

    /** @var integer Count of unit of transport */
    protected $parcelsCount = 0;

    /** @var integer Count of unit of transport */
    protected $palettesCount = 0;

    /** @var float Total weight for shipment */
    protected $totalWeight;

    /** @var string[100] Description of shipment contents */
    protected $contents;

    /** @var string[100] How is the shipment packed */
    protected $package;

    /** @var boolean If shipment is over-sized set this to true */
    protected $oversizedPackage;

    /**
     * Optional. Size and weight for each individual unit of transport
     * @var array[]
     * @link Parcel
     */
    protected $parcels;

    public function data(): array
    {
        return array_filter([
            'EnvelopeCount' => $this->envelopeCount,
            'ParcelsCount' => $this->parcelsCount,
            'PalettesCount' => $this->palettesCount,
            'TotalWeight' => $this->totalWeight,
            'Contents' => $this->contents,
            'Package' => $this->package,
            'OversizedPackage' => $this->oversizedPackage,
            'Parcels' => is_array($this->parcels)
                ? array_map(function (Parcel $parcel) {
                    return $parcel->data();
                }, $this->parcels)
                : null
        ], function ($el) {
            return $el !== null;
        });
    }

    public function addParcel(Parcel $parcel)
    {
        if (!is_array($this->parcels)) {
            $this->parcels = [];
        }

        $this->parcels[] = $parcel;
    }
}
