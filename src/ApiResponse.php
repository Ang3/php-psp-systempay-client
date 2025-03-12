<?php

declare(strict_types=1);

/*
 * This file is part of package ang3/php-psp-systempay-client
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ang3\Component\PSP\Systempay;

use Ang3\Component\PSP\Systempay\Enum\ApiResponseStatus;
use Ang3\Component\PSP\Systempay\Enum\Mode;

class ApiResponse
{
    private string $webService;
    private string $version;
    private string $applicationVersion;
    private ApiResponseStatus $status;

    /**
     * @var mixed[]
     */
    private array $answer;

    private \DateTimeInterface $serverDate;
    private string $applicationProvider;
    private ?Mode $mode;

    /**
     * @param array<string, mixed> $payload
     *
     * @throws \Exception on invalid payload
     */
    public function __construct(array $payload)
    {
        $getStringValue = static function (array $payload, string $property): string {
            $value = $payload[$property] ?? null;

            if (null === $value) {
                throw new \InvalidArgumentException(\sprintf('Missing value for property "%s".', $property));
            }

            if (!\is_string($value)) {
                throw new \InvalidArgumentException(\sprintf('Expected property "%s" of type "string", got "%s".', $property, \gettype($value)));
            }

            return $value;
        };

        $this->webService = $getStringValue($payload, 'webService');
        $this->version = $getStringValue($payload, 'version');
        $this->applicationVersion = $getStringValue($payload, 'applicationVersion');
        $this->status = ApiResponseStatus::from($getStringValue($payload, 'status'));
        $this->answer = (array) ($payload['answer'] ?? []);
        $this->serverDate = new \DateTime($getStringValue($payload, 'serverDate'));
        $this->applicationProvider = $getStringValue($payload, 'applicationProvider');
        $this->mode = !empty($payload['mode']) && \is_string($payload['mode']) ? Mode::tryFrom($payload['mode']) : null;
    }

    public function getWebService(): string
    {
        return $this->webService;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getApplicationVersion(): string
    {
        return $this->applicationVersion;
    }

    public function getStatus(): ApiResponseStatus
    {
        return $this->status;
    }

    /**
     * @return mixed[]
     */
    public function getAnswer(): array
    {
        return $this->answer;
    }

    public function getServerDate(): \DateTimeInterface
    {
        return $this->serverDate;
    }

    public function getApplicationProvider(): string
    {
        return $this->applicationProvider;
    }

    public function getMode(): ?Mode
    {
        return $this->mode;
    }

    public function isTestMode(): bool
    {
        return Mode::Test === $this->mode;
    }

    public function isSuccessful(): bool
    {
        return ApiResponseStatus::Success === $this->status;
    }

    public function isFailed(): bool
    {
        return ApiResponseStatus::Error === $this->status;
    }
}
