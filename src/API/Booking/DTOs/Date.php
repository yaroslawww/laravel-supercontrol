<?php


namespace LaravelSupercontrol\API\Booking\DTOs;

class Date implements ConvertibleToRequest
{
    /**
     * a - available
     * b - booked
     * p - provisional
     */
    public string $status = 'b';

    public string $start;

    public int $nights;

    public int $closed = 0;

    public string $type = 'API';

    public ?string $yourRef = null;

    public ?string $affiliate = null;

    public ?int $siteId = null;

    public ?PaymentRedirect $paymentRedirect = null;

    public ?Guest $guest = null;

    public array $notes = [];

    public ?Booking $booking = null;

    public array $payments = [];

    public array $extras = [];

    public function __construct()
    {
        $this->siteId = config('supercontrol.default_site_id');
    }

    public function __toArray(): array
    {
        $data = [
            '_attributes' => [
                'status' => $this->status,
                'start' => $this->start,
                'nights' => $this->nights,
                'closed' => $this->closed,
            ],
        ];

        if ($this->type) {
            $data['BookingType'] = $this->type;
        }

        if ($this->yourRef) {
            $data['yourRef'] = $this->yourRef;
        }

        if ($this->affiliate) {
            $data['affiliate'] = $this->affiliate;
        }

        if ($this->siteId) {
            $data['siteId'] = $this->siteId;
        }

        if ($this->paymentRedirect) {
            $data['PaymentRedirect'] = $this->paymentRedirect->__toArray();
        }

        if ($this->guest) {
            $data['guest'] = $this->guest->__toArray();
        }

        if ($this->booking) {
            $data['booking'] = $this->booking->__toArray();
        }

        if (! empty($this->notes)) {
            $data['notes'] = [
                'note' => $this->notes,
            ];
        }

        if (! empty($this->payments)) {
            $payments = [];
            foreach ($this->payments as $payment) {
                if ($payment instanceof Payment) {
                    $payments[] = $payment->__toArray();
                }
            }
            if (! empty($payments)) {
                $data['payments'] = [
                    'payment' => $payments,
                ];
            }
        }

        if (! empty($this->extras)) {
            $extras = [];
            foreach ($this->extras as $extra) {
                if ($extra instanceof Extra) {
                    $extras[] = $extra->__toArray();
                }
            }
            if (! empty($extras)) {
                $data['extras'] = [
                    'extra' => $extras,
                ];
            }
        }

        return $data;
    }
}
