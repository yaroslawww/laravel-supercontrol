# Laravel supercontroll api client

## Installation

You can install the package via composer:

```bash
composer require yaroslawww/laravel-supercontrol
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="LaravelSupercontrol\ServiceProvider" --tag="migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="LaravelSupercontrol\ServiceProvider" --tag="config"
```

Configuration in *.env*
```dotenv
SUPERCONTROL_DEFAULT_SITE_ID=46
# Optional, required only to use api V1
SUPERCONTROL_API_ID=123456
SUPERCONTROL_API_KEY=11111111-1111-1111-1111-111111111111
# Optional, required only to use api V3
# SUPERCONTROL_API_SC_TOKEN=11111111-1111-1111-1111-111111111111

# only if ypu want save all requests/response content
# SUPERCONTROL_DB_LOGS_BOOKING_API=true
```

## Legacy API endpoints
**siteID** is not required (by default it specified on laravel configs)

See full docs [there](/docs/supercontrol/SuperControl API Endpoint Overview.pdf)

```php
use \LaravelSupercontrol\Facades\SupercontrolApiLegacy;

// Universal query
SupercontrolApiLegacy::getClient()->request('get', 'full_list.asp',['timeout'  => 10.0,])->getConvertedBody();
// or predefined queries
SupercontrolApiLegacy::meta()->bookingSources()->getConvertedBody();
// also you can override siteID
SupercontrolApiLegacy::meta()->bookingSources(['siteID' => 46])->getConvertedBody();
SupercontrolApiLegacy::meta()->countries(['siteID' => 46])->getConvertedBody();

SupercontrolApiLegacy::properties()->filter(['siteID' => 46])->getConvertedBody();
SupercontrolApiLegacy::properties()->fullList(['siteID' => 46])->getConvertedBody();
SupercontrolApiLegacy::properties()->availableRange(['siteID' => 46, 'startdate' => \Carbon\Carbon::now()->addMonth()->format('Y-m-d')])->getConvertedBody();
SupercontrolApiLegacy::properties()->propertyAvailBulk(['siteID' => 46, 'startdate' => \Carbon\Carbon::now()->addMonth()->format('Y-m-d')])->getConvertedBody();
SupercontrolApiLegacy::properties()->propertyCodes(['siteID' => 46])->getConvertedBody();
SupercontrolApiLegacy::properties()->propertyDiscountText(['siteID' => 46])->getConvertedBody();
SupercontrolApiLegacy::properties()->propertyLastUpdate(['siteID' => 46])->getConvertedBody();

SupercontrolApiLegacy::property()->getNights(['id' => 523560, 'startdate' => \Carbon\Carbon::now()->addDay()->format('Y-m-d')])->getConvertedBody();
SupercontrolApiLegacy::property()->getPrice(['id' => 523560, 'startdate' => \Carbon\Carbon::now()->addDay()->format('Y-m-d')])->getConvertedBody();
SupercontrolApiLegacy::property()->propertyAvail(['propertycode' => 523560, 'startdate' => \Carbon\Carbon::now()->addDay()->format('Y-m-d'), 'enddate' => \Carbon\Carbon::now()->addMonth()->format('Y-m-d')])->getConvertedBody();
SupercontrolApiLegacy::property()->propertyBooked(['propertycode' => 523560, 'startdate' => \Carbon\Carbon::now()->addDay()->format('Y-m-d'), 'enddate' => \Carbon\Carbon::now()->addMonth()->format('Y-m-d')])->getConvertedBody();
SupercontrolApiLegacy::property()->propertyDates(['propertycode' => 523560, 'startdate' => \Carbon\Carbon::now()->addDay()->format('Y-m-d'), 'enddate' => \Carbon\Carbon::now()->addMonth()->format('Y-m-d')])->getConvertedBody();
```

## API V1 endpoints
**client->ID** is not required (by default it specified on laravel configs)

**client->key** is not required (by default it specified on laravel configs)

**client->siteID** is not required (by default it specified on laravel configs)

See full docs [there](https://secure.supercontrol.co.uk/api-documentation/)

```php
use \LaravelSupercontrol\Facades\SupercontrolApiV1;

// Universal query
SupercontrolApiV1::getClient()->request('get', 'GetBookings',[
'timeout'  => 10.0,
'body' => \Spatie\ArrayToXml\ArrayToXml::convert([
'client' => [
  'Property' => ['PropertyID' => ['570428', '566378']], 
  'date' => ['start' => '2020-06-01', 'end'=>'2020-09-01']]
], 'scAPI')
])->getConvertedBody();
// or predefined queries
SupercontrolApiV1::booking()->get(['client' => [
    'Property' => ['PropertyID' => [570428, 566378]], 
    'date' => ['start' => '2020-06-01', 'end'=>'2020-09-01']]
])->getConvertedBody();
// also you can override auth params
SupercontrolApiV1::booking()->get(['client' => [
    'ID' => 123456, 
    'key' => '11111111-1111...', 
    'Property' => ['PropertyID' => [570428, 566378]], 
    'date' => ['start' => '2020-06-01', 'end'=>'2020-09-01']]
])->getConvertedBody();

SupercontrolApiV1::property()->list(['client' => ['page' => 2]])->getConvertedBody();
SupercontrolApiV1::property()->find(['client' => ['propertyID' => 570428]])->getConvertedBody();
SupercontrolApiV1::property()->getImages([
'client' => ['Property' => ['PropertyID' => [570428, 566378]]]
])->getConvertedBody();

SupercontrolApiV1::availability()->get([
'client' => [
    'Property' => ['PropertyID' => [570428, 566378]], 
    'dateRange' => ['start' => '2020-06-01', 'end'=>'2020-09-01']
]
])->getConvertedBody();

SupercontrolApiV1::rate()->get([
'client' => [
    'Property' => ['PropertyID' => [570428, 566378]], 
    'date' => ['start' => '2020-06-01', 'NumberOfNights' => 7]
]
])->getConvertedBody();
SupercontrolApiV1::rate()->getAll([
'client' => [
    'Property' => ['PropertyID' => [570428, 566378]]
]
])->getConvertedBody();

SupercontrolApiV1::helper()->getSites()->getConvertedBody();
SupercontrolApiV1::helper()->getTerms()->getConvertedBody();
// or
SupercontrolApiV1::helper()->getTerms(['client' => ['siteID' => 1234]])->getConvertedBody();
```

## API V3 endpoints
Header **SC-TOKEN** is not required (by default it specified on laravel configs)

See full docs [there](/docs/supercontrol/Data Export API Documentation.pdf)

```php
use \LaravelSupercontrol\Facades\SupercontrolApiV3;

// Universal query
SupercontrolApiV3::getClient()->request('get', 'DataExport/Properties',[
'timeout'  => 10.0,
'query' => [ /* there you can pass any query params (see guzzlehttp docs ) */ ] 
])->getConvertedBody();
// or predefined queries
SupercontrolApiV3::dataExport()->properties()->getConvertedBody();
// also you can override auth params
SupercontrolApiV3::dataExport()->properties([],[
    'headers' => [
        'SC-TOKEN' => '11111111-1111...'
    ],
])->getConvertedBody();

SupercontrolApiV3::dataExport()->bookings(['LastUpdate' => '2020-05-06'])->getConvertedBody();
```

## API Booking endpoints
**client->ID** is not required (by default it specified on laravel configs)

**client->key** is not required (by default it specified on laravel configs)

See full docs [there](/docs/supercontrol/SuperControl Booking API.pdf)

```php
use \LaravelSupercontrol\Facades\SupercontrolApiBooking;

// Firstly need create query
$guest = new \LaravelSupercontrol\API\Booking\DTOs\Guest();
$guest->email = 'yg@think.studio';
$guest->firstname = 'Test Booking API';
$guest->lastname = 'Tester';

$booking = new \LaravelSupercontrol\API\Booking\DTOs\Booking();
$booking->value = 0.05;
$booking->vatPercentage = 0.02;
$booking->commission = 0.01;
$booking->children = 1;
$booking->adults = 2;
$booking->infants = 3;

$payment = new \LaravelSupercontrol\API\Booking\DTOs\Payment();
$payment->date = now()->format('Y-m-d');
$payment->value = 0.01;
$payment->caption = 'Test payment cation';
$payment->method = 'Test method';

$extra = new \LaravelSupercontrol\API\Booking\DTOs\Extra();
$extra->id = 0;
$extra->qty = 2;
$extra->value = 0.01;
$extra->name = 'Some test extra name there';

$date = new \LaravelSupercontrol\API\Booking\DTOs\Date();
$date->status = 'b';
$date->start = '2020-08-28';
$date->nights = 2;
$date->guest = $guest;
$date->booking = $booking;
$date->payments = [$payment];
$date->extras = [$extra];
$date->notes = [
    'Booking (testing purpose) [ThinkStudio]'
];
$property = new \LaravelSupercontrol\API\Booking\DTOs\Property();
$property->propId = 566378;
$property->dates = [$date];
$requestData = [
    'client' => [
        'ref' => 'test_ref_123456',
        'prop' => $property->__toArray()
    ]
];

// Universal query
SupercontrolApiBooking::getClient()->request('get', 'avail.asp',[
    'timeout'  => 10.0,
    'body' => \Spatie\ArrayToXml\ArrayToXml::convert($requestData, 'scAPI')
])->getConvertedBody();
// or predefined queries
SupercontrolApiBooking::bookingRequest($requestData)->getConvertedBody();

```

## Credits

- [![Think Studio](https://yaroslawww/laravel-supercontrol/docs/assets/logo-think-studio.png)](https://think.studio/)
- [Yaroslav Georgitsa](mailto:yaroslav.georgitsa@gmail.com)
