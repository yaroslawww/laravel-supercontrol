<?php


namespace LaravelSupercontrol\API\V1;

use LaravelSupercontrol\API\ApiResponse;

class PropertyManager extends AbstractManager
{

    /**
     * @see https://secure.supercontrol.co.uk/api-documentation/xml/GetProperties.asp
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function list(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'GetProperties', $this->mergeQuery($query, $options));
    }

    /**
     * @see https://secure.supercontrol.co.uk/api-documentation/xml/GetProperty.asp
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function find(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'GetProperty', $this->mergeQuery($query, $options));
    }

    /**
     * @see https://secure.supercontrol.co.uk/api-documentation/xml/GetPropertyImages.asp
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function getImages(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'GetPropertyImages', $this->mergeQuery($query, $options));
    }
}
