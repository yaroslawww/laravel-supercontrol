<?php


namespace LaravelSupercontrol\API\V1;

class ApiManager extends AbstractManager
{
    protected $booking = null;
    protected $property = null;
    protected $availability = null;
    protected $rate = null;
    protected $helper = null;

    public function booking(): BookingManager
    {
        if (! $this->booking) {
            $this->booking = \app(BookingManager::class, ['client' => $this->client]);
        }

        return $this->booking;
    }

    public function property(): PropertyManager
    {
        if (! $this->property) {
            $this->property = \app(PropertyManager::class, ['client' => $this->client]);
        }

        return $this->property;
    }

    public function availability(): AvailabilityManager
    {
        if (! $this->availability) {
            $this->availability = \app(AvailabilityManager::class, ['client' => $this->client]);
        }

        return $this->availability;
    }

    public function rate(): RatesManager
    {
        if (! $this->rate) {
            $this->rate = \app(RatesManager::class, ['client' => $this->client]);
        }

        return $this->rate;
    }

    public function helper(): HelpersManager
    {
        if (! $this->helper) {
            $this->helper = \app(HelpersManager::class, ['client' => $this->client]);
        }

        return $this->helper;
    }
}
