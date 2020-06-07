<?php

namespace LaravelSupercontrol\API\V3;

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
                    'SC-TOKEN' => config('supercontrol.api_sc_token'),
                ],
                'base_uri' => config('supercontrol.api_url') . '/v3/',
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
