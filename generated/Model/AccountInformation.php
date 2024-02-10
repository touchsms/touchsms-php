<?php

declare(strict_types=1);

namespace TouchSms\ApiClient\Api\Model;

class AccountInformation extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var int|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $firstname;
    /**
     * @var string|null
     */
    protected $surname;
    /**
     * @var string|null
     */
    protected $email;
    /**
     * @var string|null
     */
    protected $mobile;
    /**
     * @var float|null
     */
    protected $credits;
    /**
     * @var array<string, mixed>|null
     */
    protected $settings;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->initialized['firstname'] = true;
        $this->firstname = $firstname;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): self
    {
        $this->initialized['surname'] = true;
        $this->surname = $surname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;

        return $this;
    }

    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    public function setMobile(?string $mobile): self
    {
        $this->initialized['mobile'] = true;
        $this->mobile = $mobile;

        return $this;
    }

    public function getCredits(): ?float
    {
        return $this->credits;
    }

    public function setCredits(?float $credits): self
    {
        $this->initialized['credits'] = true;
        $this->credits = $credits;

        return $this;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getSettings(): ?iterable
    {
        return $this->settings;
    }

    /**
     * @param array<string, mixed>|null $settings
     */
    public function setSettings(?iterable $settings): self
    {
        $this->initialized['settings'] = true;
        $this->settings = $settings;

        return $this;
    }
}
