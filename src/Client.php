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
        $response = $this->connector->send(new Requests\CreateTrackerRequest($carrierName, $trackingNumber));

        return $response->dto();
    }

    public function getTracker(string $carrierName, string $trackingNumber): Tracker
    {
        $response = $this->connector->send(new Requests\GetTrackerRequest($carrierName, $trackingNumber));

        return $response->dto();
    }
}
