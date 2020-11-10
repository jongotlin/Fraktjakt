<?php

namespace JGI\Fraktjakt\DocumentGenerator;

use JGI\Fraktjakt\Model\OrderSpecification;
use JGI\Fraktjakt\Model\Shipment;
use JGI\Fraktjakt\Xml\FraktjaktDocument;

class OrderSpecificationGenerator implements DocumentGeneratorInterface
{
    public function getRootName(): string
    {
        return 'OrderSpecification';
    }

    /**
     * @param OrderSpecification $orderSpecification
     * @return FraktjaktDocument
     */
    public function create($orderSpecification): FraktjaktDocument
    {
        $fraktjaktDocument = new FraktjaktDocument();

        $root = $fraktjaktDocument->createElement($this->getRootName());
        //$root->setAttributeNodeNS(new \DOMAttr('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance'));

        $root->appendChild($fraktjaktDocument->createElement('shipping_product_id', '99'));
        $root->appendChild($fraktjaktDocument->createElement('reference', $orderSpecification->getReference()));
        $root->appendChild($fraktjaktDocument->createElement('value', 100));


        $commodities = $fraktjaktDocument->createElement('commodities');
        foreach ($orderSpecification->getCommodities() as $commodityModel) {
            $commodity = $fraktjaktDocument->createElement('commodity');
            $commodity->appendChild($fraktjaktDocument->createElement('name', $commodityModel->getName()));
            $commodity->appendChild($fraktjaktDocument->createElement('quantity', $commodityModel->getQuantity()));
            $commodity->appendChild($fraktjaktDocument->createElement('unit_price', $commodityModel->getUnitPrice()));
            /*
            $commodity->appendChild($fraktjaktDocument->createElement('weight', 1.5));
            $commodity->appendChild($fraktjaktDocument->createElement('length', 10));
            $commodity->appendChild($fraktjaktDocument->createElement('height', 10));
            $commodity->appendChild($fraktjaktDocument->createElement('width', 10));
             */
            $commodities->appendChild($commodity);
        }
        $root->appendChild($commodities);

        $parcels = $fraktjaktDocument->createElement('parcels');
        $parcel = $fraktjaktDocument->createElement('parcel');
        if ($orderSpecification->getWeight() < 500) {
            $parcel->appendChild($fraktjaktDocument->createElement('weight', 1));
        } else {
            $parcel->appendChild($fraktjaktDocument->createElement('weight', $orderSpecification->getWeight() / 1000));
        }
        $parcel->appendChild($fraktjaktDocument->createElement('length', 25));
        $parcel->appendChild($fraktjaktDocument->createElement('height', 15));
        $parcel->appendChild($fraktjaktDocument->createElement('width', 20));
        $parcels->appendChild($parcel);
        $root->appendChild($parcels);

        $addressFrom = $fraktjaktDocument->createElement('address_from');
        $addressFrom->appendChild($fraktjaktDocument->createElement('street_address_1', $orderSpecification->getAddressFrom()->getStreetAddress1()));
        $addressFrom->appendChild($fraktjaktDocument->createElement('street_address_2', $orderSpecification->getAddressFrom()->getStreetAddress2()));
        $addressFrom->appendChild($fraktjaktDocument->createElement('postal_code', $orderSpecification->getAddressFrom()->getPostalCode()));
        $addressFrom->appendChild($fraktjaktDocument->createElement('residential', $orderSpecification->getAddressFrom()->isResidential() ? 1 : 0));
        $addressFrom->appendChild($fraktjaktDocument->createElement('country_code', $orderSpecification->getAddressFrom()->getCountryCode()));
        $root->appendChild($addressFrom);

        $addressTo = $fraktjaktDocument->createElement('address_to');
        $addressTo->appendChild($fraktjaktDocument->createElement('street_address_1', $orderSpecification->getAddressTo()->getStreetAddress1()));
        $addressTo->appendChild($fraktjaktDocument->createElement('street_address_2', $orderSpecification->getAddressTo()->getStreetAddress2()));
        $addressTo->appendChild($fraktjaktDocument->createElement('postal_code', $orderSpecification->getAddressTo()->getPostalCode()));
        $addressTo->appendChild($fraktjaktDocument->createElement('residential', $orderSpecification->getAddressTo()->isResidential() ? 1 : 0));
        $addressTo->appendChild($fraktjaktDocument->createElement('country_code', $orderSpecification->getAddressTo()->getCountryCode()));
        $root->appendChild($addressTo);

        $recipient = $fraktjaktDocument->createElement('recipient');
        $recipient->appendChild($fraktjaktDocument->createElement('company_to', $orderSpecification->getRecipient()->getCompanyName()));
        $recipient->appendChild($fraktjaktDocument->createElement('name_to', $orderSpecification->getRecipient()->getName()));
        $recipient->appendChild($fraktjaktDocument->createElement('mobile_to', $orderSpecification->getRecipient()->getMobileNumber()));
        $recipient->appendChild($fraktjaktDocument->createElement('telephone_to', $orderSpecification->getRecipient()->getPhoneNumber()));
        $recipient->appendChild($fraktjaktDocument->createElement('email_to', $orderSpecification->getRecipient()->getEmailAddress()));
        $root->appendChild($recipient);

        $sender = $fraktjaktDocument->createElement('sender');
        $sender->appendChild($fraktjaktDocument->createElement('company_from', $orderSpecification->getSender()->getCompanyName()));
        $sender->appendChild($fraktjaktDocument->createElement('telephone_from', $orderSpecification->getSender()->getPhoneNumber()));
        $sender->appendChild($fraktjaktDocument->createElement('email_from', $orderSpecification->getSender()->getEmailAddress()));
        $root->appendChild($sender);

        $booking = $fraktjaktDocument->createElement('booking');
        $booking->appendChild($fraktjaktDocument->createElement('pickup_date', (new \DateTime())->format('Y-m-d')));
        $booking->appendChild($fraktjaktDocument->createElement('pickup_instructions', ''));
        $root->appendChild($booking);


        $fraktjaktDocument->appendChild($root);

        return $fraktjaktDocument;
    }
}
