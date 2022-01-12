<?php

namespace Innoship\Request;

use Innoship\Traits\Setter;

/**
 * @property-write $courier;
 * @property-write $countryCode;
 * @property-write $countyName;
 * @property-write $localityName;
 * @property-write $fixedLocationType;
 * @property-write $showInactive;
 * @property-write $restrictionParcelsCount;
 * @property-write $restrictionSizeHeight;
 * @property-write $restrictionSizeWidth;
 * @property-write $restrictionSizeLength;
 * @property-write $externalLocationId;
 * @method GetFixedLocations setCourier($value)
 * @method GetFixedLocations setCountryCode($value)
 * @method GetFixedLocations setCountyName($value)
 * @method GetFixedLocations setLocalityName($value)
 * @method GetFixedLocations setFixedLocationType($value)
 * @method GetFixedLocations setShowInactive($value)
 * @method GetFixedLocations setRestrictionParcelsCount($value)
 * @method GetFixedLocations setRestrictionSizeHeight($value)
 * @method GetFixedLocations setRestrictionSizeWidth($value)
 * @method GetFixedLocations setRestrictionSizeLength($value)
 * @method GetFixedLocations setExternalLocationId($value)
 */
class GetFixedLocations implements Contract
{
    use Setter;

    const TYPE_LOCKER = 'Locker';
    const TYPE_PICKUP_POINT = 'PickupPoint';

    protected $courier;
    protected $countryCode;
    protected $countyName;
    protected $localityName;
    protected $fixedLocationType;
    protected $showInactive;
    protected $restrictionParcelsCount;
    protected $restrictionSizeHeight;
    protected $restrictionSizeWidth;
    protected $restrictionSizeLength;
    protected $externalLocationId;

    public function data(): array
    {
        return array_filter([
            'Courier' => $this->courier,
            'CountryCode' => $this->countryCode,
            'CountyName' => $this->countyName,
            'LocalityName' => $this->localityName,
            'FixedLocationType' => $this->fixedLocationType,
            'ShowInactive' => $this->showInactive,
            'RestrictionParcelsCount' => $this->restrictionParcelsCount,
            'RestrictionSizeHeight' => $this->restrictionSizeHeight,
            'RestrictionSizeWidth' => $this->restrictionSizeWidth,
            'RestrictionSizeLength' => $this->restrictionSizeLength,
            'ExternalLocationId' => $this->externalLocationId,
        ]);
    }
}
