
<?php

include 'Setting\smsApi.php';

$prog= file('Setting\api_key.txt');
$api = new Setting\smsApi($prog[0], 'api.mobizon.kz');
$words = file('Setting\phone.txt');
$sender= file('Setting\sender_id.txt');
$txt=file('Setting\message.txt');
$text_msg= implode(" ",$txt);
echo "<b> Support telegram @depresed_00</b>";
echo '<pre>';
echo '</pre>';
for ($i=0;$i<count($words);$i++) {

    // API call to send a message
    if ($api->call('message',
        'sendSMSMessage',
        array(
            
            'recipient' => $words[$i],
            // Message text
            'text' => $text_msg,
            
            'from' => $sender[0],            
            
        ))
    ) {
        
        $messageId = $api->getData('messageId');

        if (!$messageId) {
            print_r($words[$i]."\n");
            echo '<pre>';
            echo '</pre>';
            
        }
        
    } else {
        
        print_r($words[$i]."\n");
        echo '[' . $api->getCode() . '] ' . $api->getMessage() . 'See details below:' . PHP_EOL . print_r($api->getData(), true) . PHP_EOL;
        echo '<pre>';
        echo '</pre>';
    }

}