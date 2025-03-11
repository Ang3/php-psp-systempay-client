<?php

declare(strict_types=1);

/*
 * This file is part of package ang3/php-psp-systempay-client
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ang3\Component\PSP\Systempay\Enum;

enum Mode: string
{
    /**
     * Test order mode, used for test orders.
     */
    case Test = 'TEST';

    /**
     * Production order mode, used for real orders.
     */
    case Production = 'PRODUCTION';
}
