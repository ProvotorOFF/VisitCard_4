<?php

namespace App\Services\AddressParser;

interface ParserInterface
{
    public function getAddress(string $address): array;
}
