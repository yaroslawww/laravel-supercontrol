<?php


namespace LaravelSupercontrol\API\Legacy;

use LaravelSupercontrol\API\ApiResponse;

class MetaManager extends AbstractManager
{

    /**
     * $query['siteId'] // required
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function bookingSources(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'booking_sources.asp', $this->mergeQuery($query, $options));
    }

    /**
     * $query['siteId'] // required
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function countries(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'countries.asp', $this->mergeQuery($query, $options));
    }
}
