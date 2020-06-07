<?php


namespace LaravelSupercontrol\API\V3;

use LaravelSupercontrol\API\ApiResponse;

class DataExportManager extends AbstractManager
{

    /**
     * $query['siteId'] // required
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function bookings(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'DataExport/Bookings', $this->mergeQuery($query, $options));
    }

    /**
     * $query['siteId'] // required
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function properties(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'DataExport/Properties', $this->mergeQuery($query, $options));
    }
}
