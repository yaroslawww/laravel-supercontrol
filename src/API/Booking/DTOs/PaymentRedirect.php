<?php


namespace LaravelSupercontrol\API\Booking\DTOs;

class PaymentRedirect implements ConvertibleToRequest
{
    public string $success;
    public string $fail;

    public function __toArray(): array
    {
        return [
            'success' => $this->success,
            'fail' => $this->fail,
        ];
    }
}
