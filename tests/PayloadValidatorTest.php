<?php

declare(strict_types=1);

namespace Ang3\Component\PSP\Systempay\Tests;

use PHPUnit\Framework\TestCase;
use Ang3\Component\PSP\Systempay\PayloadValidator;
use Ang3\Component\PSP\Systempay\Credentials;
use Ang3\Component\PSP\Systempay\Exception\InvalidPayloadException;

final class PayloadValidatorTest extends TestCase
{
    private Credentials $credentials;
    private PayloadValidator $validator;

    protected function setUp(): void
    {
        // Initialize credentials using the demo method (or replace with your own).
        $this->credentials = Credentials::demo();
        $this->validator = new PayloadValidator();
    }

    /**
     * Test that a valid payload using the 'sha256_hmac' key type validates correctly.
     */
    public function testValidPayloadWithSha256Hmac(): void
    {
        $krAnswer = 'test/answer';
        // Compute the expected hash using the HMAC key from credentials.
        $expectedHash = hash_hmac('sha256', $krAnswer, $this->credentials->getHmacKey());

        $payload = [
            'kr-hash-algorithm' => 'sha256_hmac',
            'kr-answer'         => $krAnswer,
            'kr-hash-key'       => 'sha256_hmac',
            'kr-hash'           => $expectedHash,
        ];

        $this->assertTrue($this->validator->validate($this->credentials, $payload));
    }

    /**
     * Test that a valid payload using the 'password' key type validates correctly.
     */
    public function testValidPayloadWithPassword(): void
    {
        $krAnswer = 'test/answer';
        // Compute the expected hash using the API key from credentials.
        $expectedHash = hash_hmac('sha256', $krAnswer, $this->credentials->getApiKey());

        $payload = [
            'kr-hash-algorithm' => 'sha256_hmac',
            'kr-answer'         => $krAnswer,
            'kr-hash-key'       => 'password',
            'kr-hash'           => $expectedHash,
        ];

        $this->assertTrue($this->validator->validate($this->credentials, $payload));
    }

    /**
     * Test that an unsupported hash algorithm causes an exception.
     */
    public function testUnsupportedHashAlgorithmThrowsException(): void
    {
        $this->expectException(InvalidPayloadException::class);
        $payload = [
            'kr-hash-algorithm' => 'unsupported_algo',
            'kr-answer'         => 'test/answer',
            'kr-hash-key'       => 'sha256_hmac',
            'kr-hash'           => 'dummy',
        ];
        $this->validator->validate($this->credentials, $payload);
    }

    /**
     * Test that a non-string "kr-answer" value causes an exception.
     */
    public function testInvalidKrAnswerTypeThrowsException(): void
    {
        $this->expectException(InvalidPayloadException::class);
        $payload = [
            'kr-hash-algorithm' => 'sha256_hmac',
            'kr-answer'         => 123, // Invalid type: integer instead of string
            'kr-hash-key'       => 'sha256_hmac',
            'kr-hash'           => 'dummy',
        ];
        $this->validator->validate($this->credentials, $payload);
    }

    /**
     * Test that a non-string "kr-hash" value causes an exception.
     */
    public function testInvalidKrHashTypeThrowsException(): void
    {
        $this->expectException(InvalidPayloadException::class);
        $payload = [
            'kr-hash-algorithm' => 'sha256_hmac',
            'kr-answer'         => 'test/answer',
            'kr-hash-key'       => 'sha256_hmac',
            'kr-hash'           => 456, // Invalid type: integer instead of string
        ];
        $this->validator->validate($this->credentials, $payload);
    }

    /**
     * Test that an invalid hash key type causes an exception.
     */
    public function testInvalidHashKeyTypeThrowsException(): void
    {
        $this->expectException(InvalidPayloadException::class);
        $payload = [
            'kr-hash-algorithm' => 'sha256_hmac',
            'kr-answer'         => 'test/answer',
            'kr-hash-key'       => 'invalid_key',
            'kr-hash'           => 'dummy',
        ];
        $this->validator->validate($this->credentials, $payload);
    }

    /**
     * Test that a payload with a mismatching hash value causes an exception.
     */
    public function testInvalidHashThrowsException(): void
    {
        $this->expectException(InvalidPayloadException::class);
        $krAnswer = 'test/answer';
        // Provide an incorrect hash.
        $wrongHash = 'invalidhash';
        $payload = [
            'kr-hash-algorithm' => 'sha256_hmac',
            'kr-answer'         => $krAnswer,
            'kr-hash-key'       => 'sha256_hmac',
            'kr-hash'           => $wrongHash,
        ];
        $this->validator->validate($this->credentials, $payload);
    }

    /**
     * Test that escaped forward slashes in "kr-answer" are normalized before hashing.
     */
    public function testKrAnswerNormalization(): void
    {
        $krAnswerWithEscapes = 'test\/answer';
        $normalizedAnswer = str_replace('\/', '/', $krAnswerWithEscapes);
        $expectedHash = hash_hmac('sha256', $normalizedAnswer, $this->credentials->getHmacKey());

        $payload = [
            'kr-hash-algorithm' => 'sha256_hmac',
            'kr-answer'         => $krAnswerWithEscapes,
            'kr-hash-key'       => 'sha256_hmac',
            'kr-hash'           => $expectedHash,
        ];

        $this->assertTrue($this->validator->validate($this->credentials, $payload));
    }
}
