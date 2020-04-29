<?php

namespace JGI\Fraktjakt\Model;

class Address
{
    /**
     * @var string|null
     */
    private $streetAddress1;

    /**
     * @var string|null
     */
    private $streetAddress2;

    /**
     * @var string|null
     */
    private $postalCode;

    /**
     * @var string|null
     */
    private $cityName;

    /**
     * @var bool
     */
    private $residential = true;

    /**
     * @var string|null
     */
    private $countryCode;

    /**
     * @var string|null
     */
    private $language;

    /**
     * @return string|null
     */
    public function getStreetAddress1(): ?string
    {
        return $this->streetAddress1;
    }

    /**
     * @param string|null $streetAddress1
     */
    public function setStreetAddress1(?string $streetAddress1): void
    {
        $this->streetAddress1 = $streetAddress1;
    }

    /**
     * @return string|null
     */
    public function getStreetAddress2(): ?string
    {
        return $this->streetAddress2;
    }

    /**
     * @param string|null $streetAddress2
     */
    public function setStreetAddress2(?string $streetAddress2): void
    {
        $this->streetAddress2 = $streetAddress2;
    }

    /**
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @param string|null $postalCode
     */
    public function setPostalCode(?string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return string|null
     */
    public function getCityName(): ?string
    {
        return $this->cityName;
    }

    /**
     * @param string|null $cityName
     */
    public function setCityName(?string $cityName): void
    {
        $this->cityName = $cityName;
    }

    /**
     * @return bool
     */
    public function isResidential(): bool
    {
        return $this->residential;
    }

    /**
     * @param bool $residential
     */
    public function setResidential(bool $residential): void
    {
        $this->residential = $residential;
    }

    /**
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * @param string|null $countryCode
     */
    public function setCountryCode(?string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param string|null $language
     */
    public function setLanguage(?string $language): void
    {
        $this->language = $language;
    }
}
