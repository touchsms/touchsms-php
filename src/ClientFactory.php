<?php

declare(strict_types=1);

namespace TouchSms\ApiClient;

use Http\Client\Common\Plugin\AuthenticationPlugin;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Client\Common\Plugin\ErrorPlugin;
use Http\Client\Common\PluginClient;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Http\Message\Authentication\BasicAuth;
use Psr\Http\Client\ClientInterface;

class ClientFactory
{
    public static function create(string $accessToken, string $tokenId, ClientInterface $httpClient = null): Client
    {
        // Find a default HTTP client if none provided
        if (null === $httpClient) {
            $httpClient = Psr18ClientDiscovery::find();
        }

        // Decorates the HTTP client with some plugins
        $uri = Psr17FactoryDiscovery::findUriFactory()->createUri('https://app.touchsms.com.au/api/');
        $pluginClient = new PluginClient($httpClient, [
            new ErrorPlugin(),
            new HttpPlugin\ErrorPlugin(),
            new BaseUriPlugin($uri),
            new AuthenticationPlugin(new BasicAuth($accessToken, $tokenId)),
        ]);

        // Instantiate our client extending the one generated by Jane
        return Client::create($pluginClient);
    }
}
