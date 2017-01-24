<?php
namespace Casperlaitw\BotanalyticsPhp;

use Casperlaitw\BotanalyticsPhp\Drivers\DriverAbstract;
use Casperlaitw\BotanalyticsPhp\Drivers\DriverInterface;
use Casperlaitw\BotanalyticsPhp\Exceptions\MissDriverException;
use Casperlaitw\BotanalyticsPhp\Exceptions\UnknownMethodException;

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
     * @var DriverAbstract
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

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     * @throws \Casperlaitw\BotanalyticsPhp\Exceptions\UnknownMethodException
     */
    public function __call($name, $arguments)
    {
        if (method_exists($this, $name)) {
            return call_user_func($name, $arguments);
        }

        if (method_exists($this->driver, $name) && count($arguments) === 1) {
            $this->driver->setMessage($arguments[0]);
            return call_user_func([$this->driver, $name]);
        }

        throw new UnknownMethodException();
    }
}
