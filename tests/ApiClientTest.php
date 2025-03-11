<?php

declare(strict_types=1);

/*
 * This file is part of package ang3/php-psp-systempay-client
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ang3\Component\PSP\Systempay\Tests;

use Ang3\Component\PSP\Systempay\ApiClient;
use Ang3\Component\PSP\Systempay\ApiResponse;
use Ang3\Component\PSP\Systempay\Credentials;
use Ang3\Component\PSP\Systempay\Exception\InvalidPayloadException;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

/**
 * @internal
 *
 * @coversNothing
 */
final class ApiClientTest extends TestCase
{
    private Credentials $credentials;
    private ApiClient $apiClient;

    protected function setUp(): void
    {
        // Initialize credentials (using demo credentials for testing).
        $this->credentials = Credentials::demo();
        // Instantiate ApiClient with a NullLogger.
        $this->apiClient = new ApiClient($this->credentials, new NullLogger());
    }

    /**
     * Test that a valid IPN payload is validated successfully.
     */
    public function testValidatePayloadValid(): void
    {
        $krAnswer = 'test/answer';
        // Compute the expected hash using the HMAC key from credentials.
        $expectedHash = hash_hmac('sha256', $krAnswer, $this->credentials->getHmacKey());

        $payload = [
            'kr-hash-algorithm' => 'sha256_hmac',
            'kr-answer' => $krAnswer,
            'kr-hash-key' => 'sha256_hmac',
            'kr-hash' => $expectedHash,
        ];

        self::assertTrue($this->apiClient->validatePayload($payload));
    }

    /**
     * Test that an invalid IPN payload triggers an exception.
     */
    public function testValidatePayloadInvalid(): void
    {
        $payload = [
            // Missing the "kr-hash-algorithm" field.
            'kr-answer' => 'test/answer',
            'kr-hash-key' => 'sha256_hmac',
            'kr-hash' => 'invalidhash',
        ];

        $this->expectException(InvalidPayloadException::class);
        $this->apiClient->validatePayload($payload);
    }

    /**
     * Test that a valid API request returns an ApiResponse.
     *
     * This test uses a MockHttpClient to simulate a successful response from Systempay.
     */
    public function testRequestReturnsApiResponse(): void
    {
        // Prepare a valid response payload as expected by the ApiResponse constructor.
        $responseData = [
            'webService' => 'TestService',
            'version' => '1.0',
            'applicationVersion' => '1.2.3',
            'status' => 'SUCCESS', // Must correspond to the expected enum value.
            'answer' => ['data' => 'some answer'],
            'serverDate' => '2025-03-11T12:00:00+00:00',
            'applicationProvider' => 'TestProvider',
            'mode' => 'TEST',
        ];

        // Create a MockResponse that returns the above JSON-encoded payload.
        $mockResponse = new MockResponse(json_encode($responseData));
        // Create a MockHttpClient that will return our mock response.
        $mockHttpClient = new MockHttpClient($mockResponse, ApiClient::BASE_API_URL);

        // Replace the ApiClient's private httpClient property with our MockHttpClient.
        $reflection = new \ReflectionClass($this->apiClient);
        $property = $reflection->getProperty('httpClient');
        $property->setValue($this->apiClient, $mockHttpClient);

        // Define an endpoint and dummy payload (the payload is used in the request, but the response is mocked).
        $endpoint = 'payment';
        $requestPayload = ['dummy' => 'data'];

        // Execute the request.
        $apiResponse = $this->apiClient->request($endpoint, $requestPayload);

        // Validate that the response is an instance of ApiResponse and has expected properties.
        self::assertInstanceOf(ApiResponse::class, $apiResponse);
        self::assertSame('TestService', $apiResponse->getWebService());
        self::assertSame('1.0', $apiResponse->getVersion());
        self::assertSame('1.2.3', $apiResponse->getApplicationVersion());
        self::assertSame('TestProvider', $apiResponse->getApplicationProvider());
        // If getMode() returns an enum, compare its value.
        self::assertSame('TEST', $apiResponse->getMode()?->value);
    }
}
