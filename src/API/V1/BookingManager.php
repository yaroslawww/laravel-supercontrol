<?php


namespace LaravelSupercontrol\API\V1;

use LaravelSupercontrol\API\ApiResponse;

class BookingManager extends AbstractManager
{
    /**
     * @see https://secure.supercontrol.co.uk/api-documentation/xml/GetBookings.asp
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function get(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'GetBookings', $this->mergeQuery($query, $options));
    }
}
