<?php

namespace Karrio\Karrio\Requests;

use Karrio\Karrio\Core\RestConnector;
use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;

class PingRequest extends SaloonRequest
{
    protected ?string $connector = RestConnector::class;

    protected ?string $method = Saloon::GET;

    public function defineEndpoint(): string
    {
        return '/';
    }
}
