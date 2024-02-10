<?php
declare(strict_types=1);

namespace TouchSms\ApiClient\Exception;

class ApiValidationException extends \Exception
{
    private string $errorMessage;

    private ?array $errors;

    public function __construct(string $errorMessage, ?array $errors, \Throwable $previous = null)
    {
        $this->errorMessage = $errorMessage;

        $this->errors = $errors;

        parent::__construct(sprintf('touchSMS returned error code "%s"', $errorMessage), 0, $previous);
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }

    public function getErrors(): ?array
    {
        return $this->errors;
    }
}
