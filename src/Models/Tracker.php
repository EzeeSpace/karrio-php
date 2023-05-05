<?php

namespace Karrio\Karrio\Models;

use Illuminate\Support\Arr;
use Ramsey\Collection\Collection;

class Tracker
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getId(): string
    {
        return Arr::get($this->data, 'id');
    }

    public function getCarrierName(): string
    {
        return Arr::get($this->data, 'carrier_name');
    }

    public function getTrackingNumber(): string
    {
        return Arr::get($this->data, 'tracking_number');
    }

    public function getCarrierId(): string
    {
        return Arr::get($this->data, 'carrier_id');
    }

    public function getEvents(): Collection
    {
        $collection = new Collection(Event::class);
        $events = Arr::get($this->data, 'events');

        foreach ($events as $event) {
            $collection->add(new Event($event));
        }

        return $collection;
    }

    public function isDelivered(): bool
    {
        return Arr::get($this->data, 'delivered');
    }

    public function isTestMode(): bool
    {
        return Arr::get($this->data, 'test_mode');
    }

    public function getStatus(): string
    {
        return Arr::get($this->data, 'status');
    }
}
