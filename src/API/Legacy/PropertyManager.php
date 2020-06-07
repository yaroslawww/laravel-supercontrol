<?php


namespace LaravelSupercontrol\API\Legacy;

use LaravelSupercontrol\API\ApiResponse;

class PropertyManager extends AbstractManager
{

    /**
     * $query['id'] // required (PropertyId)
     * $query['startdate'] = 2019-10-16 // required,future
     * $query['numbernights'] = 7 // default=7
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function getNights(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'get_nights.asp', $this->mergeQuery($query, $options));
    }

    /**
     * $query['id'] // required (PropertyId)
     * $query['startdate'] = 2019-10-16 // required,future
     * $query['numbernights'] = 7 // default=7
     * $query['sleeps'] =
     * $query['adults'] =
     * $query['children'] =
     * $query['infants'] =
     * $query['siteId'] =
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function getPrice(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'get_price.asp', $this->mergeQuery($query, $options));
    }

    /**
     * $query['propertycode'] // required (PropertyId)
     * $query['startdate'] = 2019-10-16 // required,future
     * $query['enddate'] = 2019-10-16 // required,future
     * $query['show'] =  // "grouped" - if property grouped
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function propertyAvail(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'property_avail.asp', $this->mergeQuery($query, $options));
    }

    /**
     * $query['propertycode'] // required (PropertyId)
     * $query['startdate'] = 2019-10-16 // required,future
     * $query['enddate'] = 2019-10-16 // required,future
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function propertyBooked(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'property_booked.asp', $this->mergeQuery($query, $options));
    }

    /**
     * $query['propertycode'] // required (PropertyId)
     * $query['startdate'] = 2019-10-16 // required,future
     * $query['enddate'] = 2019-10-16 // required,future
     * @param array $query
     * @param array $options
     * @return ApiResponse
     */
    public function propertyDates(array $query = [], array $options = []): ApiResponse
    {
        return $this->client->request('get', 'property_dates.asp', $this->mergeQuery($query, $options));
    }
}
