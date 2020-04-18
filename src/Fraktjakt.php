<?php

namespace JGI\Fraktjakt;

use GuzzleHttp\Client;
use JGI\Fraktjakt\DocumentGenerator\OrderDocumentGenerator;
use JGI\Fraktjakt\Provider\OrderProvider;

/**
 * @method OrderProvider orders()
 */
class Fraktjakt
{
    private $client;

    private $documentGenerators;

    public function __construct(Client $client, iterable $documentGenerators = null)
    {
        $this->client = $client;
        if (is_null($documentGenerators)) {
            $documentGenerators = [
                new OrderDocumentGenerator(),
            ];
        }
        $this->documentGenerators = $documentGenerators;
    }

    public function __call($name, $arguments)
    {
        $name = trim($name, 's');
        $class = sprintf('JGI\\Fraktjakt\\Provider\\%sProvider', ucfirst($name));

        return new $class($this->client, $this->documentGenerators);
    }
}
