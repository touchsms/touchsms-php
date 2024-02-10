<?php

declare(strict_types=1);

namespace TouchSms\ApiClient\Api\Model;

class V2AccountGetResponse200 extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var AccountInformation|null
     */
    protected $data;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    public function getData(): ?AccountInformation
    {
        return $this->data;
    }

    public function setData(?AccountInformation $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;

        return $this;
    }
}
