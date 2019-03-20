## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/karixtech/karix-php.git"
    }
  ],
  "require": {
    "karixtech/karix-php": "~2.0"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/karix-php/vendor/autoload.php');
```


## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

- Replace the `ACCOUNT_ID` and `ACCOUNT_TOKEN` with your appropriate credentials.
- Make sure the destination and source numbers are set correctly.

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Karix\Configuration::getDefaultConfiguration();
$config->setUsername('ACCOUNT_ID');
$config->setPassword('ACCOUNT_TOKEN');

$apiInstance = new Karix\Api\MessageApi(
    new GuzzleHttp\Client(),
    $config
);
$message = new Karix\Model\CreateMessage();

date_default_timezone_set('UTC');

$message->setChannel("sms") // Use "sms" or "whatsapp"
$message->setDestination(["+1XXX8323XXX", "+1XXX3234XXX"]);
$message->setSource("+1XXX2321XXX");
$message->setContent([
  "text" => "Hello Friend",
]);

try {
    $result = $apiInstance->sendMessage($message);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessageApi->createMessage: ', $e->getMessage(), PHP_EOL;
}
?>
```
