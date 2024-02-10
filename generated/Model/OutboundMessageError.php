<?php

declare(strict_types=1);

namespace TouchSms\ApiClient\Api\Model;

class OutboundMessageError extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var string|null
     */
    protected $status;
    /**
     * Destination phone number. Ideally in international format with the leading +, ie 61412345678. Local formatting will be parsed but is not recommended.
     *
     * @var string|null
     */
    protected $to;
    /**
     * Sender ID, either a a Dedicated Number, Verified Phone Number, Verified Alphanumeric Sender ID. When using numbers, use E164 format. To send using the shared pool, use the string "SHARED_NUMBER".
     *
     * @var string|null
     */
    protected $from;
    /**
     * Message content. Unicode is accepted.
     *
     * @var string|null
     */
    protected $body;
    /**
     * Custom campaign name. Shown in reports.
     *
     * @var string|null
     */
    protected $campaign;
    /**
     * Custom metadata to associate with the message. Will be returned with delivery receipts and inbound messages that are replies.
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * Supply a single image URL to send message as an MMS. See MMS section above.
     *
     * @var array<string, mixed>|null
     */
    protected $media;
    /**
     * Custom reporting reference. Available in exported reports and delivery receipts.
     *
     * @var string|null
     */
    protected $reference;
    /**
     * Schedule a message at a specific time. Must be in ISO8601 format in UTC timezone. Eg 2021-02-17T22:52:07Z.
     *
     * @var string|null
     */
    protected $date;
    /**
     * Error code for failure reason.
     *
     * @var string|null
     */
    protected $errorCode;
    /**
     * Human readable error reason description.
     *
     * @var string|null
     */
    protected $errorHelp;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * Destination phone number. Ideally in international format with the leading +, ie 61412345678. Local formatting will be parsed but is not recommended.
     */
    public function getTo(): ?string
    {
        return $this->to;
    }

    /**
     * Destination phone number. Ideally in international format with the leading +, ie 61412345678. Local formatting will be parsed but is not recommended.
     */
    public function setTo(?string $to): self
    {
        $this->initialized['to'] = true;
        $this->to = $to;

        return $this;
    }

    /**
     * Sender ID, either a a Dedicated Number, Verified Phone Number, Verified Alphanumeric Sender ID. When using numbers, use E164 format. To send using the shared pool, use the string "SHARED_NUMBER".
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }

    /**
     * Sender ID, either a a Dedicated Number, Verified Phone Number, Verified Alphanumeric Sender ID. When using numbers, use E164 format. To send using the shared pool, use the string "SHARED_NUMBER".
     */
    public function setFrom(?string $from): self
    {
        $this->initialized['from'] = true;
        $this->from = $from;

        return $this;
    }

    /**
     * Message content. Unicode is accepted.
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * Message content. Unicode is accepted.
     */
    public function setBody(?string $body): self
    {
        $this->initialized['body'] = true;
        $this->body = $body;

        return $this;
    }

    /**
     * Custom campaign name. Shown in reports.
     */
    public function getCampaign(): ?string
    {
        return $this->campaign;
    }

    /**
     * Custom campaign name. Shown in reports.
     */
    public function setCampaign(?string $campaign): self
    {
        $this->initialized['campaign'] = true;
        $this->campaign = $campaign;

        return $this;
    }

    /**
     * Custom metadata to associate with the message. Will be returned with delivery receipts and inbound messages that are replies.
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }

    /**
     * Custom metadata to associate with the message. Will be returned with delivery receipts and inbound messages that are replies.
     *
     * @param array<string, mixed>|null $metadata
     */
    public function setMetadata(?iterable $metadata): self
    {
        $this->initialized['metadata'] = true;
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * Supply a single image URL to send message as an MMS. See MMS section above.
     *
     * @return array<string, mixed>|null
     */
    public function getMedia(): ?iterable
    {
        return $this->media;
    }

    /**
     * Supply a single image URL to send message as an MMS. See MMS section above.
     *
     * @param array<string, mixed>|null $media
     */
    public function setMedia(?iterable $media): self
    {
        $this->initialized['media'] = true;
        $this->media = $media;

        return $this;
    }

    /**
     * Custom reporting reference. Available in exported reports and delivery receipts.
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * Custom reporting reference. Available in exported reports and delivery receipts.
     */
    public function setReference(?string $reference): self
    {
        $this->initialized['reference'] = true;
        $this->reference = $reference;

        return $this;
    }

    /**
     * Schedule a message at a specific time. Must be in ISO8601 format in UTC timezone. Eg 2021-02-17T22:52:07Z.
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * Schedule a message at a specific time. Must be in ISO8601 format in UTC timezone. Eg 2021-02-17T22:52:07Z.
     */
    public function setDate(?string $date): self
    {
        $this->initialized['date'] = true;
        $this->date = $date;

        return $this;
    }

    /**
     * Error code for failure reason.
     */
    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    /**
     * Error code for failure reason.
     */
    public function setErrorCode(?string $errorCode): self
    {
        $this->initialized['errorCode'] = true;
        $this->errorCode = $errorCode;

        return $this;
    }

    /**
     * Human readable error reason description.
     */
    public function getErrorHelp(): ?string
    {
        return $this->errorHelp;
    }

    /**
     * Human readable error reason description.
     */
    public function setErrorHelp(?string $errorHelp): self
    {
        $this->initialized['errorHelp'] = true;
        $this->errorHelp = $errorHelp;

        return $this;
    }
}
