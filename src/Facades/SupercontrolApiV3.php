<?php

namespace LaravelSupercontrol\Facades;

use Illuminate\Support\Facades\Facade;
use LaravelSupercontrol\API\V3\ApiManager;

/**
 * Class SupercontrolApiV3
 * @package LaravelSupercontrol\Facades
 *
 * @method static \LaravelSupercontrol\API\V3\Client getClient()
 * @method static \LaravelSupercontrol\API\V3\DataExportManager dataExport()
 */
class SupercontrolApiV3 extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ApiManager::class;
    }
}
