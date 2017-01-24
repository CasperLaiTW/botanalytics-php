<?php
namespace Casperlaitw\BotanalyticsPhp\Drivers;

/**
 * Interface DriverInterface
 * @package Casperlaitw\BotanalyticsPhp\Drivers
 */
interface DriverInterface
{
    /**
     * Make request body
     *
     * @return array
     */
    public function make();
}
