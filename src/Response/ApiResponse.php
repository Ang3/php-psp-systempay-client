<?php

declare(strict_types=1);

/*
 * This file is part of package ang3/php-psp-systempay
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ang3\Component\PSP\Systempay\Response;

use Ang3\Component\PSP\Systempay\Utils\Payload;

class ApiResponse extends AbstractApiResponse
{
    private Payload $answer;

    public function __construct(Payload $payload)
    {
        parent::__construct($payload);
        $this->answer = $payload->getPayload('answer');
    }

    public function getAnswer(): Payload
    {
        return $this->answer;
    }
}
