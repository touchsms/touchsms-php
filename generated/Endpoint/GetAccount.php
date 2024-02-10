<?php

declare(strict_types=1);

namespace TouchSms\ApiClient\Api\Endpoint;

class GetAccount extends \TouchSms\ApiClient\Api\Runtime\Client\BaseEndpoint implements \TouchSms\ApiClient\Api\Runtime\Client\Endpoint
{
    use \TouchSms\ApiClient\Api\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/v2/account';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    public function getAuthenticationScopes(): array
    {
        return ['basicAuth'];
    }

    /**
     * @return \TouchSms\ApiClient\Api\Model\V2AccountGetResponse200|null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'TouchSms\\ApiClient\\Api\\Model\\V2AccountGetResponse200', 'json');
        }
    }
}
