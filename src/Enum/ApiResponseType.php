<?php

declare(strict_types=1);

/*
 * This file is part of package ang3/php-psp-systempay
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ang3\Component\PSP\Systempay\Enum;

/**
 * @see https://paiement.systempay.fr/doc/en-EN/rest/V4.0/api/reference.html
 */
enum ApiResponseType: string
{
    case Response = 'V4/WebService/Response';
    case Error = 'V4/WebService/WebServiceError';
    case ResponseCode = 'V4/Common/ResponseCodeAnswer';
    case Authentication = 'V4/AuthenticationResponseData';
    case AuthenticationMessages = 'V4/AuthenticationMessagesResponse';
    case CustomerWallet = 'V4/CustomerWallet';
    case ChargePaymentForm = 'V4/Charge/PaymentForm';
    case Payment = 'V4/Payment';
    case PaymentOrder = 'V4/PaymentOrder';
    case Token = 'V4/Token';
    case Subscription = 'V4/Subscription';
    case SubscriptionCreated = 'V4/SubscriptionCreated';
    case OrderTransactions = 'V4/OrderTransactions';
    case Transaction = 'V4/Transaction';
}
