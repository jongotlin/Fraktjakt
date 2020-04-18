<?php

namespace JGI\Fraktjakt;

use GuzzleHttp\Client;
use JGI\Fraktjakt\DocumentGenerator\DocumentGeneratorInterface;
use JGI\Fraktjakt\DocumentGenerator\OrderDocumentGenerator;
use JGI\Fraktjakt\DocumentGenerator\ShipmentDocumentGenerator;
use JGI\Fraktjakt\Provider\OrderProvider;

/**
 * @method OrderProvider orders()
 */
class Fraktjakt
{
    private $client;

    /**
     * @var DocumentGeneratorInterface[]
     */
    private $documentGenerators;

    private $credentials;

    public function __construct(Client $client, Credentials $credentials, iterable $documentGenerators = null)
    {
        $this->client = $client;
        $this->credentials = $credentials;
        if (is_null($documentGenerators)) {
            $documentGenerators = [
                new OrderDocumentGenerator(),
                new ShipmentDocumentGenerator(),
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
