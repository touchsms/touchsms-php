<?php

declare(strict_types=1);

namespace TouchSms\ApiClient\Api\Model;

class OutboundMessageResponseMeta extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Length of message in characters in determined encoding.
     *
     * @var int|null
     */
    protected $size;
    /**
     * Length of message in SMS parts.
     *
     * @var int|null
     */
    protected $parts;
    /**
     * Is the message unicode or GSM.
     *
     * @var bool|null
     */
    protected $isUnicode;
    /**
     * Length of message in Billing units.
     *
     * @var float|null
     */
    protected $cost;
    /**
     * ISO country code of the number.
     *
     * @var string|null
     */
    protected $country;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Length of message in characters in determined encoding.
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * Length of message in characters in determined encoding.
     */
    public function setSize(?int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    /**
     * Length of message in SMS parts.
     */
    public function getParts(): ?int
    {
        return $this->parts;
    }

    /**
     * Length of message in SMS parts.
     */
    public function setParts(?int $parts): self
    {
        $this->initialized['parts'] = true;
        $this->parts = $parts;

        return $this;
    }

    /**
     * Is the message unicode or GSM.
     */
    public function getIsUnicode(): ?bool
    {
        return $this->isUnicode;
    }

    /**
     * Is the message unicode or GSM.
     */
    public function setIsUnicode(?bool $isUnicode): self
    {
        $this->initialized['isUnicode'] = true;
        $this->isUnicode = $isUnicode;

        return $this;
    }

    /**
     * Length of message in Billing units.
     */
    public function getCost(): ?float
    {
        return $this->cost;
    }

    /**
     * Length of message in Billing units.
     */
    public function setCost(?float $cost): self
    {
        $this->initialized['cost'] = true;
        $this->cost = $cost;

        return $this;
    }

    /**
     * ISO country code of the number.
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * ISO country code of the number.
     */
    public function setCountry(?string $country): self
    {
        $this->initialized['country'] = true;
        $this->country = $country;

        return $this;
    }
}
