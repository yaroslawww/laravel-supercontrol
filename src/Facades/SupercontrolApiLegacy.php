<?php

namespace LaravelSupercontrol\Facades;

use Illuminate\Support\Facades\Facade;
use LaravelSupercontrol\API\Legacy\ApiManager;

/**
 * Class SupercontrolApiLegacy
 * @package LaravelSupercontrol\Facades
 *
 * @method static \LaravelSupercontrol\API\Legacy\Client getClient()
 * @method static \LaravelSupercontrol\API\Legacy\PropertiesManager properties()
 * @method static \LaravelSupercontrol\API\Legacy\PropertyManager property()
 * @method static \LaravelSupercontrol\API\Legacy\MetaManager meta()
 */
class SupercontrolApiLegacy extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ApiManager::class;
    }
}
