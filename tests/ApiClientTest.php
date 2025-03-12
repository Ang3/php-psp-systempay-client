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
        // Initialize credentials (using demo credentials for testing)
        $this->credentials = Credentials::demo();
        $this->apiClient = new ApiClient($this->credentials, new NullLogger());
    }

    /**
     * Test that a valid IPN payload is validated successfully.
     *
     * This test verifies that the validatePayload() method returns true
     * when a properly structured IPN payload is provided.
     */
    public function testValidatePayloadValid(): void
    {
        $krAnswer = 'test/answer';
        // Compute the expected hash using the HMAC key from the credentials
        $expectedHash = hash_hmac('sha256', $krAnswer, $this->credentials->getHmacKey());

        $payload = [
            'kr-hash-algorithm' => 'sha256_hmac',
            'kr-answer' => $krAnswer,
            'kr-hash-key' => 'sha256_hmac',
            'kr-hash' => $expectedHash,
        ];

        $result = $this->apiClient->validatePayload($payload);
        self::assertTrue($result, 'The IPN payload should be valid.');
    }

    /**
     * Test that an invalid IPN payload triggers an exception.
     *
     * This test ensures that the validatePayload() method throws an exception
     * when the payload is invalid (e.g., missing required fields or incorrect hash).
     */
    public function testValidatePayloadInvalid(): void
    {
        $payload = [
            // 'kr-hash-algorithm' field is missing and incorrect hash is provided
            'kr-answer' => 'test/answer',
            'kr-hash-key' => 'sha256_hmac',
            'kr-hash' => 'invalidhash',
        ];

        $this->expectException(InvalidPayloadException::class);
        $this->apiClient->validatePayload($payload);
    }

    /**
     * Test that the request() method returns an ApiResponse object.
     *
     * This test simulates an HTTP response using a mock HTTP client and verifies that
     * the request() method returns an instance of ApiResponse with the expected data.
     */
    public function testRequestReturnsApiResponse(): void
    {
        // Prepare simulated response data as expected by the ApiResponse constructor
        $responseData = [
            'webService' => 'TestService',
            'version' => '1.0',
            'applicationVersion' => '1.2.3',
            'status' => 'SUCCESS', // Expected value; must correspond to the appropriate enum value
            'answer' => ['data' => 'test response'],
            'serverDate' => '2025-03-11T12:00:00+00:00',
            'applicationProvider' => 'TestProvider',
            'mode' => 'TEST',
        ];

        // Create a MockResponse that returns the simulated JSON-encoded response data
        $mockResponse = new MockResponse(json_encode($responseData));
        // Create a MockHttpClient with the base URI of the API
        $mockHttpClient = new MockHttpClient($mockResponse, ApiClient::BASE_API_URL);

        // Use Reflection to replace the private httpClient property with the mock HTTP client
        $reflection = new \ReflectionClass($this->apiClient);
        $property = $reflection->getProperty('httpClient');
        $property->setValue($this->apiClient, $mockHttpClient);

        // Define an endpoint and dummy payload (payload content is not used here as the response is mocked)
        $endpoint = 'payment';
        $requestPayload = ['dummy' => 'data'];

        // Execute the API request
        $apiResponse = $this->apiClient->request($endpoint, $requestPayload);

        // Validate that the response is an instance of ApiResponse and contains the expected properties
        self::assertInstanceOf(ApiResponse::class, $apiResponse);
        self::assertSame('TestService', $apiResponse->getWebService());
        self::assertSame('1.0', $apiResponse->getVersion());
        self::assertSame('1.2.3', $apiResponse->getApplicationVersion());
        self::assertSame('TestProvider', $apiResponse->getApplicationProvider());
        // If getMode() returns an enum, verify its value
        self::assertSame('TEST', $apiResponse->getMode()?->value);
    }
}
