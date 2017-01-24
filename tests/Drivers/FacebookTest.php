<?php

use Casperlaitw\BotanalyticsPhp\Drivers\DriverAbstract;
use Casperlaitw\BotanalyticsPhp\Drivers\Facebook;
use Casperlaitw\BotanalyticsPhp\Exceptions\MissEndpointException;
use PHPUnit\Framework\TestCase;

class FacebookTest extends TestCase
{
    /** @test */
    public function get_make_array()
    {
        // Arrange
        $driver = new Facebook();
        $message = [
            'recipient' => 'sender-id',
            'message' => 'test-message',
        ];
        // Act
        $driver->setMessage($message);

        // Assert
        $this->assertArraySubset([
            'recipient' => 'sender-id',
            'message' => 'test-message',
        ], $driver->make());
    }

    /** @test */
    public function missing_endpoint()
    {
        try {
            new class extends DriverAbstract {

                /**
                 * Make request body
                 *
                 * @return array
                 */
                public function make()
                {
                }
            };
        } catch (MissEndpointException $ex) {
            return;
        }

        $this->fail('Driver create success even missing endpoint');
    }
}
