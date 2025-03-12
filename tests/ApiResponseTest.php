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
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class ApiResponseTest extends TestCase
{
    /**
     * Test that a valid API response payload creates an ApiResponse instance with the expected values.
     */
    public function testValidApiResponse(): void
    {
        $payload = [
            'webService' => 'TestService',
            'version' => '1.0',
            'applicationVersion' => '1.2.3',
            'status' => 'SUCCESS', // Must match ApiResponseStatus::Success
            'answer' => ['key' => 'value'],
            'serverDate' => '2025-03-11T12:00:00+00:00',
            'applicationProvider' => 'TestProvider',
            'mode' => 'TEST', // Must match Mode::Test
        ];

        $apiResponse = new ApiResponse($payload);

        self::assertSame('TestService', $apiResponse->getWebService());
        self::assertSame('1.0', $apiResponse->getVersion());
        self::assertSame('1.2.3', $apiResponse->getApplicationVersion());
        self::assertSame(ApiResponseStatus::Success, $apiResponse->getStatus());
        self::assertSame(['key' => 'value'], $apiResponse->getAnswer());
        self::assertInstanceOf(\DateTimeInterface::class, $apiResponse->getServerDate());
        self::assertSame('TestProvider', $apiResponse->getApplicationProvider());
        self::assertSame(Mode::Test, $apiResponse->getMode());
        self::assertTrue($apiResponse->isTestMode());
        self::assertTrue($apiResponse->isSuccessful());
        self::assertFalse($apiResponse->isFailed());
    }

    /**
     * Test that an API response payload without a mode property sets the mode to null.
     */
    public function testApiResponseWithoutMode(): void
    {
        $payload = [
            'webService' => 'TestService',
            'version' => '1.0',
            'applicationVersion' => '1.2.3',
            'status' => 'SUCCESS',
            'answer' => [],
            'serverDate' => '2025-03-11T12:00:00+00:00',
            'applicationProvider' => 'TestProvider',
            // 'mode' property is omitted intentionally.
        ];

        $apiResponse = new ApiResponse($payload);

        self::assertNull($apiResponse->getMode());
        self::assertFalse($apiResponse->isTestMode());
    }

    /**
     * Test that an ApiResponse instance cannot be created when a required property is missing.
     *
     * This test expects an InvalidArgumentException to be thrown when a required property (e.g. "webService")
     * is missing from the payload.
     */
    public function testInvalidApiResponseMissingProperty(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $payload = [
            // Missing 'webService' property.
            'version' => '1.0',
            'applicationVersion' => '1.2.3',
            'status' => 'SUCCESS',
            'answer' => [],
            'serverDate' => '2025-03-11T12:00:00+00:00',
            'applicationProvider' => 'TestProvider',
            'mode' => 'TEST',
        ];

        new ApiResponse($payload);
    }

    /**
     * Test that an ApiResponse instance cannot be created when a property has an incorrect type.
     *
     * This test expects an InvalidArgumentException to be thrown when a property (e.g. "version")
     * is not of type string.
     */
    public function testInvalidApiResponseWrongType(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $payload = [
            'webService' => 'TestService',
            'version' => 1.0, // Invalid type: float instead of string
            'applicationVersion' => '1.2.3',
            'status' => 'SUCCESS',
            'answer' => [],
            'serverDate' => '2025-03-11T12:00:00+00:00',
            'applicationProvider' => 'TestProvider',
            'mode' => 'TEST',
        ];

        new ApiResponse($payload);
    }
}
