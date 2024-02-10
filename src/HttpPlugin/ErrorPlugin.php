<?php
declare(strict_types=1);

namespace TouchSms\ApiClient\HttpPlugin;


use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use TouchSms\ApiClient\Exception\ApiValidationException;

class ErrorPlugin implements Plugin
{
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        $promise = $next($request);

        return $promise->then(function (ResponseInterface $response) {
            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);

            if (empty($data) || $response->getStatusCode() !== 422) {
                return $response;
            }

            throw new ApiValidationException($data['message'] ?? 'Unknown error', $data['errors']);
        });
    }
}
