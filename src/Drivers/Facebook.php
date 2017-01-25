<?php
namespace Vohinc\BotanalyticsPhp\Drivers;

/**
 * Class Facebook
 * @package Vohinc\BotanalyticsPhp\Drivers
 */
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

    /**
     * Send user profile to Botanalytics
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function user()
    {
        return $this->request('https://botanalytics.co/api/v1/facebook-messenger/users/', $this->message);
    }
}
