<?php

declare(strict_types=1);

/*
 * This file is part of package ang3/php-psp-systempay
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ang3\Component\PSP\Systempay;

use Ang3\Component\PSP\Systempay\Enum\HashAlgorithm;
use Ang3\Component\PSP\Systempay\Exception\InvalidPayloadException;

readonly class PayloadValidator
{
    /**
     * Validates the integrity and authenticity of the payload.
     *
     * This method verifies that the given payload contains all the required fields with the expected types
     * and that the hash included in the payload matches the hash calculated using the provided credentials.
     *
     * The validation process involves the following steps:
     *
     * 1. Validate the "kr-hash-algorithm" field:
     *    - Ensures the value is a string.
     *    - Attempts to create a HashAlgorithm instance using HashAlgorithm::tryFrom().
     *    - Throws an InvalidPayloadException if the algorithm is not supported.
     *
     * 2. Validate the "kr-answer" field:
     *    - Ensures the value is a string.
     *    - Normalizes the answer by replacing any escaped forward slashes ('\/') with regular slashes ('/').
     *
     * 3. Determine the key for HMAC calculation based on the "kr-hash-key" field:
     *    - If the value is 'sha256_hmac', uses the HMAC key from the provided Credentials.
     *    - If the value is 'password', uses the API key from the provided Credentials.
     *    - Throws an InvalidPayloadException if the hash key type is invalid.
     *
     * 4. Validate the "kr-hash" field:
     *    - Ensures the value is a string.
     *
     * 5. Calculate the HMAC hash (using SHA-256) of the normalized "kr-answer" using the selected key.
     *
     * 6. Compare the calculated hash with the provided "kr-hash":
     *    - Throws an InvalidPayloadException if the hashes do not match.
     *
     * @param Credentials          $credentials the credentials object containing keys for hash verification
     * @param array<string, mixed> $payload     The payload to validate, expected to contain:
     *                                          - "kr-hash-algorithm": string, the hash algorithm identifier.
     *                                          - "kr-answer": string, the data to hash.
     *                                          - "kr-hash-key": string, indicates which key to use ('sha256_hmac' or 'password').
     *                                          - "kr-hash": string, the expected hash value.
     *
     * @return bool returns true if the payload is valid
     *
     * @throws InvalidPayloadException if any required field is missing or of an incorrect type,
     *                                 if the hash algorithm or hash key type is not supported,
     *                                 or if the calculated hash does not match the provided hash
     */
    public function validate(Credentials $credentials, array $payload): bool
    {
        $hashAlgorithmValue = $payload['kr-hash-algorithm'] ?? null;
        if (!\is_string($hashAlgorithmValue)) {
            throw new InvalidPayloadException(\sprintf('Expected property "kr-hash-algorithm" of type "string", got "%s".', \gettype($hashAlgorithmValue)));
        }

        $hashAlgorithm = HashAlgorithm::tryFrom($hashAlgorithmValue);

        /* check if the hash algorithm is supported */
        if (!$hashAlgorithm) {
            throw new InvalidPayloadException(\sprintf('The algorithm "%s" is not supported.', $hashAlgorithmValue));
        }

        $krAnswerValue = $payload['kr-answer'] ?? null;
        if (!\is_string($krAnswerValue)) {
            throw new InvalidPayloadException(\sprintf('Expected property "kr-answer" of type "string", got "%s".', \gettype($krAnswerValue)));
        }

        /* on some servers, / can be escaped */
        $krAnswer = str_replace('\/', '/', $krAnswerValue);
        $hashKeyType = $payload['kr-hash-key'] ?? null;

        if (!\is_string($hashKeyType)) {
            throw new InvalidPayloadException(\sprintf('Expected property "kr-hash-key" of type "string", got "%s".', \gettype($hashKeyType)));
        }

        $key = match ($hashKeyType) {
            'sha256_hmac' => $credentials->getHmacKey(),
            'password' => $credentials->getApiKey(),
            default => throw new InvalidPayloadException(\sprintf('Invalid hash key type "%s".', $hashKeyType)),
        };

        $krHashValue = $payload['kr-hash'] ?? null;
        if (!\is_string($krHashValue)) {
            throw new InvalidPayloadException(\sprintf('Expected property "kr-hash" of type "string", got "%s".', \gettype($krHashValue)));
        }

        $calculatedHash = hash_hmac('sha256', $krAnswer, $key);

        if ($calculatedHash !== $krHashValue) {
            throw new InvalidPayloadException('Invalid hash.');
        }

        return true;
    }
}
