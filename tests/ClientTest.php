<?php
namespace Vohinc\BotanalyticsPhp\Tests;

use Vohinc\BotanalyticsPhp\Client;
use Vohinc\BotanalyticsPhp\Drivers\DriverAbstract;
use Vohinc\BotanalyticsPhp\Exceptions\MissDriverException;
use Vohinc\BotanalyticsPhp\Exceptions\UnknownMethodException;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
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

    /** @test */
    public function can_get_driver_method()
    {
        // Arrange
        $client = new Client('fake-token');
        $driver = new FakeDriver();
        $client->setDriver($driver);

        // Assert
        $this->assertTrue($client->user([]));
    }

    /** @test */
    public function unknown_method()
    {
        // Arrange
        $client = new Client('fake-token');

        // Act
        try {
            $client->unknown([]);
        } catch (UnknownMethodException $ex) {
            return;
        }

        // Assert
        $this->fail('Run method success even method is not exist');
    }
}

class FakeDriver extends DriverAbstract
{
    protected $endpoint = 'https://example.com';

    /**
     * Make request body
     *
     * @return array
     */
    public function make()
    {
        // TODO: Implement make() method.
    }

    public function user()
    {
        return true;
    }
}
