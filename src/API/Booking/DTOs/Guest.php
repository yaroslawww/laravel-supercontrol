<?php


namespace LaravelSupercontrol\API\Booking\DTOs;

class Guest implements ConvertibleToRequest
{
    public ?string $title = null;
    public ?string $firstname = null;
    public ?string $lastname = null;
    public ?string $company = null;
    public ?string $address1 = null;
    public ?string $address2 = null;
    public ?string $town = null;
    public ?string $county = null;
    public ?string $postcode = null;
    public ?string $country = null;
    public ?string $email = null;
    public ?string $telephone = null;
    public ?string $mobile = null;

    public function __toArray(): array
    {
        $data = [];
        foreach (get_object_vars($this) as $key => $value) {
            if ($value) {
                $data[$key] = ['_cdata' => $value];
            }
        }

        return $data;
    }
}
