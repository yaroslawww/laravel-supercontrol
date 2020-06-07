<?php

namespace LaravelSupercontrol\API\V1;

use GuzzleHttp\Client as GuzzleClient;
use LaravelSupercontrol\API\ApiResponse;

class Client
{
    protected $client;

    public function __construct(array $configs = [])
    {
        $this->client = new GuzzleClient(array_merge(
            config('supercontrol.guzzle_config'),
            [
                'headers' => [
                    'Content-Type' => 'text/xml; charset=UTF8',
                ],
                'base_uri' => config('supercontrol.api_url') . '/api/endpoint/v1/',
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
        return new ApiResponse($this->client->request($method, $path, $options));
    }
}
