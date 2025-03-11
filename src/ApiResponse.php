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
use Ang3\Component\PSP\Systempay\Utils\Payload;

class ApiResponse
{
    private string $webService;
    private string $version;
    private string $applicationVersion;
    private ApiResponseStatus $status;
    private Payload $answer;
    private \DateTimeInterface $serverDate;
    private string $applicationProvider;
    private ?Mode $mode = null;

    /**
     * @throws \Exception on invalid payload
     */
    public function __construct(Payload $payload)
    {
        $this->webService = (string) $payload->getString('webService');
        $this->version = (string) $payload->getString('version');
        $this->applicationVersion = (string) $payload->getString('applicationVersion');
        $this->status = ApiResponseStatus::from((string) $payload->getString('status'));
        $this->answer = $payload->getPayload('answer');
        $this->serverDate = $payload->getDate('serverDate') ?: throw new \InvalidArgumentException('Missing server date property.');
        $this->applicationProvider = (string) $payload->getString('applicationProvider');
        $this->mode = Mode::tryFrom((string) $payload->getString('mode'));
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

    public function getAnswer(): Payload
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
