# Botanalytics-PHP
[Botanalytics](https://botanalytics.co/) is a bot analytics service, improves Human-to-Bot interaction.

The package is made you easy to integrate the service.

## Install
### Composer
To get the latest version
```shell
composer require casperlaitw/botanalytics-php
```
## Usage

### Facebook Messenger Driver
```php
<?php
use Casperlaitw\BotanalyticsPhp\Client;
use Casperlaitw\BotanalyticsPhp\Drivers\Facebook;

$client = new Client('botanalytics-token');
$client->setDriver(new Facebook());
$client->request([
   'recipient' => 'Sender ID', // (should be null for the incoming messages)
   'message' => [], // Facebook incoming message structure
]);
```

## License
This package is licensed under the [MIT license](https://github.com/CasperLaiTW/botanalytics-php/blob/master/LICENSE).