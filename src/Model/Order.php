<?php

namespace JGI\Fraktjakt\Model;


class Order
{
    /**
     * @var Shipment[]
     */
    private $shipments = [];

    public function addShipment(Shipment $shipment): void
    {
        $this->shipments[] = $shipment;
    }

    /**
     * @return Shipment[]
     */
    public function getShipments(): array
    {
        return $this->shipments;
    }
}
