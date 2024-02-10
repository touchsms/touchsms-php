<?php

declare(strict_types=1);

namespace TouchSms\ApiClient\Api\Endpoint;

class SendMessagesDry extends \TouchSms\ApiClient\Api\Runtime\Client\BaseEndpoint implements \TouchSms\ApiClient\Api\Runtime\Client\Endpoint
{
    use \TouchSms\ApiClient\Api\Runtime\Client\EndpointTrait;

    public function __construct(?\TouchSms\ApiClient\Api\Model\SendMessageBody $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/v2/sms/dry';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \TouchSms\ApiClient\Api\Model\SendMessageBody) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

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
     * @return \TouchSms\ApiClient\Api\Model\V2SmsDryPostResponse200|null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'TouchSms\\ApiClient\\Api\\Model\\V2SmsDryPostResponse200', 'json');
        }
    }
}
