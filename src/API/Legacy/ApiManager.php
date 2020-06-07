<?php


namespace LaravelSupercontrol\API\Legacy;

class ApiManager extends AbstractManager
{
    protected $properties = null;
    protected $property = null;
    protected $meta = null;

    public function properties()
    {
        if (! $this->properties) {
            $this->properties = \app(PropertiesManager::class, ['client' => $this->client]);
        }

        return $this->properties;
    }

    public function property()
    {
        if (! $this->property) {
            $this->property = \app(PropertyManager::class, ['client' => $this->client]);
        }

        return $this->property;
    }

    public function meta()
    {
        if (! $this->meta) {
            $this->meta = \app(MetaManager::class, ['client' => $this->client]);
        }

        return $this->meta;
    }
}
