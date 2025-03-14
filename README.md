PHP Systempay PSP Client
========================

[![PHPUnit tests](https://github.com/ang3/php-psp-systempay-client/actions/workflows/phpunit.yml/badge.svg)](https://github.com/ang3/php-psp-systempay-client/actions/workflows/phpunit.yml)
[![Latest Stable Version](https://poser.pugx.org/ang3/php-psp-systempay-client/v/stable)](https://packagist.org/packages/ang3/php-psp-systempay-client) 
[![Latest Unstable Version](https://poser.pugx.org/ang3/php-psp-systempay-client/v/unstable)](https://packagist.org/packages/ang3/php-psp-systempay-client) 
[![Total Downloads](https://poser.pugx.org/ang3/php-psp-systempay-client/downloads)](https://packagist.org/packages/ang3/php-psp-systempay-client)

PHP HTTP client for Systempay PSP.

Installation
------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of the client:

```console
$ composer require ang3/php-psp-systempay-client
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Usage
-----

### Configure API Credentials

The API client requires credentials for authentication. 
You can use the provided demo credentials or create your own:

```php
use Ang3\Component\PSP\Systempay\Credentials;

// Use demo credentials
$credentials = Credentials::demo();

// Or create your own credentials
$credentials = new Credentials(
    12345678,              // Your username
    'your_api_key',        // Your API key
    'your_public_key',     // Your public key
    'your_hmac_key'        // Your HMAC key
);
```

### Instantiate the API Client

Pass the credentials (and optionally a PSR-3 logger) to the ApiClient:

```php
use Ang3\Component\PSP\Systempay\ApiClient;
use Psr\Log\NullLogger; // Or your preferred PSR-3 logger implementation

$logger = new NullLogger(); // Replace with your logger if needed
$apiClient = new ApiClient($credentials, $logger);
```

### Making a Request

Use the request method to send a POST request to the Systempay API.

```php
use Ang3\Component\PSP\Systempay\Enum\ApiEndpoint;

$endpoint = ApiEndpoint::CreatePayment; // or pass a string representing the endpoint

try {
    $response = $apiClient->request($endpoint, $payload);
    // Process the ApiResponse object as needed
} catch (\Exception $e) {
    // Handle exceptions such as network errors or invalid responses
    echo 'Request failed: ' . $e->getMessage();
}
```

**What Happens Under the Hood**

- Endpoint: The API endpoint is determined by the provided enum or string.
- HTTP Request: The client sends a POST request with the JSON encoded payload.
- Authentication: Basic authentication is handled using the credentials (username and API key).
- Response Parsing: The API response is parsed into an ApiResponse object.
- Logging: If a logger is provided, details of the request (including a unique request ID, endpoint, and payload) are logged.

**Error Handling**

The request method may throw several exceptions:

- `Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface`: Thrown when the response cannot be decoded.
- `Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface`: For network-related errors.
- `Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface`: For 3xx HTTP responses (if the maximum redirects are reached).
- `Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface`: For 4xx HTTP responses.
- `Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface`: For 5xx HTTP responses.
- `Ang3\Component\PSP\Systempay\Exception\InvalidResponseException`: Thrown if the API response payload is invalid.

Ensure to catch these exceptions to handle errors gracefully.

### IPN Payload Validation

Before processing an IPN (Instant Payment Notification) from Systempay, 
you should validate the payload using the validatePayload method provided by the API client. 

This method ensures that the payload conforms to Systempay’s expected structure, includes all necessary data, 
and that its integrity is verified by checking the hash signature. 
It accepts an associative array (or a Payload object) and returns true if the payload is valid; otherwise, 
it throws an InvalidPayloadException detailing the issue.

```php
$ipnPayload = [
    // Your IPN payload data here, for example:
    'kr-hash-algorithm' => 'sha256_hmac',
    'kr-answer'         => 'your_answer_data',
    'kr-hash-key'       => 'password',
    'kr-hash'           => 'calculated_hash_value',
];

try {
    if ($apiClient->validatePayload($ipnPayload)) {
        // Process the valid IPN payload
    }
} catch (InvalidPayloadException $e) {
    // Handle the invalid payload error
    throw new \InvalidArgumentException('Invalid IPN payload data: ' . $e->getMessage());
}
```

Tests
-----

To run tests:

```console
$ git clone git@github.com:Ang3/php-psp-systempay-client.git
$ composer install
$ vendor/bin/simple-phpunit
```

License
-------

This software is published under the [MIT License](./LICENCE).
