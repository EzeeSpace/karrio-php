<?php

namespace Karrio\Karrio\Requests;

use Karrio\Karrio\Core\RestConnector;
use Karrio\Karrio\Models\Tracker;
use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Sammyjo20\Saloon\Traits\Plugins\CastsToDto;

class CreateTrackerRequest extends SaloonRequest
{
    use CastsToDto;

    protected ?string $connector = RestConnector::class;

    protected ?string $method = Saloon::GET;

    private string $carrierName;

    private string $trackingNumber;

    public function __construct(string $carrierName, string $trackingNumber)
    {
        $this->carrierName = $carrierName;
        $this->trackingNumber = $trackingNumber;
    }

    public function defineEndpoint(): string
    {
        return "/trackers/{$this->carrierName}/{$this->trackingNumber}";
    }

    protected function castToDto(SaloonResponse $response): Tracker
    {
        return new Tracker($response->json());
    }
}
