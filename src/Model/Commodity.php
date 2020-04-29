<?php

namespace JGI\Fraktjakt\Model;


class Commodity
{
    const QUANTITY_UNIT_EACH = 'EA';
    const QUANTITY_UNIT_DOZENS = 'DZ';
    const QUANTITY_UNIT_LITERS = 'L';
    const QUANTITY_UNIT_MILILITERS = 'ML';
    const QUANTITY_UNIT_KILOGRAMS = 'KG';

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var int
     */
    private $quantity = 1;

    /**
     * @var string|null
     */
    private $taric;

    /**
     * @var string|null
     */
    private $quantityUnits;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var string|null
     */
    private $countryOfManufacture;

    /**
     * @var float|null
     */
    private $weight;

    /**
     * @var float|null
     */
    private $length;

    /**
     * @var float|null
     */
    private $width;

    /**
     * @var float|null
     */
    private $height;

    /**
     * @var float|null
     */
    private $unitPrice;

    /**
     * @var bool
     */
    private $inOwnParcel = false;

    /**
     * @var string|null
     */
    private $articleNumber;

    /**
     * @var string|null
     */
    private $shelfPosition;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string|null
     */
    public function getTaric(): ?string
    {
        return $this->taric;
    }

    /**
     * @param string|null $taric
     */
    public function setTaric(?string $taric): void
    {
        $this->taric = $taric;
    }

    /**
     * @return string|null
     */
    public function getQuantityUnits(): ?string
    {
        return $this->quantityUnits;
    }

    /**
     * @param string|null $quantityUnits
     */
    public function setQuantityUnits(?string $quantityUnits): void
    {
        $this->quantityUnits = $quantityUnits;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getCountryOfManufacture(): ?string
    {
        return $this->countryOfManufacture;
    }

    /**
     * @param string|null $countryOfManufacture
     */
    public function setCountryOfManufacture(?string $countryOfManufacture): void
    {
        $this->countryOfManufacture = $countryOfManufacture;
    }

    /**
     * @return float|null
     */
    public function getWeight(): ?float
    {
        return $this->weight;
    }

    /**
     * @param float|null $weight
     */
    public function setWeight(?float $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return float|null
     */
    public function getLength(): ?float
    {
        return $this->length;
    }

    /**
     * @param float|null $length
     */
    public function setLength(?float $length): void
    {
        $this->length = $length;
    }

    /**
     * @return float|null
     */
    public function getWidth(): ?float
    {
        return $this->width;
    }

    /**
     * @param float|null $width
     */
    public function setWidth(?float $width): void
    {
        $this->width = $width;
    }

    /**
     * @return float|null
     */
    public function getHeight(): ?float
    {
        return $this->height;
    }

    /**
     * @param float|null $height
     */
    public function setHeight(?float $height): void
    {
        $this->height = $height;
    }

    /**
     * @return float|null
     */
    public function getUnitPrice(): ?float
    {
        return $this->unitPrice;
    }

    /**
     * @param float|null $unitPrice
     */
    public function setUnitPrice(?float $unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * @return bool
     */
    public function isInOwnParcel(): bool
    {
        return $this->inOwnParcel;
    }

    /**
     * @param bool $inOwnParcel
     */
    public function setInOwnParcel(bool $inOwnParcel): void
    {
        $this->inOwnParcel = $inOwnParcel;
    }

    /**
     * @return string|null
     */
    public function getArticleNumber(): ?string
    {
        return $this->articleNumber;
    }

    /**
     * @param string|null $articleNumber
     */
    public function setArticleNumber(?string $articleNumber): void
    {
        $this->articleNumber = $articleNumber;
    }

    /**
     * @return string|null
     */
    public function getShelfPosition(): ?string
    {
        return $this->shelfPosition;
    }

    /**
     * @param string|null $shelfPosition
     */
    public function setShelfPosition(?string $shelfPosition): void
    {
        $this->shelfPosition = $shelfPosition;
    }
}
