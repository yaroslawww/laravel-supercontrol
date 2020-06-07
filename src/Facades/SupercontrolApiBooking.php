<?php

namespace LaravelSupercontrol\Facades;

use Illuminate\Support\Facades\Facade;
use LaravelSupercontrol\API\Booking\ApiManager;

/**
 * Class SupercontrolApiBooking
 * @package LaravelSupercontrol\Facades
 *
 * @method static \LaravelSupercontrol\API\Booking\Client getClient()
 * @method static \LaravelSupercontrol\API\ApiResponse bookingRequest(array $query = [], array $guzzleOptions = [])
 */
class SupercontrolApiBooking extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ApiManager::class;
    }
}
