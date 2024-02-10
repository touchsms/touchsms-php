<?php

declare(strict_types=1);

namespace TouchSms\ApiClient\Api\Authentication;

class BasicAuthAuthentication implements \Jane\Component\OpenApiRuntime\Client\AuthenticationPlugin
{
    private $username;
    private $password;

    public function __construct(string $username, string $password)
    {
        $this->{'username'} = $username;
        $this->{'password'} = $password;
    }

    public function authentication(\Psr\Http\Message\RequestInterface $request): \Psr\Http\Message\RequestInterface
    {
        $header = sprintf('Basic %s', base64_encode(sprintf('%s:%s', $this->{'username'}, $this->{'password'})));

        return $request->withHeader('Authorization', $header);
    }

    public function getScope(): string
    {
        return 'basicAuth';
    }
}
