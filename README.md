touchSMS
=========

[![Latest Stable Version](https://poser.pugx.org/touchsms/touchsms/version)](https://packagist.org/packages/touchsms/touchsms)

PHP SDK for [touchSMS](https://touchsms.com.au). 

This SDK is generated automatically with JanePHP. It provides a full object-oriented interface for the endpoints, requests and responses.

You can explore the `\TouchSms\ApiClient\Api` namespace to see the generated classes.

Currently, only a portion of the API has been converted to openAPI, and thus this client. If you would like support for a method, please open an issue and our team will address it.

## Installation

    composer require touchsms/touchsms

## Usage

Use the `ClientFactory` to create an API client.

```php
// access token & token id can be generated at https://app.touchsms.com.au/settings/api
$client = \TouchSms\ApiClient\ClientFactory::create('ACCESS_TOKEN', 'TOKEN_ID');

$res = $client->getAccount();
```
 
### Send SMS

```php
$client = ClientFactory::create($_ENV['ACCESS_TOKEN'], $_ENV['TOKEN_ID']);

$res = $client->sendMessages(new SendMessageBody([
    'messages' => [ // Up to 1000 messages supported
        new OutboundMessage([
            'to' => '61491578888', // Test number
            'from' => 'SHARED_NUMBER',
            'body' => 'Text',
        ]),
    ],
]));

var_dump($res->getData()->getMessages()); // Successful messages, \TouchSms\ApiClient\Api\Model\OutboundMessageResponse
var_dump($res->getData()->getErrors()); // Messages with errors, \TouchSms\ApiClient\Api\Model\OutboundMessageError
```

#### Output

```php
// array of OutboundMessageResponse objects
$message = $res->getData()->getMessages()[0];
$message->getTo();
$message->getMeta()->getParts();
$message->getMeta()->getCost();
//etc
```

### View User Details

```php
$res = $client->getAccount();
```

#### Output

```php
var_dump($res->getData()); // object, \TouchSms\ApiClient\Api\Model\AccountInformation
var_dump(
    $res->getData()->getEmail(), // user
    $res->getData()->getCredits() // credit balance
);
```

## Examples

Examples can be found in `examples` directory.
