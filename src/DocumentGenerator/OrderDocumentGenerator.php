<?php

namespace JGI\Fraktjakt\DocumentGenerator;

use JGI\Fraktjakt\Xml\FraktjaktDocument;
use JGI\Fraktjakt\Model\Order;

class OrderDocumentGenerator implements DocumentGeneratorInterface
{
    public function getRootName(): string
    {
        return 'OrderSpecification';
    }

    public function create($shipment): FraktjaktDocument
    {
        $fraktjaktDocument = new FraktjaktDocument();

        $root = $fraktjaktDocument->createElement($this->getRootName());
        $root->setAttributeNodeNS(new \DOMAttr('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance'));

        $commodities = $fraktjaktDocument->createElement('commodities');
        $commodity = $fraktjaktDocument->createElement('commodity');
        $commodity->appendChild($fraktjaktDocument->createElement('name', 'Knivar'));
        $commodity->appendChild($fraktjaktDocument->createElement('weight', 1.5));
        $commodity->appendChild($fraktjaktDocument->createElement('length', 10));
        $commodity->appendChild($fraktjaktDocument->createElement('height', 10));
        $commodity->appendChild($fraktjaktDocument->createElement('width', 10));
        $commodities->appendChild($commodity);
        $root->appendChild($commodities);

        $addressTo = $fraktjaktDocument->createElement('address_to');
        $addressTo->appendChild($fraktjaktDocument->createElement('street_address_1', 'Dalstadsvägen 26'));
        $addressTo->appendChild($fraktjaktDocument->createElement('postal_code', '71930'));
        $addressTo->appendChild($fraktjaktDocument->createElement('country_code', 'SE'));
        $root->appendChild($addressTo);

        $fraktjaktDocument->appendChild($root);

        return $fraktjaktDocument;
    }
}
