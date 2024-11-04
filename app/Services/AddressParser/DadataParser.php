<?php

namespace App\Services\AddressParser;

use Dadata\DadataClient;

class DadataParser implements ParserInterface
{

    public function __construct(protected DadataClient $client) {}

    public function getAddress(string $address): array
    {
        return $this->client->clean('address', $address);
    }
}
