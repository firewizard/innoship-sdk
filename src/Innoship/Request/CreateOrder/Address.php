<?php

namespace Innoship\Request\CreateOrder;

use Innoship\Traits\Setter;
use Innoship\Request\Contract;

/**
 * @property-write $name
 * @property-write $contactPerson
 * @property-write $country
 * @property-write $countyName
 * @property-write $localityName
 * @property-write $addressText
 * @property-write $postalCode
 * @property-write $phone
 * @property-write $email
 * @property-write $fixedLocationId
 * @property-write $courierFixedLocationId
 *
 * @method Address setName($value)
 * @method Address setContactPerson($value)
 * @method Address setCountry($value)
 * @method Address setCountyName($value)
 * @method Address setLocalityName($value)
 * @method Address setAddressText($value)
 * @method Address setPostalCode($value)
 * @method Address setPhone($value)
 * @method Address setEmail($value)
 * @method Address setFixedLocationId($value)
 * @method Address setCourierFixedLocationId($value)
 */
class Address implements Contract
{
    use Setter;

    protected $name;
    protected $contactPerson;
    protected $country;
    protected $countyName;
    protected $localityName;
    protected $addressText;
    protected $postalCode;
    protected $phone;
    protected $email;
    protected $fixedLocationId;
    protected $courierFixedLocationId;

    public function data(): array
    {
        return array_filter([
            'Name' => $this->name,
            'ContactPerson' => $this->contactPerson,
            'Country' => $this->country,
            'CountyName' => $this->countyName,
            'LocalityName' => $this->localityName,
            'AddressText' => $this->addressText,
            'PostalCode' => $this->postalCode,
            'Phone' => $this->phone,
            'Email' => $this->email,
            'FixedLocationId' => $this->fixedLocationId,
            'CourierFixedLocationId' => $this->courierFixedLocationId,
        ], function ($el) {
            return $el !== null;
        });
    }
}
