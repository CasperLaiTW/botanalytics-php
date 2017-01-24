<?php
namespace Casperlaitw\BotanalyticsPhp;

use Casperlaitw\BotanalyticsPhp\Drivers\DriverAbstract;
use Casperlaitw\BotanalyticsPhp\Drivers\DriverInterface;
use Casperlaitw\BotanalyticsPhp\Exceptions\MissDriverException;

/**
 * Class Client
 * @package Casperlaitw\BotanalyticsPhp
 */
class Client
{
    /**
     * @var string
     */
    private $token;

    /**
     * @var DriverInterface
     */
    private $driver;

    /**
     * Client constructor.
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Set driver
     *
     * @param DriverAbstract $driver
     */
    public function setDriver(DriverAbstract $driver)
    {
        $this->driver = $driver->setToken($this->token);
    }

    /**
     * @param $message
     * @throws \Casperlaitw\BotanalyticsPhp\Exceptions\MissDriverException
     */
    public function request($message)
    {
        if (!$this->driver instanceof DriverAbstract) {
            throw new MissDriverException;
        }

        $this->driver->setMessage($message)->track();
    }
}
