# Innoship SDK
Make sure to read the Innoship [API Docs](https://docs.innoship.io/innoship) or [Swagger Docs](https://api.innoship.com/index.html) first.

## Requirements
* PHP >= 7.0
* curl extension
* json extension

## Installation
Require the package via composer
```bash
composer require firewizard/innoship-sdk
```

## Usage
To interact with the API, you need to create a new instance of `Innoship\Innoship`, using your API key:
```php
$innoship = new Innoship\Innoship('my-api-key-123');
```

This exposes several service objects, following the swagger grouping:
* courier
* feedback
* label
* location
* order
* price
* track

So, for instance, to get all client locations, the call would look like this: 
```php
$locations = $innoship->location()->clientLocations()->getContent();
```

All requests return an instance of Innoship\Response\Contract, which offers two public methods:
1. `isSuccessful()` - to make sure the request was sucesseful and the content is not an error message
2. `getContent()` - to get the actual response 


### Get a list of countries
```php
$countries = $innoship->location()->countries()->getContent();
```

### Get a list of cities in a giver region
```php
$cities = $innoship->location()->cities('94')->getContent();
```

### Get a list of regions for a given country
```php
$innoship->location()->regions('HU')->getContent());
```

### Get feedback for a given time period
```php
$innoship->feedback()->get('2021-12-01', '2021-12-10')->getContent();
```

### Get tracking info
* for a single AWB
```php
$info = $innoship->track()->byAwb('3', '5749162310001')->getContent();
```

* for a list of AWB's
```php
$info = $innoship->track()->byAwb('3', ['5749162310001', '5749162310002'])->getContent();
```

### Get PDF label for AWB
```php
file_put_contents('awb-5749162310001.pdf', $innoship->label()->byCourierAwb('3', '5749162310001')->getContent();
```

### Get a list of fixed locations
```php
$request = new Innoship\Request\GetFixedLocations();
$request
    ->setCourier('Sameday')
    ->setCountryCode('RO')
    ->setCountyName('Bucuresti')
    ->setLocalityName('Bucuresti')
    ->setFixedLocationType($request::TYPE_LOCKER);

$locations = $innoship->location()->fixedLocations($request);
```

### Get rates for shipment
```php
$address = new Innoship\Request\CreateOrder\Address();
$address
    ->setName('Tester Testerson')
    ->setContactPerson('Tester Testerson')
    ->setPhone('0723000000')
    ->setEmail('tester.testerson@example.com')
    ->setAddressText('Sos Principala nr 1')
    ->setLocalityName('Socolari')
    ->setCountyName('Caras-Severin')
    ->setCountry('RO');

$content = new Innoship\Request\CreateOrder\Content();
$content
    ->setParcelsCount(1)
    ->setTotalWeight(10)
    ->setContents('Obiecte de artă')
    ->setPackage('carton');

$extra = new Innoship\Request\CreateOrder\Extra();
$extra
    //->setOpenPackage(true)
    //->setSaturdayDelivery(true)
    ->setBankRepaymentAmount(125)
    ->setBankRepaymentCurrency('RON');

$request = new Innoship\Request\CreateOrder();
$request
    ->setServiceId(1)
    ->setShipmentDate(now())
    ->setAddressTo($address)
    ->paidBySender()
    ->setContent($content)
    ->setExtra($extra)
    ->setExternalClientLocation('Default')
    ->setExternalOrderId('10000001')
    ->setSourceChannel('website')
    ->setCustomAttributes(['x' => 1, 'y' => 2])
    //->includePriceBreakdown()
    //->includeCourierResponse()
    ;

$rates = $innoship->price()->get($request)->getContent();
```

### Create new shipment AWB
Using the same request object as above, call: 
```php
$response = $innoship->order()->create($request);
```

Make sure that you set the courier id and the service id on this call, otherwise the request will fail.

### Delete an existing shipment AWB
```php
$response = $innoship->order()->delete('3', '5749162310001');
```

## Contributing
Found a bug or have something you consider to be an improvement? Feel free to open a PR, all contributions are appreciated!

## License
This package is open-source software licensed under the [MIT license](./LICENSE).
