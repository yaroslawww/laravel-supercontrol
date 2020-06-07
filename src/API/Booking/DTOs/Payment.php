<?php


namespace LaravelSupercontrol\API\Booking\DTOs;

class Payment implements ConvertibleToRequest
{
    public string $date;
    public string $value;
    public ?string $caption = null;
    public string $method;

    public function __toArray(): array
    {
        $data = [
            'date' => $this->date,
            'value' => $this->value,
            'method' => $this->method,
        ];

        if ($this->caption) {
            $data['caption'] = $this->caption;
        }

        return $data;
    }
}
