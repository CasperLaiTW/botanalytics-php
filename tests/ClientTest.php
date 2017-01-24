<?php

use Casperlaitw\BotanalyticsPhp\Client;
use Casperlaitw\BotanalyticsPhp\Drivers\DriverAbstract;
use Casperlaitw\BotanalyticsPhp\Exceptions\MissDriverException;
use PHPUnit\Framework\TestCase;
use \Mockery as m;

class ClientTest extends TestCase
{
    protected function tearDown()
    {
        m::close();
    }

    /** @test */
    public function missing_driver()
    {
        // Arrange
        $client = new Client('fake-token');

        // Assert
        try {
            $client->request('fake-message');
        } catch (MissDriverException $ex) {
            return;
        }

        $this->fail('Client request success event missing driver');
    }
}

class FakeDriver extends DriverAbstract
{

    /**
     * Make request body
     *
     * @return array
     */
    public function make()
    {
        // TODO: Implement make() method.
    }
}
