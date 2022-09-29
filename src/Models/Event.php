<?php

namespace Karrio\Karrio\Models;

use Illuminate\Support\Arr;

class Event
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getDate(): string
    {
        return Arr::get($this->data, 'date');
    }

    public function getDescription(): string
    {
        return Arr::get($this->data, 'description');
    }

    public function getLocation(): string
    {
        return Arr::get($this->data, 'location');
    }

    public function getCode(): string
    {
        return Arr::get($this->data, 'code');
    }

    public function getTime(): string
    {
        return Arr::get($this->data, 'time');
    }
}
