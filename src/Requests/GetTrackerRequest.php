<?php

namespace Karrio\Karrio\Requests;

use Karrio\Karrio\Core\RestConnector;
use Karrio\Karrio\Models\Tracker;
use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Sammyjo20\Saloon\Traits\Plugins\CastsToDto;

class GetTrackerRequest extends SaloonRequest
{
    use CastsToDto;
    protected ?string $connector = RestConnector::class;

    protected ?string $method = Saloon::GET;

    private string $trackingId;

    public function __construct(string $trackingId)
    {
        $this->trackingId = $trackingId;
    }

    public function defineEndpoint(): string
    {
        return "/trackers/{$this->trackingId}";
    }

    protected function castToDto(SaloonResponse $response): Tracker
    {
        return new Tracker($response->json());
    }
}
