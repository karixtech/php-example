<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Karix\Configuration::getDefaultConfiguration();
$config->setUsername('ACCOUNT_ID');
$config->setPassword('ACCOUNT_TOKEN');

$apiInstance = new Karix\Api\MessageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$message = new Karix\Model\CreateMessage(); // Karix\Model\CreateAccount | Subaccount object

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
