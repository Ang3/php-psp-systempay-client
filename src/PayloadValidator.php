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
use Psr\Log\LoggerInterface;

readonly class PayloadValidator
{
    public function __construct(private ?LoggerInterface $logger = null)
    {
    }

    /**
     * Validates the integrity and authenticity of the payload.
     *
     * This method verifies that the provided payload contains the required fields with the expected types
     * and that the hash included in the payload matches the hash calculated using the provided credentials.
     *
     * The validation process includes the following steps:
     * 1. Retrieve and validate the "kr-hash-algorithm" from the payload.
     *    - If the value is not a string, an InvalidArgumentException is thrown.
     *    - The hash algorithm is then obtained via HashAlgorithm::from().
     *    - It checks whether the hash algorithm is one of the supported cases.
     *      If not supported, a warning is logged and the method returns false.
     *
     * 2. Retrieve and validate the "kr-answer" from the payload.
     *    - If "kr-answer" is not a string, an InvalidArgumentException is thrown.
     *    - Any escaped forward slashes in "kr-answer" (i.e. '\/') are replaced with normal slashes ('/').
     *
     * 3. Determine the hash key type from the "kr-hash-key" field:
     *    - If the value is "sha256_hmac", the HMAC key from the Credentials object is used.
     *    - If the value is "password", the API key from the Credentials object is used.
     *    - If the "kr-hash-key" is neither of these, a warning is logged and the method returns false.
     *
     * 4. Retrieve and validate the "kr-hash" from the payload.
     *    - If "kr-hash" is not a string, an InvalidArgumentException is thrown.
     *
     * 5. Calculate the HMAC hash (using SHA-256) of the normalized "kr-answer" using the selected key.
     *
     * 6. Compare the calculated hash with the hash provided in the "kr-hash" field.
     *    - The method returns true if they match, otherwise false.
     *
     * @param Credentials $credentials the credentials object containing the keys required for signature verification
     * @param mixed[]     $payload     an associative array representing the payload to validate
     *
     * @return bool Returns true if the payload is valid (i.e., the calculated hash matches the provided hash),
     *              or false if the validation fails.
     *
     * @throws \InvalidArgumentException if the payload does not contain a string for "kr-hash-algorithm",
     *                                   "kr-answer", or "kr-hash"
     */
    public function validate(Credentials $credentials, array $payload): bool
    {
        $hashAlgorithmValue = $payload['kr-hash-algorithm'] ?? null;
        if (!\is_string($hashAlgorithmValue)) {
            throw new \InvalidArgumentException(\sprintf('Expected property "kr-hash-algorithm" of type "string", got "%s".', \gettype($hashAlgorithmValue)));
        }

        $hashAlgorithm = HashAlgorithm::from($hashAlgorithmValue);

        /* check if the hash algorithm is supported */
        if (!\in_array($hashAlgorithm, HashAlgorithm::cases(), true)) {
            $this->logger?->warning('Not supported algorithm "{algorithm}".', [
                'algorithm' => $hashAlgorithm,
            ]);

            return false;
        }

        $krAnswerValue = $payload['kr-answer'] ?? null;
        if (!\is_string($krAnswerValue)) {
            throw new \InvalidArgumentException(\sprintf('Expected property "kr-answer" of type "string", got "%s".', \gettype($krAnswerValue)));
        }

        /* on some servers, / can be escaped */
        $krAnswer = str_replace('\/', '/', $krAnswerValue);

        switch ($hashKeyType = $payload['kr-hash-key'] ?? null) {
            case 'sha256_hmac':
                $key = $credentials->getHmacKey();
                break;
            case 'password':
                $key = $credentials->getApiKey();
                break;
            default:
                $this->logger?->warning('Invalid hash key type "{key_type}".', [
                    'key_type' => $hashKeyType,
                ]);

                return false;
        }

        $krHashValue = $payload['kr-hash'] ?? null;
        if (!\is_string($krHashValue)) {
            throw new \InvalidArgumentException(\sprintf('Expected property "kr-hash" of type "string", got "%s".', \gettype($krHashValue)));
        }

        $calculatedHash = hash_hmac('sha256', $krAnswer, $key);

        return $calculatedHash === $krHashValue;
    }
}
