<?php

namespace Karrio\Karrio;

use Karrio\Karrio\Core\RestConnector;
use Karrio\Karrio\Models\Tracker;

class Client
{
    private ?RestConnector $connector;

    public function __construct(string $accessToken, string $url = null)
    {
        $this->connector = new RestConnector($accessToken, $url);
    }

    public function ping(): array
    {
        $response = $this->connector->send(new Requests\PingRequest());

        return json_decode($response->body(), true, 512, JSON_THROW_ON_ERROR);
    }

    public function createTracker(string $carrierName, string $trackingNumber): Tracker
    {
        return $this->connector->send(new Requests\CreateTrackerRequest($carrierName, $trackingNumber))->dto();
    }

    public function getTracker(string $trackingId): Tracker
    {
        return $this->connector->send(new Requests\GetTrackerRequest($trackingId))->dto();
    }
}
