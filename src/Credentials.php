<?php


namespace JGI\Fraktjakt;


class Credentials
{
    /**
     * @var string
     */
    private $consignorId;

    /**
     * @var string
     */
    private $consignorKey;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var string
     */
    private $language;

    /**
     * @var string
     */
    private $apiVersion;

    /**
     * @param string $consignorId
     * @param string $consignorKey
     * @param string $currency
     * @param string $language
     * @param string $apiVersion
     */
    public function __construct(string $consignorId, string $consignorKey, string $currency, string $language, string $apiVersion)
    {
        $this->consignorId = $consignorId;
        $this->consignorKey = $consignorKey;
        $this->currency = $currency;
        $this->language = $language;
        $this->apiVersion = $apiVersion;
    }

    /**
     * @return string
     */
    public function getConsignorId(): string
    {
        return $this->consignorId;
    }

    /**
     * @return string
     */
    public function getConsignorKey(): string
    {
        return $this->consignorKey;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @return string
     */
    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }
}
