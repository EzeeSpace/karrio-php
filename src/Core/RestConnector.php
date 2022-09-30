<?php

namespace Karrio\Karrio\Core;

use Sammyjo20\Saloon\Http\SaloonConnector;
use Sammyjo20\Saloon\Traits\Plugins\AcceptsJson;

class RestConnector extends SaloonConnector
{
    use AcceptsJson;

    private string $apiBaseUrl = 'https://api.karrio.io';
    private string $version;

    public function __construct(string $token, string $url = null, string $version = 'v1')
    {
        $this->withTokenAuth($token, 'Token');

        if (isset($url)) {
            $this->apiBaseUrl = $url;
        }
        $this->version = $version;
    }

    public function defineBaseUrl(): string
    {
        return $this->apiBaseUrl.'/'.$this->version;
    }

    public function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }

    public function defaultConfig(): array
    {
        return [
            'timeout' => 30,
        ];
    }
}
