<?php

use TouchSms\ApiClient\Api\Model\OutboundMessage;
use TouchSms\ApiClient\Api\Model\SendMessageBody;
use TouchSms\ApiClient\ClientFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$client = ClientFactory::create(getenv('ACCESS_TOKEN'), getenv('TOKEN_ID'));

$res = $client->sendMessages((new SendMessageBody())->setMessages([ // Up to 1000 messages supported
    new OutboundMessage([
        'to' => '61491578888', // Test number
        'from' => 'SHARED_NUMBER',
        'body' => 'Text',
    ]),
]));

var_dump($res->getData()->getMessages()[0]); // Successful messages, \TouchSms\ApiClient\Api\Model\OutboundMessageResponse
var_dump($res->getData()->getErrors()); // Messages with errors, \TouchSms\ApiClient\Api\Model\OutboundMessageError


// If you wanted to dry send (ie, just calculate cost/etc)
$client->sendMessagesDry((new SendMessageBody())->setMessages([
    // messages
]));
