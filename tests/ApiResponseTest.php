<?php

declare(strict_types=1);

/*
 * This file is part of package ang3/php-psp-systempay-client
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ang3\Component\PSP\Systempay\Tests;

use Ang3\Component\PSP\Systempay\ApiResponse;
use Ang3\Component\PSP\Systempay\Enum\ApiResponseStatus;
use Ang3\Component\PSP\Systempay\Enum\Mode;
use Ang3\Component\PSP\Systempay\Utils\Payload;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
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
        self::assertSame('TestService', $response->getWebService());
        self::assertSame('1.0', $response->getVersion());
        self::assertSame('1.2.3', $response->getApplicationVersion());
        self::assertSame(ApiResponseStatus::Success, $response->getStatus());

        // Assuming getAnswer() returns a Payload object with a toArray() method.
        self::assertSame($data['answer'], $response->getAnswer()->toArray());

        $expectedDate = new \DateTimeImmutable('2025-03-11T12:00:00+00:00');
        self::assertSame($expectedDate, $response->getServerDate());

        self::assertSame('TestProvider', $response->getApplicationProvider());
        self::assertSame(Mode::Test, $response->getMode());
        self::assertTrue($response->isTestMode());
        self::assertTrue($response->isSuccessful());
        self::assertFalse($response->isFailed());
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

        self::assertSame(ApiResponseStatus::Error, $response->getStatus());
        self::assertFalse($response->isSuccessful());
        self::assertTrue($response->isFailed());
        self::assertFalse($response->isTestMode());
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
