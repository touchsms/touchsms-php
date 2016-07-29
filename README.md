touchSMS 
=========

[![Build Status](https://travis-ci.org/touchsms/touchsms-PHP-API.svg?branch=master)](https://travis-ci.org/touchsms/touchsms-PHP-API)
[![Latest Stable Version](https://poser.pugx.org/touchsms/touchsms/version)](https://packagist.org/packages/touchsms/touchsms)

The offical helper library to send SMS with [touchSMS](https://touchsms.com.au)

## Installation

    composer require touchsms/touchsms

## Usage

    require_once('vendor/autoload.php');

    use touchSMS\touchSMS;

    $touchSms = new touchSMS('YOUR_API_ID', 'YOUR_API_PASSWORD');

    // access token & token id can be generated at https://platform.touchsms.com.au/apis/

### Send SMS
    
    $response = $touchSms->sendMessage('hello world', '61491570156'); 
    
    print_r($response);

#### Output

    stdClass Object
    (
        [code] => 200
        [errors] => 0
        [message] => 
    )

### View User Details

    $response = $touchSms->checkBalance();

    print_r($response);

#### Output

    stdClass Object
    (
        [username] => john.doe@sandbox
        [credits] => 5000
        [senderid] => sandboxAPI
        [mobile] => 61491570156
        [code] => 200
    )

## Examples

Examples can be found in `examples` directory.

    php examples/sendsms.php
    php examples/users.php

## Tests
  Tests run through a Sandbox URL with Sandbox credentials. 

  You can update the tests with your own credentials and remove the final `true` parameter on the touchSMS constructor.

    phpunit
