# Example touchSMS project

### Get started

Before getting started you must have a valid [api key](https://platform.touchsms.com.au/apis/) for touchSMS.

```php
$touchsms = new touchSMS('YOUR_API_ID', 'YOUR_API_PASSWORD');
```

### Send Message

To send a message provide the mobile number and some message text.

It's option to provide a sender id or reference number. If you're sending a two way message it's recommended that you include a reference number.

```php
$obj = $touchsms->sendMessage('Hello World', '61491570110'); 
```

### Check Balance

To check your balance (pre-paid customers) or other information like default Sender ID or Mobile number, request the function and authenticated users details will be provided.

```php
$obj = $touchsms->checkBalance();
```