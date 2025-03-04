<?php

declare(strict_types=1);

/*
 * This file is part of package ang3/php-psp-systempay
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ang3\Component\PSP\Systempay\Response;

use Ang3\Component\PSP\Systempay\Enum\ApiResponseStatus;
use Ang3\Component\PSP\Systempay\Enum\Mode;

/**
 * Interface ApiResponseInterface.
 *
 * This interface defines the contract for Systempay API response objects.
 * It encapsulates all the essential data returned by the Systempay web service,
 * including version information, status, server date, application provider, and
 * the operational mode of the transaction.
 *
 * Implementations of this interface should provide access to:
 * - The name of the web service that generated the response.
 * - The API version and the version of the application used in the response.
 * - The status of the response, as represented by an ApiResponseStatus instance.
 * - The server date and time as provided by the Systempay server.
 * - The identifier of the application provider.
 * - The operational mode (if applicable), which could be null if not defined.
 * - Whether the transaction is in test mode.
 * - Whether the transaction was successful or has failed.
 *
 * This interface is a central part of the Systempay integration, ensuring that
 * all responses conform to a consistent structure that can be reliably handled
 * by the merchant's application.
 */
interface ApiResponseInterface
{
    /**
     * Returns the name of the web service that generated the response.
     *
     * @return string the web service name
     */
    public function getWebService(): string;

    /**
     * Returns the API version used in the response.
     *
     * @return string the API version
     */
    public function getVersion(): string;

    /**
     * Returns the version of the application that generated the response.
     *
     * @return string the application version
     */
    public function getApplicationVersion(): string;

    /**
     * Returns the status of the API response.
     *
     * @return ApiResponseStatus the response status
     */
    public function getStatus(): ApiResponseStatus;

    /**
     * Returns the server date and time provided by the Systempay server.
     *
     * @return \DateTimeInterface the server date and time
     */
    public function getServerDate(): \DateTimeInterface;

    /**
     * Returns the identifier of the application provider.
     *
     * @return string the application provider identifier
     */
    public function getApplicationProvider(): string;

    /**
     * Returns the operational mode of the transaction.
     *
     * This value may be null if the mode is not defined.
     *
     * @return Mode|null the operation mode
     */
    public function getMode(): ?Mode;

    /**
     * Indicates whether the transaction was processed in test mode.
     *
     * @return bool true if the transaction is in test mode, false otherwise
     */
    public function isTestMode(): bool;

    /**
     * Indicates whether the transaction was successful.
     *
     * @return bool true if the transaction is successful, false otherwise
     */
    public function isSuccessful(): bool;

    /**
     * Indicates whether the transaction has failed.
     *
     * @return bool true if the transaction has failed, false otherwise
     */
    public function isFailed(): bool;
}
