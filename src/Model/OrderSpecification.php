<?php

namespace JGI\Fraktjakt\Model;

class OrderSpecification
{
    /**
     * @var string|null
     */
    private $reference;

    /**
     * @var Commodity[]
     */
    private $commodities = [];

    /**
     * @var Address|null
     */
    private $addressFrom;

    /**
     * @var Address|null
     */
    private $addressTo;

    /**
     * @var Recipient|null
     */
    private $recipient;

    /**
     * @var Sender|null
     */
    private $sender;

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param string|null $reference
     */
    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return Commodity[]
     */
    public function getCommodities(): array
    {
        return $this->commodities;
    }

    /**
     * @param Commodity[] $commodities
     */
    public function setCommodities(array $commodities): void
    {
        $this->commodities = $commodities;
    }

    /**
     * @param Commodity $commodity
     */
    public function addCommodity(Commodity $commodity): void
    {
        $this->commodities[] = $commodity;
    }

    public function getWeight(): int
    {
        $weight = 0;
        foreach ($this->getCommodities() as $commodity) {
            $weight += $commodity->getWeight();
        }

        return $weight;
    }

    /**
     * @return Address|null
     */
    public function getAddressFrom(): ?Address
    {
        return $this->addressFrom;
    }

    /**
     * @param Address $addressFrom
     */
    public function setAddressFrom(Address $addressFrom): void
    {
        $this->addressFrom = $addressFrom;
    }

    /**
     * @return Address|null
     */
    public function getAddressTo(): ?Address
    {
        return $this->addressTo;
    }

    /**
     * @param Address $addressTo
     */
    public function setAddressTo(Address $addressTo): void
    {
        $this->addressTo = $addressTo;
    }

    /**
     * @return Recipient|null
     */
    public function getRecipient(): ?Recipient
    {
        return $this->recipient;
    }

    /**
     * @param Recipient $recipient
     */
    public function setRecipient(Recipient $recipient): void
    {
        $this->recipient = $recipient;
    }

    /**
     * @return Sender|null
     */
    public function getSender(): ?Sender
    {
        return $this->sender;
    }

    /**
     * @param Sender $sender
     */
    public function setSender(Sender $sender): void
    {
        $this->sender = $sender;
    }
}
