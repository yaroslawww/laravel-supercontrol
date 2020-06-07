<?php


namespace LaravelSupercontrol\API\V1;

use LaravelSupercontrol\API\ApiResponse;

class AvailabilityManager extends AbstractManager
{
    /**
     * @see https://secure.supercontrol.co.uk/api-documentation/xml/GetAvailability.asp
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function get(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'GetAvailability', $this->mergeQuery($query, $options));
    }
}
