<?php

namespace JGI\Fraktjakt;

use GuzzleHttp\Client;
use JGI\Fraktjakt\Provider\OrderProvider;

/**
 * @method OrderProvider orders()
 */
class Fraktjakt
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function __call($name, $arguments)
    {
        $name = trim($name, 's');
        $class = sprintf('JGI\\Fraktjakt\\Provider\\%sProvider', ucfirst($name));

        return new $class($this->client);
    }
}
