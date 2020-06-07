<?php


namespace LaravelSupercontrol\API\Booking;

use LaravelSupercontrol\API\ApiResponse;

class ApiManager extends AbstractManager
{
    /**
     * @param array $query
     * @param string $status
     * @param array $options
     * @return ApiResponse
     */
    public function bookingRequest(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'avail.asp', $this->mergeQuery($query, $options));
    }
}
