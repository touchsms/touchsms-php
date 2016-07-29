<?php
namespace TouchSMS\tests;

require_once('src/touchSMS.php');

use TouchSMS\TouchSMS\touchSMS;

class touchSMSTest extends \PHPUnit_Framework_TestCase
{
    public function testCheckBalanceIsWorking()
    {
        $touchSms = new touchSMS('RGyrznuKkTYa', 'LvuOpLNs0FPCYfW8XEzspq3UL', true);

        $response = $touchSms->checkBalance();

        $this->assertObjectHasAttribute('code', $response);
        $this->assertObjectHasAttribute('username', $response);
        $this->assertObjectHasAttribute('senderid', $response);
        $this->assertObjectHasAttribute('mobile', $response);
        $this->assertEquals('200', $response->code);
        $this->assertEquals('61491570156', $response->mobile);
        $this->assertEquals('sandboxAPI', $response->senderid);
        $this->assertEquals('5000', $response->credits);
        $this->assertEquals('john.doe@sandbox', $response->username);
    }

    public function testSendSmsIsWorking()
    {
        $touchSms = new touchSMS('RGyrznuKkTYa', 'LvuOpLNs0FPCYfW8XEzspq3UL', true);

        $response = $touchSms->sendMessage('hello world', '61491570156');

        $this->assertObjectHasAttribute('code', $response);
        $this->assertObjectHasAttribute('errors', $response);
        $this->assertObjectHasAttribute('message', $response);
        $this->assertEquals('200', $response->code);
        $this->assertEquals('0', $response->errors);
        $this->assertEmpty($response->message);
    }

    public function testSendSmsSenderIdIsWorking()
    {
        $touchSms = new touchSMS('RGyrznuKkTYa', 'LvuOpLNs0FPCYfW8XEzspq3UL', true);

        $response = $touchSms->sendMessage('hello world', '61491570156', 'ref', 'touchSMS');

        $this->assertObjectHasAttribute('code', $response);
        $this->assertObjectHasAttribute('errors', $response);
        $this->assertObjectHasAttribute('message', $response);
        $this->assertEquals('200', $response->code);
        $this->assertEquals('0', $response->errors);
        $this->assertEmpty($response->message);
    }

    public function testSendSmsSenderIdIsInvalid()
    {
        $touchSms = new touchSMS('RGyrznuKkTYa', 'LvuOpLNs0FPCYfW8XEzspq3UL', true);

        $response = $touchSms->sendMessage('hello world', '61491570156', 'ref', 'touch+SMS');

        $this->assertObjectHasAttribute('code', $response);
        $this->assertObjectHasAttribute('errors', $response);
        $this->assertObjectHasAttribute('children', $response->errors);
        $this->assertObjectHasAttribute('message', $response->errors->children);
        $this->assertObjectHasAttribute('number', $response->errors->children);
        $this->assertObjectHasAttribute('senderid', $response->errors->children);
        $this->assertObjectHasAttribute('errors', $response->errors->children->senderid);
        $this->assertObjectHasAttribute('reference', $response->errors->children);
        $this->assertEquals('400', $response->code);
        $this->assertEquals('Validation Failed', $response->message);
        $this->assertCount(1, $response->errors->children->senderid->errors);
    }

    public function testSendSmsNumberIsMissing()
    {
        $touchSms = new touchSMS('RGyrznuKkTYa', 'LvuOpLNs0FPCYfW8XEzspq3UL', true);

        $response = $touchSms->sendMessage('hello world', '');

        $this->assertObjectHasAttribute('code', $response);
        $this->assertObjectHasAttribute('errors', $response);
        $this->assertObjectHasAttribute('children', $response->errors);
        $this->assertObjectHasAttribute('message', $response->errors->children);
        $this->assertObjectHasAttribute('number', $response->errors->children);
        $this->assertObjectHasAttribute('senderid', $response->errors->children);
        $this->assertObjectHasAttribute('errors', $response->errors->children->number);
        $this->assertObjectHasAttribute('reference', $response->errors->children);
        $this->assertEquals('400', $response->code);
        $this->assertEquals('Validation Failed', $response->message);
        $this->assertCount(1, $response->errors->children->number->errors);
    }

    public function testSendSmsMessageIsMissing()
    {
        $touchSms = new touchSMS('RGyrznuKkTYa', 'LvuOpLNs0FPCYfW8XEzspq3UL', true);

        $response = $touchSms->sendMessage('', '61491570156');

        $this->assertObjectHasAttribute('code', $response);
        $this->assertObjectHasAttribute('errors', $response);
        $this->assertObjectHasAttribute('children', $response->errors);
        $this->assertObjectHasAttribute('message', $response->errors->children);
        $this->assertObjectHasAttribute('number', $response->errors->children);
        $this->assertObjectHasAttribute('senderid', $response->errors->children);
        $this->assertObjectHasAttribute('errors', $response->errors->children->message);
        $this->assertObjectHasAttribute('reference', $response->errors->children);
        $this->assertEquals('400', $response->code);
        $this->assertEquals('Validation Failed', $response->message);
        $this->assertCount(1, $response->errors->children->message->errors);
    }

    public function testAuthenticationIsFailing()
    {
        $touchSms = new touchSMS('RGyrznuKkTYa-', 'LvuOpLNs0FPCYfW8XEzspq3UL-', true); // Bad API key

        $response = $touchSms->sendMessage('hello world', '61491570156');

        $this->assertObjectHasAttribute('errors', $response);
        $this->assertObjectHasAttribute('auth', $response->errors);
        $this->assertObjectHasAttribute('code', $response);
        $this->assertEquals('403', $response->code);
        $this->assertEquals('Authentication failed.', $response->errors->auth);
    }
}
