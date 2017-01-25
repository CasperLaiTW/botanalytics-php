<?php
namespace Vohinc\BotanalyticsPhp\Drivers;

/**
 * Interface DriverInterface
 * @package Vohinc\BotanalyticsPhp\Drivers
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
