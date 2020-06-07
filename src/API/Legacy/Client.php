<?php

namespace LaravelSupercontrol\API\Legacy;

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
                'base_uri' => config('supercontrol.api_url') . '/xml/',
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

    public function request(string $method, string $path = '', array $options = []): ApiResponse
    {
        return new ApiResponse($this->client->request($method, $path, $options));
    }
}
