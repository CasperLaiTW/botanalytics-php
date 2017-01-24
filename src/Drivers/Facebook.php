<?php
namespace Casperlaitw\BotanalyticsPhp\Drivers;

class Facebook extends DriverAbstract
{
    /**
     * @var string
     */
    protected $endpoint = 'https://botanalytics.co/api/v1/messages/facebook-messenger';

    /**
     * Make request body
     *
     * @return array
     */
    public function make()
    {
        return [
            'recipient' => $this->message['recipient'],
            'message' => $this->message['message'],
            'timestamp' => time(),
        ];
    }
}
