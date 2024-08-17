<?php
include 'Setting\smsApi.php';

$api = new Setting\smsApi('kz942bdb42a6429335ba1045ec123a683b97f482d4d806e85de58319bdb82a73382338', 'api.mobizon.kz');

// API method call
if ($api->call(
    'user',
    'getOwnBalance'
)
) {
    // Getting the result of an API request
    $result = $api->getData();
    print_r($result);
} else {
    // An error occurred during execution. Error code and message text output
    echo '[' . $api->getCode() . '] ' . $api->getMessage() . PHP_EOL;
}