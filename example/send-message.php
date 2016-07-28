<?php
    require '../src/touchSMS.php';

    use touchSMS\touchSMS;

    $touchSMS = new touchSMS('YOUR_API_ID', 'YOUR_API_PASSWORD');
    
    /*
        Mobile number provided by ACMA
        http://www.acma.gov.au/Citizen/Consumer-info/All-about-numbers/Special-numbers/fictitious-numbers-for-radio-film-and-television-i-acma
    */


    $obj = $touchSMS->sendMessage('Hello World', '61491570110'); 

    if($obj->code == 200) {
        echo 'Message Sent';
    } else {
        echo '['.$obj->code.'] ';
        echo $touchSMS->getCleanResponse();
    }