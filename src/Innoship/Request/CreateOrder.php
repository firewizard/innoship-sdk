<?php

namespace Innoship\Request;

use Innoship\Traits\Setter;

/**
 * @property-write $serviceId
 * @property-write $courierId
 * @property-write $shipmentDateEnd
 * @property-write $shipmentDate
 * @property-write CreateOrder\Address $addressFrom
 * @property-write CreateOrder\Address $addressTo
 * @property-write $payment
 * @property-write CreateOrder\Content $content
 * @property-write CreateOrder\Extra $extra
 * @property-write $externalClientLocation
 * @property-write $externalOrderId
 * @property-write $sourceChannel
 * @property-write $observation
 * @property-write array $customAttributes
 * @method CreateOrder setServiceId($value)
 * @method CreateOrder setCourierId($value)
 * @method CreateOrder setshipmentDateEnd($value)
 * @method CreateOrder setShipmentDate($value)
 * @method CreateOrder setAddressFrom(CreateOrder\Address $value)
 * @method CreateOrder setAddressTo(CreateOrder\Address $value)
 * @method CreateOrder setPayment($value)
 * @method CreateOrder setContent(CreateOrder\Content $value)
 * @method CreateOrder setExtra(CreateOrder\Extra $value)
 * @method CreateOrder setExternalClientLocation($value)
 * @method CreateOrder setExternalOrderId($value)
 * @method CreateOrder setSourceChannel($value)
 * @method CreateOrder setObservation($value)
 * @method CreateOrder setCustomAttributes(array $value)
 */
class CreateOrder implements Contract
{
    const PAYMENT_SENDER = 'Sender';
    const PAYMENT_RECIPIENT = 'Recipient';

    use Setter;

    /** @var integer */
    protected $serviceId;

    /** @var integer Force sending to the specified courier. Bypasses all rules that limit couriers but applies rules that make changes to order. See Courier Table. */
    protected $courierId;

    /** @var string Shipment date */
    protected $shipmentDateEnd;

    /** @var string Used for pick-up from third party (Pick-up will be requested from ShipmentDate to ShipmentDateEnd) */
    protected $shipmentDate;

    /** @var CreateOrder\Address */
    protected $addressFrom;

    /** @var CreateOrder\Address */
    protected $addressTo;

    /** @var string Sender/Recipient */
    protected $payment;

    /** @var CreateOrder\Content */
    protected $content;

    /** @var CreateOrder\Extra */
    protected $extra;

    /** @var string Warehouse ID who triggers this order. It is configured in Locations in Innoship portal for each customer location. */
    protected $externalClientLocation;

    /** @var string[100] Order ID from client system / For Emag orders this field is mandatory and should be populated with Emag OrderId */
    protected $externalOrderId;

    /** @var string[50] Order channel */
    protected $sourceChannel;

    /** @var string[500] Observations for label */
    protected $observation;

    protected $parameters = [
        'GetParcelsBarcodes' => false,
        'IncludeCourierResponse' => false,
        'IncludePriceBreakdown' => false,
    ];

    /** @var array */
    protected $customAttributes = [];

    public function __construct()
    {
        $this->extra = new CreateOrder\Extra();
        $this->addressFrom = new CreateOrder\Address();
        $this->addressTo = new CreateOrder\Address();
        $this->content = new CreateOrder\Content();
    }

    public function data(): array
    {
        return array_filter([
            'ServiceId' => $this->serviceId,
            'CourierId' => $this->courierId,
            'ShipmentDate' => $this->shipmentDate,
            'ShipmentDateEnd' => $this->shipmentDateEnd,
            'AddressFrom' => $this->addressFrom->data(),
            'AddressTo' => $this->addressTo->data(),
            'Payment' => $this->payment,
            'Content' => $this->content->data(),
            'Extra' => $this->extra->data(),
            'ExternalClientLocation' => $this->externalClientLocation,
            'ExternalOrderId' => $this->externalOrderId,
            'SourceChannel' => $this->sourceChannel,
            'Observation' => $this->observation,
            'Parameters' => array_filter($this->parameters),
            'CustomAttributes' => $this->customAttributes,
        ]);
    }

    /**
     * Will reply with all Barcodes object for clients who print their own label
     *
     * @param bool $flag
     * @return $this
     */
    public function returnParcelsBarcodes(bool $flag = true): self
    {
        $this->parameters['GetParcelsBarcodes'] = $flag;

        return $this;
    }

    /**
     * This will include Carrier response in Innoship response object CourierResponse[].
     * The format is carrier specific and currently this is available just for Cargus.
     *
     * @param bool $flag
     * @return $this
     */
    public function includeCourierResponse(bool $flag = true): self
    {
        $this->parameters['IncludeCourierResponse'] = $flag;

        return $this;
    }

    /**
     * see if a shipment has extra km or not
     *
     * @param bool $flag
     * @return $this
     */
    public function includePriceBreakdown(bool $flag = true): self
    {
        $this->parameters['IncludePriceBreakdown'] = $flag;

        return $this;
    }

    public function paidBySender(): self
    {
        $this->payment = static::PAYMENT_SENDER;

        return $this;
    }

    public function paidByRecipient(): self
    {
        $this->payment = static::PAYMENT_RECIPIENT;

        return $this;
    }
}
