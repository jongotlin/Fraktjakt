<?php

namespace JGI\Fraktjakt;

use GuzzleHttp\Client;

class Fraktjakt
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function __call($name, $arguments)
    {
        $a = 1;
    }
}
