<?php


namespace LaravelSupercontrol\API\Booking\DTOs;

interface ConvertibleToRequest
{
    public function __toArray(): array;
}
