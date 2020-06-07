<?php

return [

    'api_id' => env('SUPERCONTROL_API_ID'),
    'api_key' => env('SUPERCONTROL_API_KEY'),
    'api_sc_token' => env('SUPERCONTROL_API_SC_TOKEN'),

    'api_url' => env('SUPERCONTROL_API_URL', 'https://api.supercontrol.co.uk'),
    'api_secure_url' => env('SUPERCONTROL_API_SECURE_URL', 'https://secure.supercontrol.co.uk'),

    'default_site_id' => env('SUPERCONTROL_DEFAULT_SITE_ID'),

    // @see http://docs.guzzlephp.org/
    'guzzle_config' => [
        // You can set any number of default request options.
        'timeout'  => env('SUPERCONTROL_REQUEST_TIMEOUT', 5.0),
    ],


    'db_logs_booking_api' => (bool) env('SUPERCONTROL_DB_LOGS_BOOKING_API'),
    'log_table' => 'supercontrol_requests_log',
    'log_model' => \LaravelSupercontrol\Models\SupercontrollRequest::class,


];
