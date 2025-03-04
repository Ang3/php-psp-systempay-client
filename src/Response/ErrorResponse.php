<?php

declare(strict_types=1);

/*
 * This file is part of package ang3/php-psp-systempay
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ang3\Component\PSP\Systempay\Response;

use Ang3\Component\PSP\Systempay\Enum\ErrorCode;
use Ang3\Component\PSP\Systempay\Utils\Payload;

class ErrorResponse extends AbstractApiResponse
{
    /**
     * The error code.
     */
    private ErrorCode $errorCode;

    /**
     * The error message.
     */
    private ?string $errorMessage;

    /**
     * The detailed error code.
     */
    private ?string $detailedErrorCode;

    /**
     * The detailed error message.
     */
    private ?string $detailedErrorMessage;

    public function __construct(Payload $payload)
    {
        parent::__construct($payload);
        $this->errorCode = $payload->getEnum('answer.errorCode', ErrorCode::class) ?: throw new \InvalidArgumentException('Invalid value for property "answer.errorCode".');
        $this->errorMessage = $payload->getString('answer.errorMessage');
        $this->detailedErrorCode = $payload->getString('answer.detailedErrorCode');
        $this->detailedErrorMessage = $payload->getString('answer.detailedErrorMessage');
    }

    public function getErrorCode(): ErrorCode
    {
        return $this->errorCode;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public function getDetailedErrorCode(): ?string
    {
        return $this->detailedErrorCode;
    }

    public function getDetailedErrorMessage(): ?string
    {
        return $this->detailedErrorMessage;
    }
}
