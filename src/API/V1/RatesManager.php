<?php


namespace LaravelSupercontrol\API\V1;

use LaravelSupercontrol\API\ApiResponse;

class RatesManager extends AbstractManager
{
    /**
     * @see https://secure.supercontrol.co.uk/api-documentation/xml/GetRates.asp
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function get(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'GetRates', $this->mergeQuery($query, $options));
    }

    /**
     * @see https://secure.supercontrol.co.uk/api-documentation/xml/GetRatesAll.asp
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function getAll(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'GetRatesAll', $this->mergeQuery($query, $options));
    }
}
