<?php

declare(strict_types=1);

/*
 * This file is part of package ang3/php-psp-systempay-client
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ang3\Component\PSP\Systempay\Enum;

enum ApiResponseStatus: string
{
    /**
     * Indicates a successful API response.
     */
    case Success = 'SUCCESS';

    /**
     * Indicates an error in the API response.
     */
    case Error = 'ERROR';
}
