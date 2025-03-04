<?php

declare(strict_types=1);

/*
 * This file is part of package ang3/php-psp-systempay
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ang3\Component\PSP\Systempay\Enum;

enum PaymentFormAction: string
{
    /**
     * PAYMENT: Creates a simple transaction. Default behavior.
     */
    case Payment = 'PAYMENT';

    /**
     * REGISTER_PAY: Creates an alias (token) for the payment method at the same time as the transaction.
     * Does not allow creating an alias associated with an IBAN.
     */
    case RegisterPay = 'REGISTER_PAY';

    /**
     * ASK_REGISTER_PAY: Adds a checkbox to the form for creating an alias (token).
     * Does not allow creating an alias associated with an IBAN.
     */
    case AskRegisterPay = 'ASK_REGISTER_PAY';

    /**
     * SILENT: Transaction initiated by the merchant without the presence of the buyer.
     * Performs a payment using an alias without using the embedded form.
     */
    case Silent = 'SILENT';

    /**
     * CUSTOMER_WALLET: Adds a checkbox to the form for associating the card with a wallet.
     * The customer.reference field is mandatory for this use case. Refer to the integration guide for more information.
     */
    case CustomerWallet = 'CUSTOMER_WALLET';
}
