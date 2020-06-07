<?php

namespace LaravelSupercontrol\Facades;

use Illuminate\Support\Facades\Facade;
use LaravelSupercontrol\API\V1\ApiManager;

/**
 * Class SupercontrolApiV1
 * @package LaravelSupercontrol\Facades
 *
 * @method static \LaravelSupercontrol\API\V1\Client getClient()
 * @method static \LaravelSupercontrol\API\V1\PropertyManager property()
 * @method static \LaravelSupercontrol\API\V1\BookingManager booking()
 * @method static \LaravelSupercontrol\API\V1\AvailabilityManager availability()
 * @method static \LaravelSupercontrol\API\V1\RatesManager rate()
 * @method static \LaravelSupercontrol\API\V1\HelpersManager helper()
 */
class SupercontrolApiV1 extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ApiManager::class;
    }
}
