AeroGear Push PHP Client
--


#### Usage:


```php
include 'src/Client.php';
include 'src/Message.php';

use AeroGear\Client,
    AeroGear\Message;

$yourServerURL = 'YOUR_SERVER_URL';
$message = new Message('Your awesome message.');
$options = [
    // Your options
];

$client = new Client($yourServerURL);
$client->setApplicationId('YOUR_APP_ID');
$client->setMasterSecret('YOUR_APP_MASTER_SECRET');
$client->send($message);
```

#### Documentation
For more infos check `doc` directory
