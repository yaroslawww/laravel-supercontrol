<?php


namespace LaravelSupercontrol\API\Booking\DTOs;

class Extra implements ConvertibleToRequest
{
    public ?int $id = null;
    public ?int $qty = null;
    public ?float $value = null;
    public ?string $name = null;

    public function __toArray(): array
    {
        return get_object_vars($this);
    }
}
