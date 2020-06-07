<?php


namespace LaravelSupercontrol\API\Booking\DTOs;

class Property implements ConvertibleToRequest
{
    public int $propId;
    public bool $reset = false;
    public array $dates = [];

    public function __toArray(): array
    {
        $data = [
            'propID' => $this->propId,
            'reset' => $this->reset ? 'true' : 'false',
        ];

        if (! empty($this->dates)) {
            $dates = [];
            foreach ($this->dates as $date) {
                if ($date instanceof Date) {
                    $dates[] = $date->__toArray();
                }
            }
            if (! empty($dates)) {
                $data['dates'] = [
                    'date' => $dates,
                ];
            }
        }

        return $data;
    }
}
