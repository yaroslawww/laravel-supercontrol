<?php


namespace LaravelSupercontrol\API\V1;

use LaravelSupercontrol\API\ApiResponse;

class HelpersManager extends AbstractManager
{
    /**
     * @see https://secure.supercontrol.co.uk/api-documentation/xml/GetSites.asp
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function getSites(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'GetSites', $this->mergeQuery($query, $options));
    }

    /**
     * @see https://secure.supercontrol.co.uk/api-documentation/xml/GetTerms.asp
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function getTerms(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'GetTerms', $this->mergeQuery($query, $options));
    }
}
