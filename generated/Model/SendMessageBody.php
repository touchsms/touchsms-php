<?php

declare(strict_types=1);

namespace TouchSms\ApiClient\Api\Model;

class SendMessageBody extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var OutboundMessage[]|null
     */
    protected $messages;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * @return OutboundMessage[]|null
     */
    public function getMessages(): ?array
    {
        return $this->messages;
    }

    /**
     * @param OutboundMessage[]|null $messages
     */
    public function setMessages(?array $messages): self
    {
        $this->initialized['messages'] = true;
        $this->messages = $messages;

        return $this;
    }
}
