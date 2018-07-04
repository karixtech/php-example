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
    "karixtech/karix-php": "0.0.2"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/SwaggerClient-php/vendor/autoload.php');
```


## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

- Replace the `AUTH_ID` and `AUTH_TOKEN` with your appropriate credentials.
- Make sure the destination and source numbers are set correctly.

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
    $config = new \Swagger\Client\Configuration();
    $config->setUsername('AUTH_ID');
    $config->setPassword('AUTH_TOKEN');

$apiInstance = new Swagger\Client\Api\MessageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$api_version = "1.0"; // string | API Version. If not specified your pinned verison is used.
$message = new \Swagger\Client\Model\CreateMessage(); // \Swagger\Client\Model\CreateAccount | Subaccount object

date_default_timezone_set('UTC');

$message->setDestination(["+1XXX8323XXX", "+1XXX3234XXX"]);
$message->setSource("+1XXX2321XXX");
$message->setText("Hello Friend");

try {
    $result = $apiInstance->sendMessage($api_version, $message);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessageApi->createMessage: ', $e->getMessage(), PHP_EOL;
}

?>

```
