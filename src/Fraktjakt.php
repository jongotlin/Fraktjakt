<?php

namespace JGI\Fraktjakt;

use GuzzleHttp\Client;
use JGI\Fraktjakt\DocumentGenerator\DocumentGeneratorInterface;
use JGI\Fraktjakt\DocumentGenerator\OrderDocumentGenerator;
use JGI\Fraktjakt\DocumentGenerator\OrderSpecificationGenerator;
use JGI\Fraktjakt\DocumentGenerator\ShipmentDocumentGenerator;
use JGI\Fraktjakt\Provider\OrderProvider;
use JGI\Fraktjakt\Provider\OrderSpecificationProvider;
use JGI\Fraktjakt\Provider\ShipmentProvider;

class Fraktjakt
{
    private $client;

    private $credentials;

    public function __construct(Client $client, Credentials $credentials)
    {
        $this->client = $client;
        $this->credentials = $credentials;
    }

    public function orders()
    {
        return new OrderProvider($this->client, new OrderDocumentGenerator(), $this->credentials);
    }

    public function shipments()
    {
        return new ShipmentProvider($this->client, new ShipmentDocumentGenerator(), $this->credentials);
    }

    public function orderSpecifications()
    {
        return new OrderSpecificationProvider($this->client, new OrderSpecificationGenerator(), $this->credentials);
    }
}
