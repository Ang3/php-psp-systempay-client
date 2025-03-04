<?php

declare(strict_types=1);

/*
 * This file is part of package ang3/php-psp-systempay
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ang3\Component\PSP\Systempay;

readonly class Credentials
{
    public function __construct(
        private int $username,
        private string $apiKey,
        private string $publicKey,
        private string $hmacKey
    ) {
    }

    public static function demo(): self
    {
        return new self(
            73239078,
            'testpassword_SbEbeOueaMDyg8Rtei1bSaiB5lms9V0ZDjzldGXGAnIwH',
            '73239078:testpublickey_Zr3fXIKKx0mLY9YNBQEan42ano2QsdrLuyb2W54QWmUJQ',
            'VgbDd550wI6W1rwODGy56QAUkUQwIEdwXG5ziDUUC72BS',
        );
    }

    public function getUsername(): int
    {
        return $this->username;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function getPublicKey(): string
    {
        return $this->publicKey;
    }

    public function getHmacKey(): string
    {
        return $this->hmacKey;
    }
}
