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
 * Enumeration for payment sources.
 *
 * - EC: E-Commerce. The payment method data is entered by the buyer, enabling strong authentication during the payment.
 * - MOTO: Mail or Telephone Order. Data is entered by an operator; payment method information is transmitted via mail or email.
 *         Requires a VAD contract.
 * - CC: Call Center. Payment processed via a call center. Requires a VAD contract.
 * - OTHER: Other sales channel. Returned for payments made from the Merchant Back Office, file-based payments,
 *          recurring payments, or proximity payments.
 *
 * The default value is "EC" if absent or null.
 */
enum PaymentSource: string
{
    /**
     * E-Commerce: Payment method data is entered by the buyer, allowing for strong authentication.
     */
    case EC = 'EC';

    /**
     * Mail or Telephone Order: Data is entered by an operator; information is transmitted via mail or email.
     * Requires a VAD contract.
     */
    case MOTO = 'MOTO';

    /**
     * Call Center: Payment processed via a call center. Requires a VAD contract.
     */
    case CC = 'CC';

    /**
     * Other sales channel: Returned for payments made from the Merchant Back Office, file-based payments,
     * recurring payments, or proximity payments.
     */
    case OTHER = 'OTHER';
}
