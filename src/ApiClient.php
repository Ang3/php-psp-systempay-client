<?php

declare(strict_types=1);

/*
 * This file is part of package ang3/php-psp-systempay-client
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ang3\Component\PSP\Systempay;

use Ang3\Component\PSP\Systempay\Enum\ApiEndpoint;
use Ang3\Component\PSP\Systempay\Exception\InvalidPayloadException;
use Ang3\Component\PSP\Systempay\Exception\InvalidResponseException;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiClient
{
    public const BASE_API_URL = 'https://api.systempay.fr/api-payment/V4/';

    private HttpClientInterface $httpClient;
    private PayloadValidator $payloadValidator;

    public function __construct(
        private readonly Credentials $credentials,
        private readonly ?LoggerInterface $logger = null
    ) {
        $this->httpClient = HttpClient::create([
            'base_uri' => self::BASE_API_URL,
        ]);
        $this->payloadValidator = new PayloadValidator();
    }

    /**
     * Validates the provided IPN payload from Systempay.
     *
     * This method leverages the configured payload validator to verify that the provided IPN payload:
     * - Conforms to Systempay’s expected structure.
     * - Contains all necessary data.
     * - Passes the integrity check through hash verification.
     *
     * @param mixed[] $payload an associative array representing the IPN payload data
     *
     * @return bool returns true if the payload is valid
     *
     * @throws InvalidPayloadException if the payload is missing required fields or fails hash verification
     */
    public function validatePayload(array $payload): bool
    {
        return $this->payloadValidator->validate($this->credentials, $payload);
    }

    /**
     * @param array<string, mixed>  $payload
     * @param array<string, scalar> $headers
     *
     * @return ApiResponse The API response
     *
     * @throws DecodingExceptionInterface    When the body cannot be decoded to an array
     * @throws TransportExceptionInterface   When a network error occurs
     * @throws RedirectionExceptionInterface On a 3xx when $throw is true and the "max_redirects" option has been reached
     * @throws ClientExceptionInterface      On a 4xx when $throw is true
     * @throws ServerExceptionInterface      On a 5xx when $throw is true
     * @throws InvalidResponseException      On invalid API response
     */
    public function request(ApiEndpoint|string $endpoint, array $payload, array $headers = []): ApiResponse
    {
        $requestId = uniqid();
        $endpoint = $endpoint instanceof ApiEndpoint ? $endpoint->value : $endpoint;
        $this->logger?->info('New Systempay API request #{request_id} - {endpoint}.', [
            'request_id' => $requestId,
            'endpoint' => $endpoint,
            'payload' => $payload,
        ]);

        $response = $this->httpClient->request('POST', $endpoint, array_merge($headers, [
            'json' => $payload,
            'auth_basic' => [$this->credentials->getUsername(), $this->credentials->getApiKey()],
        ]));

        try {
            return new ApiResponse($response->toArray());
        } catch (\Throwable $exception) {
            throw new InvalidResponseException('Invalid response payload.', 0, $exception);
        }
    }
}
