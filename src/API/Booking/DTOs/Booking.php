<?php


namespace LaravelSupercontrol\API\Booking\DTOs;

class Booking implements ConvertibleToRequest
{
    public ?float $value = null;
    public ?float $vatPercentage = null;
    public ?float $commission = null;
    public ?int $adults = null;
    public ?int $children = null;
    public ?int $infants = null;

    public function __toArray(): array
    {
        $pax = [];
        if ($this->adults) {
            $pax['adults'] = $this->adults;
        }
        if ($this->children) {
            $pax['children'] = $this->children;
        }
        if ($this->infants) {
            $pax['infants'] = $this->infants;
        }

        $data = [
            'value' => $this->value,
            'vatPercentage' => $this->vatPercentage,
            'commission' => $this->commission,
        ];
        if (empty($pax)) {
            $data['pax'] = [
                '_attributes' => $pax,
            ];
        }

        return $data;
    }
}
