<?php

declare(strict_types=1);

/*
 * This file is part of package ang3/php-psp-systempay
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ang3\Component\PSP\Systempay\Enum;

enum ApiEndpoint: string
{
    // SDK TEST
    case SDKTest = 'Charge/SDKTest';

    // Payment endpoints
    case CreatePayment = 'Charge/CreatePayment';

    // Token endpoints
    case CreateToken = 'Charge/CreateToken';
    case GetToken = 'Token/Get';
    case CancelToken = 'Token/Cancel';

    // Subscription endpoints
    case CreateSubscription = 'Charge/CreateSubscription';
    case GetSubscription = 'Subscription/Get';
    case CancelSubscription = 'Subscription/Cancel';

    // Transaction endpoints
    case GetTransaction = 'Transaction/Get';
    case CancelOrRefundTransaction = 'Transaction/CancelOrRefund';
    case DuplicateTransaction = 'Transaction/Duplicate';

    // Order endpoints
    case GetOrder = 'Order/Get';
}
