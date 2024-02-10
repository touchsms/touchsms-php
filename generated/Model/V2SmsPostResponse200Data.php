<?php

declare(strict_types=1);

namespace TouchSms\ApiClient\Api\Model;

class V2SmsPostResponse200Data extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var OutboundMessageResponse[]|null
     */
    protected $messages;
    /**
     * @var OutboundMessageError[]|null
     */
    protected $errors;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * @return OutboundMessageResponse[]|null
     */
    public function getMessages(): ?array
    {
        return $this->messages;
    }

    /**
     * @param OutboundMessageResponse[]|null $messages
     */
    public function setMessages(?array $messages): self
    {
        $this->initialized['messages'] = true;
        $this->messages = $messages;

        return $this;
    }

    /**
     * @return OutboundMessageError[]|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param OutboundMessageError[]|null $errors
     */
    public function setErrors(?array $errors): self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;

        return $this;
    }
}
