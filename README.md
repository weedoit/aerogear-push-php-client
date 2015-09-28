AeroGear Push PHP Client
--
> A simple Client to send push notification using a [AeroGear Unified Push Server](https://aerogear.org/push/)

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
$client->send($message, $options);
```

#### Documentation
For more details about the current release, please consult the [doc](https://github.com/weedoit/aerogear-push-php-client/tree/master/doc) directory

#### Found a bug?
If you found a bug please create a [issue](https://github.com/weedoit/aerogear-push-php-client/issues) for us with some steps to reproduce it.
