<?php

namespace JGI\Fraktjakt\Provider;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use JGI\Fraktjakt\Credentials;
use JGI\Fraktjakt\DocumentGenerator\DocumentGeneratorInterface;
use JGI\Fraktjakt\Exception\ApiException;

abstract class BaseProvider implements ProviderInterface
{
    protected $client;

    protected $documentGenerator;

    protected $credentials;

    public function __construct(Client $client, DocumentGeneratorInterface $documentGenerator, Credentials $credentials)
    {
        $this->client = $client;
        $this->documentGenerator = $documentGenerator;
        $this->credentials = $credentials;
    }

    public function create($model)
    {
        $fraktjaktDocument = null;
        $fraktjaktDocument = $this->documentGenerator->create($model);
        $root = $fraktjaktDocument->documentElement;

        $consignor = $fraktjaktDocument->createElement('consignor');
        $consignorId = $this->credentials->getConsignorId();
        $consignorKey = $this->credentials->getConsignorKey();
        $currency = $this->credentials->getCurrency();
        $language = $this->credentials->getLanguage();
        $consignor->appendChild($fraktjaktDocument->createElement('id', $consignorId));
        $consignor->appendChild($fraktjaktDocument->createElement('key', $consignorKey));
        $consignor->appendChild($fraktjaktDocument->createElement('currency', $currency));
        $consignor->appendChild($fraktjaktDocument->createElement('language', $language));
        $consignor->appendChild($fraktjaktDocument->createElement('encoding', 'UTF-8'));
        $consignor->appendChild($fraktjaktDocument->createElement('system_name', 'Label3000'));
        $consignor->appendChild($fraktjaktDocument->createElement('system_version', '1'));
        $consignor->appendChild($fraktjaktDocument->createElement('api_version', '3.7.0'));
        $root->appendChild($consignor);

        $request = new Request('POST', 'https://testapi.fraktjakt.se/orders/order_xml?xml=' . urlencode($fraktjaktDocument->saveXML()));
        //$request = new Request('POST', 'https://testapi.fraktjakt.se/fraktjakt/query_xml?xml=' . urlencode($fraktjaktDocument->saveXML()));

        $response = $this->client->send($request);
        $statusCode = $response->getStatusCode();
        $content = $response->getBody()->getContents();
        $dom = new \DomDocument;
        $dom->loadXML($content);

        $code = $dom->getElementsByTagName('code')->item(0)->textContent;
        $warningMessage = $dom->getElementsByTagName('warning_message')->item(0)->textContent;
        $errorMessage = $dom->getElementsByTagName('error_message')->item(0)->textContent;

        if ($code != '1') {
            throw new ApiException((int)$code, $errorMessage, $warningMessage);
        }

        if ($dom->getElementsByTagName('id')->length > 0) {
            return $dom->getElementsByTagName('id')->item(0)->textContent;
        }
    }
}
