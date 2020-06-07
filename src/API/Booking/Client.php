<?php

namespace LaravelSupercontrol\API\Booking;

use GuzzleHttp\Client as GuzzleClient;
use LaravelSupercontrol\API\ApiResponse;
use LaravelSupercontrol\Models\SupercontrollRequest;

class Client
{
    const TYPE = 'booking_api';
    protected $client;

    public function __construct(array $configs = [])
    {
        $this->client = new GuzzleClient(array_merge(
            config('supercontrol.guzzle_config'),
            [
                'headers' => [
                    'Content-Type' => 'text/xml; charset=UTF8',
                ],
                'base_uri' => config('supercontrol.api_secure_url') . '/api/',
            ],
            $configs
        ));
    }

    /**
     * @return GuzzleClient
     */
    public function getClient(): GuzzleClient
    {
        return $this->client;
    }

    public function request(string $method, string $path = '', array $options = [])
    {
        $dbLog = null;
        if (config('supercontrol.db_logs_booking_api')) {
            $dbLog = new SupercontrollRequest();
            $dbLog->type = self::TYPE;
            $dbLog->method = strtolower($method);
            $dbLog->url = $path;
            $dbLog->request_body = $options['body'];
        }

        try {
            $response = $this->client->request($method, $path, $options);
        } catch (\Throwable $exception) {
            if ($dbLog) {
                $dbLog->exception = (string)$exception;
                $dbLog->save();
            }

            throw $exception;
        }
        if ($dbLog) {
            $dbLog->response_body = $response->getBody()->__toString();
            $dbLog->save();
        }

        return new ApiResponse($response);
    }
}
