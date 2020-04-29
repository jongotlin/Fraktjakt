<?php

namespace JGI\Fraktjakt\Provider;

use JGI\Fraktjakt\DocumentGenerator\ShipmentDocumentGenerator;
use JGI\Fraktjakt\Model\Shipment;

class ShipmentProvider extends BaseProvider implements ProviderInterface
{
    /**
     * @param Shipment $shipment
     */
    public function create($shipment)
    {
        $id = parent::create($shipment);

        $shipment->setFraktjaktId($id);
    }
}
