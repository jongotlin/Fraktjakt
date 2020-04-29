<?php

namespace JGI\Fraktjakt\Model;


class Shipment
{
    /**
     * @var string|null
     */
    private $fraktjaktId;

    /**
     * @return string|null
     */
    public function getFraktjaktId(): ?string
    {
        return $this->fraktjaktId;
    }

    /**
     * @param string|null $fraktjaktId
     */
    public function setFraktjaktId(?string $fraktjaktId): void
    {
        $this->fraktjaktId = $fraktjaktId;
    }
}
