<?php

declare(strict_types=1);

namespace TouchSms\ApiClient\Api\Model;

class V2SmsDryPostResponse200 extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var V2SmsDryPostResponse200Data|null
     */
    protected $data;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    public function getData(): ?V2SmsDryPostResponse200Data
    {
        return $this->data;
    }

    public function setData(?V2SmsDryPostResponse200Data $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;

        return $this;
    }
}
