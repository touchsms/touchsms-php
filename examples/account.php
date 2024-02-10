<?php

use TouchSms\ApiClient\Api\Model\OutboundMessage;
use TouchSms\ApiClient\Api\Model\SendMessageBody;
use TouchSms\ApiClient\ClientFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$client = ClientFactory::create(getenv('ACCESS_TOKEN'), getenv('TOKEN_ID'));

$res = $client->getAccount();

var_dump($res->getData()); // object, \TouchSms\ApiClient\Api\Model\AccountInformation
var_dump(
    $res->getData()->getEmail(), // user
    $res->getData()->getCredits() // credit balance
);
