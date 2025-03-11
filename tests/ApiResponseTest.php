<?php

declare(strict_types=1);

namespace Ang3\Component\PSP\Systempay\Tests;

use PHPUnit\Framework\TestCase;
use Ang3\Component\PSP\Systempay\ApiResponse;
use Ang3\Component\PSP\Systempay\Utils\Payload;
use Ang3\Component\PSP\Systempay\Enum\ApiResponseStatus;
use Ang3\Component\PSP\Systempay\Enum\Mode;

final class ApiResponseTest extends TestCase
{
    /**
     * Test a successful API response.
     */
    public function testSuccessfulResponse(): void
    {
        $data = [
            'webService' => 'TestService',
            'version' => '1.0',
            'applicationVersion' => '1.2.3',
            'status' => 'SUCCESS', // Must match ApiResponseStatus::Success
            'answer' => ['data' => 'some answer'],
            'serverDate' => '2025-03-11T12:00:00+00:00',
            'applicationProvider' => 'TestProvider',
            'mode' => 'TEST', // Must match Mode::Test
        ];

        // Instantiate a Payload using the provided data array.
        $payload = new Payload($data);
        $response = new ApiResponse($payload);

        // Verify that the getters return the expected values.
        $this->assertEquals('TestService', $response->getWebService());
        $this->assertEquals('1.0', $response->getVersion());
        $this->assertEquals('1.2.3', $response->getApplicationVersion());
        $this->assertEquals(ApiResponseStatus::Success, $response->getStatus());

        // Assuming getAnswer() returns a Payload object with a toArray() method.
        $this->assertEquals($data['answer'], $response->getAnswer()->toArray());

        $expectedDate = new \DateTimeImmutable('2025-03-11T12:00:00+00:00');
        $this->assertEquals($expectedDate, $response->getServerDate());

        $this->assertEquals('TestProvider', $response->getApplicationProvider());
        $this->assertEquals(Mode::Test, $response->getMode());
        $this->assertTrue($response->isTestMode());
        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isFailed());
    }

    /**
     * Test an API response with an error status.
     */
    public function testErrorResponse(): void
    {
        $data = [
            'webService' => 'TestService',
            'version' => '1.0',
            'applicationVersion' => '1.2.3',
            'status' => 'ERROR', // Must match ApiResponseStatus::Error
            'answer' => ['error' => 'Some error occurred'],
            'serverDate' => '2025-03-11T12:00:00+00:00',
            'applicationProvider' => 'TestProvider',
            'mode' => 'PRODUCTION', // A value other than 'TEST'
        ];

        $payload = new Payload($data);
        $response = new ApiResponse($payload);

        $this->assertEquals(ApiResponseStatus::Error, $response->getStatus());
        $this->assertFalse($response->isSuccessful());
        $this->assertTrue($response->isFailed());
        $this->assertFalse($response->isTestMode());
    }

    /**
     * Test that a missing serverDate property triggers an exception.
     */
    public function testMissingServerDateThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Missing server date property.');

        $data = [
            'webService' => 'TestService',
            'version' => '1.0',
            'applicationVersion' => '1.2.3',
            'status' => 'SUCCESS',
            'answer' => ['data' => 'some answer'],
            // 'serverDate' is missing here
            'applicationProvider' => 'TestProvider',
            'mode' => 'TEST',
        ];

        $payload = new Payload($data);
        // This should throw an exception due to the missing serverDate property.
        new ApiResponse($payload);
    }
}