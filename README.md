# Botanalytics-PHP
[![Build Status](https://travis-ci.org/vohinc/botanalytics-php.svg)](https://travis-ci.org/vohinc/botanalytics-php)
[![StyleCI](https://styleci.io/repos/79898405/shield)](https://styleci.io/repos/79898405)

[Botanalytics](https://botanalytics.co/) is a bot analytics service, improves Human-to-Bot interaction.

The package is made you easy to integrate the service.

## Install
### Composer
To get the latest version
```shell
composer require vohinc/botanalytics-php
```
## Usage

### Facebook Messenger Driver
```php
<?php
use Vohinc\BotanalyticsPhp\Client;
use Vohinc\BotanalyticsPhp\Drivers\Facebook;

$client = new Client('botanalytics-token');
$client->setDriver(new Facebook());
$client->request([
   'recipient' => 'Sender ID', // (should be null for the incoming messages)
   'message' => [], // Facebook incoming message structure
]);
```

## License
This package is licensed under the [MIT license](https://github.com/vohinc/botanalytics-php/blob/master/LICENSE).