<?php


namespace LaravelSupercontrol\API\V3;

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

    protected function mergeQuery(array $query, array $options)
    {
        $query = array_merge(['siteID' => config('supercontrol.default_site_id')], $query);
        $options['query'] = array_merge(
            $query,
            (
                (isset($options['query']) && is_array($options['query']))
                ? $options['query']
                : []
            )
        );

        return $options;
    }
}
