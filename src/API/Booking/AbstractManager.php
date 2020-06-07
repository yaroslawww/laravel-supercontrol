<?php


namespace LaravelSupercontrol\API\Booking;

use Spatie\ArrayToXml\ArrayToXml;

class AbstractManager
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    protected function mergeQuery(array $query = [], array $options = [])
    {
        $query['client'] = array_merge(
            [
                'ID' => config('supercontrol.api_id'),
                'key' => config('supercontrol.api_key'),
                'siteID' => config('supercontrol.default_site_id'),
            ],
            ((isset($query['client']) && is_array($query['client']))
                ? $query['client']
                : [])
        );
        $options['body'] = ArrayToXml::convert($query, 'scAPI');

        return $options;
    }
}
