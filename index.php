<?php

include 'src/Client.php';
include 'src/Message.php';

use AeroGear\Client,
    AeroGear\Message;


// Test
$yourServerURL = 'YOUR_SERVER_URL';
$message = new Message('Your awesome message.');

$client = new Client($yourServerURL);
$client->setApplicationId('YOUR_APP_ID');
$client->setMasterSecret('YOUR_APP_MASTER_SECRET');
$client->send($message);