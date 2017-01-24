<?php
namespace Casperlaitw\BotanalyticsPhp\Drivers;

use Casperlaitw\BotanalyticsPhp\Exceptions\MissEndpointException;
use GuzzleHttp\Client;

/**
 * Class DriverAbstract
 * @package Casperlaitw\BotanalyticsPhp\Drivers
 */
abstract class DriverAbstract implements DriverInterface
{
    /**
     * @var array
     */
    protected $message;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var Client
     */
    private $client;

    /**
     * Api url
     *
     * @var string
     */
    protected $endpoint = '';

    /**
     * DriverAbstract constructor.
     * @throws \Casperlaitw\BotanalyticsPhp\Exceptions\MissEndpointException
     */
    public function __construct()
    {
        if (empty($this->endpoint)) {
            throw new MissEndpointException;
        }
        $this->client = new Client();
    }

    /**
     * @param $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Set token
     *
     * @param string $token
     * @return $this
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function track()
    {
        return $this->client->request('POST', $this->endpoint, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => " Token {$this->token}",
            ],
            'json' => $this->make(),
        ]);
    }
}
