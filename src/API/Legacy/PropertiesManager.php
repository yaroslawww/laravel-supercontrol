<?php


namespace LaravelSupercontrol\API\Legacy;

use LaravelSupercontrol\API\ApiResponse;

class PropertiesManager extends AbstractManager
{

    /**
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function filter(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'filter3.asp', $this->mergeQuery($query, $options));
    }

    /**
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function fullList(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'full_list.asp', $this->mergeQuery($query, $options));
    }

    /**
     * $query['siteId'] // required
     * $query['startdate'] = 2019-10-16 // required,future
     * $query['numbernights'] = 7 // default=7
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function availableRange(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'available_range.asp', $this->mergeQuery($query, $options));
    }

    /**
     * $query['siteId'] // required
     * $query['startdate'] = 2019-10-16 // required,future
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function propertyAvailBulk(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'property_avail_bulk.asp', $this->mergeQuery($query, $options));
    }

    /**
     * $query['siteId'] // required
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function propertyCodes(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'property_codes.asp', $this->mergeQuery($query, $options));
    }

    /**
     * $query['siteId'] // required
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function propertyDiscountText(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'property_discounttext.asp', $this->mergeQuery($query, $options));
    }

    /**
     * $query['siteId'] // required
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function propertyLastUpdate(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'property_lastupdate.asp', $this->mergeQuery($query, $options));
    }
}
