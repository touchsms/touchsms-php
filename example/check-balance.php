<?php
    require '../src/touchSMS.php';

    use touchSMS\touchSMS;

    $touchSMS = new touchSMS('YOUR_API_ID', 'YOUR_API_PASSWORD');

    $obj = $touchSMS->checkBalance();

    if($obj->code == 200) {
        echo '<pre>';
        echo 'Credits: '.$obj->credits."\n";
        echo 'Default Sender ID: '.$obj->senderid."\n";
        echo 'Mobile Number: '.$obj->mobile;
        echo '</pre>';
    } else {
        echo '['.$obj->code.'] ';
        echo $touchSMS->getCleanResponse();
    }