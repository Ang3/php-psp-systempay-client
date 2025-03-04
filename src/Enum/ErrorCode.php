<?php

declare(strict_types=1);

/*
 * This file is part of package ang3/php-psp-systempay
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ang3\Component\PSP\Systempay\Enum;

enum ErrorCode: string
{
    // ACQ group (Acquirer errors)

    /** Payment declined. */
    case Acq001 = 'ACQ_001';

    /** Technical error. */
    case Acq999 = 'ACQ_999';

    // AUTH group (Authentication errors)

    /** Invalid ACS Signature. */
    case Auth100 = 'AUTH_100';

    /** Technical error 3DS. */
    case Auth101 = 'AUTH_101';

    /** Wrong Parameter 3DS. */
    case Auth102 = 'AUTH_102';

    /** 3DS Disabled. */
    case Auth103 = 'AUTH_103';

    /** 3DS operation timeout. */
    case Auth149 = 'AUTH_149';

    /** Technical error. */
    case Auth999 = 'AUTH_999';

    // CLIENT group (Client-side JavaScript errors)

    /** Payment declined. */
    case Client001 = 'CLIENT_001';

    /** Invalid public key. */
    case Client004 = 'CLIENT_004';

    /** formToken invalid. */
    case Client100 = 'CLIENT_100';

    /** Transaction abandoned. */
    case Client101 = 'CLIENT_101';

    /** Timeout exceeded. */
    case Client103 = 'CLIENT_103';

    /** Gateway error (50x). */
    case Client104 = 'CLIENT_104';

    /** Payment not finalized. */
    case Client105 = 'CLIENT_105';

    /** No button or form found. */
    case Client200 = 'CLIENT_200';

    /** Invalid data. */
    case Client300 = 'CLIENT_300';

    /** Invalid card number. */
    case Client301 = 'CLIENT_301';

    /** Invalid expiration date. */
    case Client302 = 'CLIENT_302';

    /** Invalid security code. */
    case Client303 = 'CLIENT_303';

    /** Required field not defined. */
    case Client304 = 'CLIENT_304';

    /** No formToken defined. */
    case Client305 = 'CLIENT_305';

    /** Please choose a type of identity document. */
    case Client306 = 'CLIENT_306';

    /** The identity document number is invalid. */
    case Client307 = 'CLIENT_307';

    /** Invalid cardholder name. */
    case Client308 = 'CLIENT_308';

    /** Invalid payment method. */
    case Client309 = 'CLIENT_309';

    /** Please select a card. */
    case Client311 = 'CLIENT_311';

    /** Card number required. */
    case Client321 = 'CLIENT_321';

    /** Expiration date required. */
    case Client322 = 'CLIENT_322';

    /** Security code required. */
    case Client323 = 'CLIENT_323';

    /** The identity document number is required. */
    case Client324 = 'CLIENT_324';

    /** Cardholder name required. */
    case Client325 = 'CLIENT_325';

    /** Email required. */
    case Client326 = 'CLIENT_326';

    /** No form button defined. */
    case Client500 = 'CLIENT_500';

    /** The parameter kr-public-key is empty or missing. */
    case Client501 = 'CLIENT_501';

    /** Payment already made (browser back button not supported). */
    case Client502 = 'CLIENT_502';

    /** The selected payment method is not available. */
    case Client503 = 'CLIENT_503';

    /** No card available with this filter. */
    case Client504 = 'CLIENT_504';

    /** SmartForm is not supported with the current theme. */
    case Client505 = 'CLIENT_505';

    /** Browser not supported with the current theme. */
    case Client506 = 'CLIENT_506';

    /** Pages including Apple Pay must use HTTPS. */
    case Client507 = 'CLIENT_507';

    /** Card payment is not available. */
    case Client508 = 'CLIENT_508';

    /** KR.openSelectedPaymentMethod() is only available with SmartForm. */
    case Client509 = 'CLIENT_509';

    /** The provided URL is invalid. */
    case Client510 = 'CLIENT_510';

    /** Merchant callback error. */
    case Client511 = 'CLIENT_511';

    /** formToken invalid. */
    case Client512 = 'CLIENT_512';

    /** Invalid response format. */
    case Client513 = 'CLIENT_513';

    /** Apple Pay must be activated following a user action. */
    case Client600 = 'CLIENT_600';

    /** Please select a payment method. */
    case Client601 = 'CLIENT_601';

    /** kr-style ignored because kr-theme is defined. */
    case Client702 = 'CLIENT_702';

    /** You must load Font Awesome in the HEAD section. */
    case Client704 = 'CLIENT_704';

    /** viewport not defined. */
    case Client705 = 'CLIENT_705';

    /** Content removed when calling KR.addForm(). */
    case Client706 = 'CLIENT_706';

    /** Parameters kr-get-url-success and kr-post-url-success cannot be defined simultaneously. */
    case Client707 = 'CLIENT_707';

    /** Parameters kr-get-url-refused and kr-post-url-refused cannot be defined simultaneously. */
    case Client708 = 'CLIENT_708';

    /** The container must not have the class 'kr-embedded'. */
    case Client709 = 'CLIENT_709';

    /** The field 'kr-form-token' was ignored because 'formToken' is already provided. */
    case Client710 = 'CLIENT_710';

    /** Application launched locally; must be run from a server with an HTTP/HTTPS URL. */
    case Client711 = 'CLIENT_711';

    /** Cannot use kr-embedded and kr-popin arguments simultaneously. */
    case Client712 = 'CLIENT_712';

    /** Invalid form configuration. */
    case Client713 = 'CLIENT_713';

    /** The property %property% is not configurable. */
    case Client714 = 'CLIENT_714';

    /** Error in KR.renderElements. */
    case Client715 = 'CLIENT_715';

    /** The element must have exactly one of the classes: 'kr-embedded', 'kr-smart-form', 'kr-smart-button'. */
    case Client716 = 'CLIENT_716';

    /** Multiple .kr-embedded elements detected; only the first will be rendered. */
    case Client717 = 'CLIENT_717';

    /** Multiple .kr-smart-form elements detected; only the first will be rendered. */
    case Client718 = 'CLIENT_718';

    /** KR.renderElements accepts only 0 or 1 parameter. */
    case Client719 = 'CLIENT_719';

    /** Payment form blocked due to error PSP_099. */
    case Client800 = 'CLIENT_800';

    /** JavaScript error. */
    case Client993 = 'CLIENT_993';

    /** Update %browser%; your version is outdated. */
    case Client994 = 'CLIENT_994';

    /** JavaScript error (PASS). */
    case Client995 = 'CLIENT_995';

    /** Operation not allowed. */
    case Client996 = 'CLIENT_996';

    /** Endpoint configuration error. */
    case Client997 = 'CLIENT_997';

    /** Demo formToken used; payment disabled. */
    case Client998 = 'CLIENT_998';

    /** Technical error. */
    case Client999 = 'CLIENT_999';

    // INT group (Integration errors - merchant side)

    /** Invalid input parameter. */
    case Int001 = 'INT_001';

    /** Invalid parameter manualValidation. */
    case Int005 = 'INT_005';

    /** Invalid parameter captureDelay or expectedCaptureDate. */
    case Int006 = 'INT_006';

    /** Invalid parameter amount. */
    case Int009 = 'INT_009';

    /** Invalid parameter currency. */
    case Int010 = 'INT_010';

    /** Invalid parameter customer.language. */
    case Int012 = 'INT_012';

    /** Invalid parameter orderId. */
    case Int013 = 'INT_013';

    /** Invalid parameter ianTargetUrl. */
    case Int014 = 'INT_014';

    /** Invalid parameter customer.email. */
    case Int015 = 'INT_015';

    /** Invalid parameter customer.reference. */
    case Int016 = 'INT_016';

    /** Invalid parameter customer.billingDetails.title. */
    case Int017 = 'INT_017';

    /** Invalid parameter customer.billingDetails.address. */
    case Int019 = 'INT_019';

    /** Invalid parameter customer.billingDetails.zipCode. */
    case Int020 = 'INT_020';

    /** Invalid parameter customer.billingDetails.city. */
    case Int021 = 'INT_021';

    /** Invalid parameter customer.billingDetails.country. */
    case Int022 = 'INT_022';

    /** Invalid parameter customer.billingDetails.phoneNumber. */
    case Int023 = 'INT_023';

    /** Invalid parameter subMerchantDetails.phoneNumber. */
    case Int024 = 'INT_024';

    /** Invalid parameter paymentMethodToken. */
    case Int030 = 'INT_030';

    /** Invalid parameter contrib. */
    case Int031 = 'INT_031';

    /** Invalid parameter pan. */
    case Int040 = 'INT_040';

    /** Invalid parameter expiryMonth. */
    case Int041 = 'INT_041';

    /** Invalid parameter expiryYear. */
    case Int042 = 'INT_042';

    /** Invalid parameter securityCode. */
    case Int043 = 'INT_043';

    /** Invalid network. */
    case Int044 = 'INT_044';

    /** Invalid expiration date. */
    case Int045 = 'INT_045';

    /** Invalid parameter networkTokenReference. */
    case Int046 = 'INT_046';

    /** Invalid parameter strongAuthentication. */
    case Int050 = 'INT_050';

    /** Invalid parameter allowDCFAmountUpdate. */
    case Int051 = 'INT_051';

    /** Invalid parameter paymentSource. */
    case Int060 = 'INT_060';

    /** Invalid parameter mid. */
    case Int062 = 'INT_062';

    /** Invalid parameter rrule. */
    case Int064 = 'INT_064';

    /** Invalid parameter initialAmount. */
    case Int066 = 'INT_066';

    /** Invalid parameter initialAmountNumber. */
    case Int068 = 'INT_068';

    /** Invalid parameter effectDate. */
    case Int069 = 'INT_069';

    /** Invalid parameter customer.shippingDetails.cellPhoneNumber. */
    case Int077 = 'INT_077';

    /** Invalid parameter customer.shippingDetails.address. */
    case Int081 = 'INT_081';

    /** Invalid parameter customer.shippingDetails.address2. */
    case Int082 = 'INT_082';

    /** Invalid parameter customer.shippingDetails.city. */
    case Int083 = 'INT_083';

    /** Invalid parameter customer.shippingDetails.state. */
    case Int084 = 'INT_084';

    /** Invalid parameter customer.shippingDetails.zipCode. */
    case Int085 = 'INT_085';

    /** Invalid parameter customer.shippingDetails.country. */
    case Int086 = 'INT_086';

    /** Invalid parameter customer.shippingDetails.address2. */
    case Int087 = 'INT_087';

    /** Invalid parameter customer.billingDetails.state. */
    case Int088 = 'INT_088';

    /** Invalid parameter metadata. */
    case Int091 = 'INT_091';

    /** Invalid parameter customer.billingDetails.category. */
    case Int092 = 'INT_092';

    /** Invalid parameter customer.shippingDetails.category. */
    case Int093 = 'INT_093';

    /** Invalid parameter customer.shippingDetails.shippingMethod. */
    case Int094 = 'INT_094';

    /** Invalid parameter customer.shippingDetails.shippingSpeed. */
    case Int095 = 'INT_095';

    /** Invalid parameter customer.shippingDetails.deliveryCompanyName. */
    case Int096 = 'INT_096';

    /** Invalid parameter cartItemInfo.productLabel. */
    case Int097 = 'INT_097';

    /** Invalid parameter cartItemInfo.productType. */
    case Int098 = 'INT_098';

    /** Invalid parameter cartItemInfo.productRef. */
    case Int100 = 'INT_100';

    /** Invalid parameter cartItemInfo.productQty. */
    case Int101 = 'INT_101';

    /** Invalid parameter cartItemInfo.productAmount. */
    case Int102 = 'INT_102';

    /** Invalid parameter customer.billingDetails.firstName. */
    case Int104 = 'INT_104';

    /** Invalid parameter customer.billingDetails.lastName. */
    case Int105 = 'INT_105';

    /** Invalid parameter customer.shippingDetails.firstName. */
    case Int106 = 'INT_106';

    /** Invalid parameter customer.shippingDetails.lastName. */
    case Int107 = 'INT_107';

    /** Invalid parameter customer.shoppingCart.taxAmount. */
    case Int108 = 'INT_108';

    /** Invalid parameter customer.shoppingCart.shippingAmount. */
    case Int109 = 'INT_109';

    /** Invalid parameter customer.shoppingCart.insuranceAmount. */
    case Int110 = 'INT_110';

    /** Invalid parameter customer.billingDetails.streetNumber. */
    case Int112 = 'INT_112';

    /** Invalid parameter customer.billingDetails.district. */
    case Int113 = 'INT_113';

    /** Invalid parameter customer.shippingDetails.streetNumber. */
    case Int114 = 'INT_114';

    /** Invalid parameter customer.shippingDetails.district. */
    case Int115 = 'INT_115';

    /** Invalid parameter customer.billingDetails.legalName. */
    case Int121 = 'INT_121';

    /** Invalid parameter customer.billingDetails.identityCode. */
    case Int124 = 'INT_124';

    /** Invalid parameter customer.shippingDetails.legalName. */
    case Int125 = 'INT_125';

    /** Invalid parameter acquirerTransientData. */
    case Int130 = 'INT_130';

    /** Invalid parameter overridePaymentCinematic. */
    case Int131 = 'INT_131';

    /** Invalid parameter cartItemInfo.productVat. */
    case Int203 = 'INT_203';

    /** Invalid parameter greyListType. */
    case Int204 = 'INT_204';

    /** Only one parameter must be provided: uuid, greylistType or value. */
    case Int205 = 'INT_205';

    /** Invalid payload type (e.g. for Apple Pay). */
    case Int793 = 'INT_793';

    /** Invalid parameter redirectSuccessTimeout. */
    case Int794 = 'INT_794';

    /** Invalid parameter redirectErrorTimeout. */
    case Int795 = 'INT_795';

    /** Invalid SDK interface. */
    case Int796 = 'INT_796';

    /** Invalid SDK user interface type. */
    case Int797 = 'INT_797';

    /** Invalid SDK application ID. */
    case Int798 = 'INT_798';

    /** Invalid SDK encoded data. */
    case Int799 = 'INT_799';

    /** Invalid ephemeral public key from SDK. */
    case Int800 = 'INT_800';

    /** Invalid maximum expiration delay for SDK. */
    case Int801 = 'INT_801';

    /** Invalid SDK reference number. */
    case Int802 = 'INT_802';

    /** Invalid SDK transaction ID. */
    case Int803 = 'INT_803';

    /** Invalid use case. */
    case Int804 = 'INT_804';

    /** Invalid cancellation date. */
    case Int805 = 'INT_805';

    /** Invalid billing identity type. */
    case Int806 = 'INT_806';

    /** Invalid payload. */
    case Int807 = 'INT_807';

    /** Invalid parameter challengePreference. */
    case Int808 = 'INT_808';

    /** Invalid parameter IvrPaymentOrderId. */
    case Int809 = 'INT_809';

    /** Token SDD payment not allowed in interactive mode. */
    case Int810 = 'INT_810';

    /** Email required when formAction is REGISTER, REGISTER_PAY, ASK_REGISTER_PAY, REGISTER_UPDATE or REGISTER_UPDATE_PAY. */
    case Int811 = 'INT_811';

    /** paymentMethodToken required when formAction is REGISTER_UPDATE or REGISTER_UPDATE_PAY. */
    case Int812 = 'INT_812';

    /** Duplicate taxAmount entries must have matching values. */
    case Int813 = 'INT_813';

    /** Parameter currency not allowed if refunding or canceling a Planet DCC transaction. */
    case Int814 = 'INT_814';

    /** Description too long. */
    case Int815 = 'INT_815';

    /** Id parameter required when charge/Authenticate request contains an instructionResult object. */
    case Int816 = 'INT_816';

    /** x-shop-id header required for supplier authentication. */
    case Int817 = 'INT_817';

    /** Source IP address not authorized for this supplier. */
    case Int818 = 'INT_818';

    /** Shop identifier not associated with this supplier. */
    case Int819 = 'INT_819';

    /** This alias does not belong to this client. */
    case Int820 = 'INT_820';

    /** Email required for payment method verification. */
    case Int821 = 'INT_821';

    /** Unauthorized domain. */
    case Int822 = 'INT_822';

    /** Invalid parameter operationSessionId. */
    case Int823 = 'INT_823';

    /** Invalid instructionResult object. */
    case Int824 = 'INT_824';

    /** Invalid device object. */
    case Int825 = 'INT_825';

    /** Invalid parameter device.timeZoneOffset. */
    case Int826 = 'INT_826';

    /** Invalid parameter device.screenWidth. */
    case Int827 = 'INT_827';

    /** Invalid parameter device.screenHeight. */
    case Int828 = 'INT_828';

    /** Invalid parameter device.colorDepth. */
    case Int829 = 'INT_829';

    /** Invalid parameter device.language. */
    case Int830 = 'INT_830';

    /** Invalid parameter device.javaEnabled. */
    case Int831 = 'INT_831';

    /** Invalid parameter device.ip. */
    case Int832 = 'INT_832';

    /** Invalid parameter device.userAgent. */
    case Int833 = 'INT_833';

    /** Invalid parameter device.acceptHeader. */
    case Int834 = 'INT_834';

    /** Invalid parameter device.deviceType. */
    case Int835 = 'INT_835';

    /** SMSOptions object is missing. */
    case Int836 = 'INT_836';

    /** Parameter channelOptions.whatsAppOptions.phoneNumber is missing. */
    case Int837 = 'INT_837';

    /** Invalid parameter channelOptions.smsOptions.phoneNumber. */
    case Int838 = 'INT_838';

    /** whatsAppOptions object is missing. */
    case Int839 = 'INT_839';

    /** Invalid parameter paymentOrderId. */
    case Int840 = 'INT_840';

    /** mailOptions object is missing. */
    case Int841 = 'INT_841';

    /** Invalid message. */
    case Int842 = 'INT_842';

    /** Invalid subject. */
    case Int843 = 'INT_843';

    /** Invalid Web Service user. */
    case Int844 = 'INT_844';

    /** Invalid template. */
    case Int845 = 'INT_845';

    /** Unable to find parameters NetworkPreference and AuthentificationNetworks. */
    case Int846 = 'INT_846';

    /** Contract number (MID) not defined. */
    case Int847 = 'INT_847';

    /** Parameter networkTokenReference not defined. */
    case Int848 = 'INT_848';

    /** Invalid parameter userDetails. */
    case Int849 = 'INT_849';

    /** Parameter channelOptions.mailOptions.recipient is missing. */
    case Int850 = 'INT_850';

    /** Invalid parameter paymentReceiptEmail. */
    case Int851 = 'INT_851';

    /** Invalid parameter expandedData. */
    case Int852 = 'INT_852';

    /** Invalid parameter useDataCollectionForm. */
    case Int853 = 'INT_853';

    /** Invalid parameter channel. */
    case Int854 = 'INT_854';

    /** Invalid parameter expirationDateTime. */
    case Int855 = 'INT_855';

    /** Invalid parameter locale. */
    case Int856 = 'INT_856';

    /** Invalid parameter pretaxAmount. */
    case Int857 = 'INT_857';

    /** Invalid parameter taxRate. */
    case Int858 = 'INT_858';

    /** Invalid parameter languageFallback. */
    case Int859 = 'INT_859';

    /** Invalid parameter captureDelay. */
    case Int860 = 'INT_860';

    /** Parameter eligibleAmount not allowed when paying via embedded form. */
    case Int865 = 'INT_865';

    /** Track1 is required when paymentEntry is CARD_PRESENT. */
    case Int866 = 'INT_866';

    /** Track2 is required when paymentEntry is CARD_PRESENT. */
    case Int867 = 'INT_867';

    /** Tax amount greater than amount. */
    case Int868 = 'INT_868';

    /** Invalid parameter taxAmount. */
    case Int869 = 'INT_869';

    /** Invalid parameter cardHolderName. */
    case Int870 = 'INT_870';

    /** Invalid parameter identityDocumentNumber. */
    case Int871 = 'INT_871';

    /** Invalid parameter identityDocumentType. */
    case Int872 = 'INT_872';

    /** Invalid parameter fingerPrintId. */
    case Int873 = 'INT_873';

    /** Parameter paymentMethodType not defined. */
    case Int874 = 'INT_874';

    /** Invalid parameter formAction. */
    case Int875 = 'INT_875';

    /** Invalid parameter payload. */
    case Int876 = 'INT_876';

    /** Invalid parameter customer.shippingDetails.identityCode. */
    case Int877 = 'INT_877';

    /** Invalid parameter commission. */
    case Int878 = 'INT_878';

    /** Invalid parameter PAN (card number). */
    case Int879 = 'INT_879';

    /** initialAmount and initialAmountNumber must be defined. */
    case Int880 = 'INT_880';

    /** Invalid payment methods. */
    case Int881 = 'INT_881';

    /** Invalid parameter description. */
    case Int883 = 'INT_883';

    /** Invalid parameter formToken. */
    case Int885 = 'INT_885';

    /** Invalid parameter debitCreditSelector. */
    case Int886 = 'INT_886';

    /** Invalid parameter brand. */
    case Int887 = 'INT_887';

    /** Invalid parameter paymentMethodType. */
    case Int892 = 'INT_892';

    /** Invalid parameter firstInstallmentDelay. */
    case Int893 = 'INT_893';

    /** Invalid parameter installmentNumber. */
    case Int895 = 'INT_895';

    /** Parameter not supported for subscription. */
    case Int896 = 'INT_896';

    /** Invalid parameter subscriptionId. */
    case Int897 = 'INT_897';

    /** Invalid parameter comment. */
    case Int898 = 'INT_898';

    /** Invalid parameter retry. */
    case Int899 = 'INT_899';

    /** The parameter does not exist. */
    case Int900 = 'INT_900';

    /** Web Service not found. */
    case Int901 = 'INT_901';

    /** One of the parameters sent to the Web Service is invalid. */
    case Int902 = 'INT_902';

    /** formToken not found or expired. */
    case Int903 = 'INT_903';

    /** Invalid public key. */
    case Int904 = 'INT_904';

    /** Invalid username or password. */
    case Int905 = 'INT_905';

    /** Invalid parameter formToken. */
    case Int906 = 'INT_906';

    /** Alias creation not enabled for this payment method. */
    case Int910 = 'INT_910';

    /** Public key does not match formToken. */
    case Int911 = 'INT_911';

    /** Password does not match the transaction. */
    case Int912 = 'INT_912';

    /** Allowed only for PCI-DSS merchants. */
    case Int913 = 'INT_913';

    /** Maximum message size reached. */
    case Int914 = 'INT_914';

    /** Merchant site returned HTTP 405 Method Not Allowed. */
    case Int915 = 'INT_915';

    /** Using CUSTOMER_WALLET requires an offer with "Payment by alias" option. */
    case Int916 = 'INT_916';

    /** Buyer reference required when formAction is CUSTOMER_WALLET. */
    case Int917 = 'INT_917';

    /** Disabling 3DS requires the "SELECT_3DS" function. */
    case Int918 = 'INT_918';

    /** authenticationDetails.exemption required for frictionless authentication. */
    case Int919 = 'INT_919';

    /** Invalid parameter returnUrl. */
    case Int920 = 'INT_920';

    /** Invalid parameter cancelUrl. */
    case Int921 = 'INT_921';

    /** Invalid parameter successUrl. */
    case Int922 = 'INT_922';

    /** Invalid parameter refusedUrl. */
    case Int923 = 'INT_923';

    /** Invalid parameter errorUrl. */
    case Int924 = 'INT_924';

    /** Invalid parameter postWalletUrl. */
    case Int925 = 'INT_925';

    /** Invalid parameter ipnTargetUrl. */
    case Int926 = 'INT_926';

    /** Invalid parameter returnMode. */
    case Int927 = 'INT_927';

    /** Invalid parameter installmentOptions.firstAmount. */
    case Int928 = 'INT_928';

    /** Invalid parameter installmentOptions.count. */
    case Int929 = 'INT_929';

    /** Invalid parameter installmentOptions.period. */
    case Int930 = 'INT_930';

    /** Invalid parameter installmentOptions.schedules[]. */
    case Int931 = 'INT_931';

    /** Invalid parameter installmentOptions.schedules[date]. */
    case Int932 = 'INT_932';

    /** Invalid parameter installmentOptions.schedules[amount]. */
    case Int933 = 'INT_933';

    /** Network protocol cannot be null or empty if TIMEOUT on instructionResult. */
    case Int934 = 'INT_934';

    /** Invalid parameter operationSessionId. */
    case Int935 = 'INT_935';

    /** Parameter channelOptions.urlOptions.qrCodeSize is invalid. */
    case Int936 = 'INT_936';

    /** paymentSource value incompatible with useCase. */
    case Int937 = 'INT_937';

    /** Order reference is required. */
    case Int942 = 'INT_942';

    /** Value in useCase requires missing functional data. */
    case Int943 = 'INT_943';

    /** Issue combining simple and advanced installment plan fields. */
    case Int945 = 'INT_945';

    // PSP group (PSP errors)

    /** Action not allowed. */
    case Psp001 = 'PSP_001';

    /** Invalid attribute. */
    case Psp002 = 'PSP_002';

    /** Payment declined. */
    case Psp003 = 'PSP_003';

    /** Transaction not found. */
    case Psp010 = 'PSP_010';

    /** Incorrect transaction status. */
    case Psp011 = 'PSP_011';

    /** Transaction already exists. */
    case Psp012 = 'PSP_012';

    /** Date too far from current date. */
    case Psp013 = 'PSP_013';

    /** No change. */
    case Psp014 = 'PSP_014';

    /** Too many results. */
    case Psp015 = 'PSP_015';

    /** Duplication forbidden. */
    case Psp016 = 'PSP_016';

    /** Invalid amount. */
    case Psp020 = 'PSP_020';

    /** Unknown currency. */
    case Psp021 = 'PSP_021';

    /** Unknown card type. */
    case Psp022 = 'PSP_022';

    /** Invalid expiration date. */
    case Psp023 = 'PSP_023';

    /** CVV is required. */
    case Psp024 = 'PSP_024';

    /** Unknown contract (MID). */
    case Psp025 = 'PSP_025';

    /** Invalid card number (PAN). */
    case Psp026 = 'PSP_026';

    /** No contract found with provided tid and mid. */
    case Psp027 = 'PSP_027';

    /** Alias not found. */
    case Psp030 = 'PSP_030';

    /** Alias is invalid. */
    case Psp031 = 'PSP_031';

    /** subscriptionId attribute not found. */
    case Psp032 = 'PSP_032';

    /** Invalid rrule attribute or subscription already cancelled. */
    case Psp033 = 'PSP_033';

    /** Alias already exists. */
    case Psp034 = 'PSP_034';

    /** Alias creation declined. */
    case Psp035 = 'PSP_035';

    /** paymentMethodToken attribute purged. */
    case Psp036 = 'PSP_036';

    /** amount attribute not allowed. */
    case Psp040 = 'PSP_040';

    /** Card range not found. */
    case Psp041 = 'PSP_041';

    /** Insufficient balance. */
    case Psp042 = 'PSP_042';

    /** Refund not allowed for this contract. */
    case Psp043 = 'PSP_043';

    /** No localized brand. */
    case Psp050 = 'PSP_050';

    /** Merchant not enrolled. */
    case Psp051 = 'PSP_051';

    /** Invalid ACS signature. */
    case Psp052 = 'PSP_052';

    /** Technical error 3DS. */
    case Psp053 = 'PSP_053';

    /** Incorrect 3DS parameter. */
    case Psp054 = 'PSP_054';

    /** 3DS disabled. */
    case Psp055 = 'PSP_055';

    /** Card number (PAN) not found. */
    case Psp056 = 'PSP_056';

    /** Specific data for acquirer invalid. */
    case Psp057 = 'PSP_057';

    /** Cancellation impossible; try refund. */
    case Psp075 = 'PSP_075';

    /** Refund operation not yet available; try cancel. */
    case Psp076 = 'PSP_076';

    /** Refund not allowed on MAESTRO card by acquirer Redeban. */
    case Psp077 = 'PSP_077';

    /** Refund not allowed on AMEX card by acquirer Credibanco. */
    case Psp078 = 'PSP_078';

    /** Refund not allowed on Diners card by acquirer Redeban. */
    case Psp079 = 'PSP_079';

    /** Refund not allowed: transaction not in CNAB/Remessa file. */
    case Psp080 = 'PSP_080';

    /** Manual capture not supported on this network. */
    case Psp081 = 'PSP_081';

    /** Credit not allowed on this type of transaction. */
    case Psp082 = 'PSP_082';

    /** Refund impossible on an unpaid transaction. */
    case Psp083 = 'PSP_083';

    /** Eligible amount cannot be negative. */
    case Psp085 = 'PSP_085';

    /** EligibleAmount cannot exceed transaction amount. */
    case Psp086 = 'PSP_086';

    /** Eligible amount missing. */
    case Psp087 = 'PSP_087';

    /** Eligible amount greater than order amount. */
    case Psp088 = 'PSP_088';

    /** Incomplete payment sequence. */
    case Psp089 = 'PSP_089';

    /** Refund not allowed. */
    case Psp090 = 'PSP_090';

    /** Payment method declined. */
    case Psp091 = 'PSP_091';

    /** Unable to cancel the transaction. */
    case Psp092 = 'PSP_092';

    /** Unable to refund the transaction. */
    case Psp093 = 'PSP_093';

    /** Oney Web Service error. */
    case Psp097 = 'PSP_097';

    /** Invalid RequestId attribute. */
    case Psp098 = 'PSP_098';

    /** Too many attempts. */
    case Psp099 = 'PSP_099';

    /** REST API not enabled. */
    case Psp100 = 'PSP_100';

    /** Transaction cannot be refunded. */
    case Psp101 = 'PSP_101';

    /** Transaction cannot be cancelled. */
    case Psp102 = 'PSP_102';

    /** Amount cannot be defined in current context. */
    case Psp103 = 'PSP_103';

    /** Transaction already refunded. */
    case Psp104 = 'PSP_104';

    /** Transaction already cancelled. */
    case Psp105 = 'PSP_105';

    /** API call limit exceeded. */
    case Psp106 = 'PSP_106';

    /** Card registration not enabled. */
    case Psp107 = 'PSP_107';

    /** Payment form expired. */
    case Psp108 = 'PSP_108';

    /** Store production mode not enabled. */
    case Psp109 = 'PSP_109';

    /** Transaction cannot be updated. */
    case Psp110 = 'PSP_110';

    /** No payment application found. */
    case Psp111 = 'PSP_111';

    /** Refund impossible: payment method expired. */
    case Psp112 = 'PSP_112';

    /** Duplicate submission. */
    case Psp113 = 'PSP_113';

    /** Split payment not enabled. */
    case Psp114 = 'PSP_114';

    /** No payment method defined. */
    case Psp115 = 'PSP_115';

    /** Suppliers not authorized to use this Web Service. */
    case Psp116 = 'PSP_116';

    /** Supplier right not enabled. */
    case Psp117 = 'PSP_117';

    /** 3D Secure session expired. */
    case Psp136 = 'PSP_136';

    /** Not enough digits to detect the type. */
    case Psp200 = 'PSP_200';

    /** Payment method is not a card. */
    case Psp201 = 'PSP_201';

    /** Payment method expired. */
    case Psp202 = 'PSP_202';

    /** Error during greylist addition. */
    case Psp203 = 'PSP_203';

    /** Error during greylist data verification. */
    case Psp204 = 'PSP_204';

    /** Data already present in greylist. */
    case Psp205 = 'PSP_205';

    /** Error decrypting card number. */
    case Psp206 = 'PSP_206';

    /** Duplication of verification transaction forbidden. */
    case Psp210 = 'PSP_210';

    /** Unable to create a formToken. */
    case Psp223 = 'PSP_223';

    /** No transaction found for the requested payment method. */
    case Psp224 = 'PSP_224';

    /** Error initializing the payment method. */
    case Psp225 = 'PSP_225';

    /** Unknown technical error creating a shipping transaction. */
    case Psp227 = 'PSP_227';

    /** Shipping transaction created but unable to generate a response. */
    case Psp228 = 'PSP_228';

    /** Unable to create a shipping transaction. */
    case Psp229 = 'PSP_229';

    /** An initial shipping payment transaction cannot be modified. */
    case Psp231 = 'PSP_231';

    /** A shipping transaction cannot be duplicated. */
    case Psp236 = 'PSP_236';

    /** Provided MCC is not valid; must be four digits. */
    case Psp237 = 'PSP_237';

    /** Authentication session identifier not found. */
    case Psp301 = 'PSP_301';

    /** Authentication session result not found. */
    case Psp302 = 'PSP_302';

    /** Unable to launch an authentication request. */
    case Psp303 = 'PSP_303';

    /** Unable to serialize the authentication request. */
    case Psp304 = 'PSP_304';

    /** Technical error for authentication request result. */
    case Psp305 = 'PSP_305';

    /** Technical error processing the authentication request. */
    case Psp306 = 'PSP_306';

    /** Technical error deserializing the authentication request. */
    case Psp307 = 'PSP_307';

    /** No transaction creation. */
    case Psp401 = 'PSP_401';

    /** Channel function not enabled. */
    case Psp500 = 'PSP_500';

    /** No transaction information. */
    case Psp501 = 'PSP_501';

    /** Transaction not found. */
    case Psp502 = 'PSP_502';

    /** Action not allowed on a transaction with status {0}. */
    case Psp503 = 'PSP_503';

    /** This transaction is not allowed in this context. */
    case Psp504 = 'PSP_504';

    /** Transaction already exists. */
    case Psp505 = 'PSP_505';

    /** Invalid transaction amount. */
    case Psp506 = 'PSP_506';

    /** This action is no longer possible for a transaction created on this date. */
    case Psp507 = 'PSP_507';

    /** The card's expiration date does not allow this action. */
    case Psp508 = 'PSP_508';

    /** CVV required. */
    case Psp509 = 'PSP_509';

    /** Refund amount is greater than the initial amount. */
    case Psp510 = 'PSP_510';

    /** Sum of refunds exceeds the initial amount. */
    case Psp511 = 'PSP_511';

    /** Duplication of a credit (refund) not allowed. */
    case Psp512 = 'PSP_512';

    /** Due to a technical incident, unable to process your request. */
    case Psp513 = 'PSP_513';

    /** Due to a technical incident, unable to process your request. */
    case Psp514 = 'PSP_514';

    /** Due to a technical incident, unable to process your request. */
    case Psp515 = 'PSP_515';

    /** Due to a technical incident, unable to process your request. */
    case Psp516 = 'PSP_516';

    /** Aurore contract teleparametering failed. */
    case Psp517 = 'PSP_517';

    /** Analysis of the Cetelem response failed. */
    case Psp518 = 'PSP_518';

    /** Unknown currency. */
    case Psp519 = 'PSP_519';

    /** Invalid card type. */
    case Psp520 = 'PSP_520';

    /** No contract found for this payment. */
    case Psp521 = 'PSP_521';

    /** Store not found. */
    case Psp522 = 'PSP_522';

    /** Ambiguous contract. */
    case Psp523 = 'PSP_523';

    /** Invalid contract. */
    case Psp524 = 'PSP_524';

    /** Due to a technical incident, unable to process your request. */
    case Psp525 = 'PSP_525';

    /** Invalid card number. */
    case Psp526 = 'PSP_526';

    /** Invalid card number. */
    case Psp527 = 'PSP_527';

    /** Invalid card number. */
    case Psp528 = 'PSP_528';

    /** Invalid card number. */
    case Psp529 = 'PSP_529';

    /** Invalid card number (Luhn). */
    case Psp530 = 'PSP_530';

    /** Invalid card number (length). */
    case Psp531 = 'PSP_531';

    /** Invalid card number (not found). */
    case Psp532 = 'PSP_532';

    /** Invalid card number (not found). */
    case Psp533 = 'PSP_533';

    /** Card check for systematic authorization failed. */
    case Psp534 = 'PSP_534';

    /** e-Carte Bleue check failed. */
    case Psp535 = 'PSP_535';

    /** Risk check caused transaction refusal. */
    case Psp536 = 'PSP_536';

    /** Unhandled interruption during the payment process. */
    case Psp537 = 'PSP_537';

    /** Due to a technical incident, unable to process your request. */
    case Psp538 = 'PSP_538';

    /** 3D Secure refused for the transaction. */
    case Psp539 = 'PSP_539';

    /** Due to a technical incident, unable to process your request. */
    case Psp540 = 'PSP_540';

    /** Due to a technical incident, unable to process your request. */
    case Psp541 = 'PSP_541';

    /** Internal error occurred during card number lookup. */
    case Psp542 = 'PSP_542';

    /** Internal error occurred during card number lookup. */
    case Psp543 = 'PSP_543';

    /** Invalid currency for modification. */
    case Psp545 = 'PSP_545';

    /** Amount is greater than authorized. */
    case Psp546 = 'PSP_546';

    /** Desired presentation date later than authorization validity. */
    case Psp547 = 'PSP_547';

    /** Required modification is invalid. */
    case Psp548 = 'PSP_548';

    /** Invalid multi-payment definition. */
    case Psp549 = 'PSP_549';

    /** Unknown store. */
    case Psp550 = 'PSP_550';

    /** Unknown exchange rate. */
    case Psp551 = 'PSP_551';

    /** The contract has been closed since {0}. */
    case Psp552 = 'PSP_552';

    /** The store {0} has been closed since {1}. */
    case Psp553 = 'PSP_553';

    /** Rejected parameter that may contain sensitive data {0}. */
    case Psp554 = 'PSP_554';

    /** Due to a technical incident, unable to process your request. */
    case Psp555 = 'PSP_555';

    /** Error retrieving alias. */
    case Psp557 = 'PSP_557';

    /** Alias status not compatible with this operation. */
    case Psp558 = 'PSP_558';

    /** Error retrieving alias. */
    case Psp559 = 'PSP_559';

    /** Alias already exists. */
    case Psp560 = 'PSP_560';

    /** Invalid alias. */
    case Psp561 = 'PSP_561';

    /** Alias creation declined. */
    case Psp562 = 'PSP_562';

    /** Subscription already exists. */
    case Psp563 = 'PSP_563';

    /** Subscription already cancelled. */
    case Psp564 = 'PSP_564';

    /** Subscription is invalid. */
    case Psp565 = 'PSP_565';

    /** Recurrence rule not valid. */
    case Psp566 = 'PSP_566';

    /** Subscription creation declined. */
    case Psp567 = 'PSP_567';

    /** Due to a technical incident, unable to process your request. */
    case Psp569 = 'PSP_569';

    /** Invalid country code. */
    case Psp570 = 'PSP_570';

    /** Invalid web service parameter. */
    case Psp571 = 'PSP_571';

    /** Authorization refused by Cofinoga. */
    case Psp572 = 'PSP_572';

    /** 1-euro authorization refused (or CB network inquiry). */
    case Psp573 = 'PSP_573';

    /** Invalid payment configuration. */
    case Psp574 = 'PSP_574';

    /** Operation refused by PayPal. */
    case Psp575 = 'PSP_575';

    /** Due to a technical problem, unable to process your request. */
    case Psp576 = 'PSP_576';

    /** Due to a technical incident, unable to process your request. */
    case Psp577 = 'PSP_577';

    /** Transaction identifier not defined. */
    case Psp578 = 'PSP_578';

    /** Transaction identifier already used. */
    case Psp579 = 'PSP_579';

    /** Transaction identifier expired. */
    case Psp580 = 'PSP_580';

    /** Invalid theme config content. */
    case Psp581 = 'PSP_581';

    /** Refund not allowed. */
    case Psp582 = 'PSP_582';

    /** Transaction amount outside permitted values. */
    case Psp583 = 'PSP_583';

    /** Refund impossible with this order number. */
    case Psp584 = 'PSP_584';

    /** Commission error (Boleto payment). */
    case Psp585 = 'PSP_585';

    /** Refund impossible (Boleto payment). */
    case Psp586 = 'PSP_586';

    /** Error during creation (Boleto payment). */
    case Psp587 = 'PSP_587';

    /** Timeout for refunding a PayPal transaction. */
    case Psp588 = 'PSP_588';

    /** Modification not allowed. */
    case Psp589 = 'PSP_589';

    /** An error occurred during the refund. */
    case Psp590 = 'PSP_590';

    /** No payment option activated for this contract. */
    case Psp591 = 'PSP_591';

    /** Error calculating the payment channel. */
    case Psp592 = 'PSP_592';

    /** Error when the buyer returned to the payment finalization page. */
    case Psp593 = 'PSP_593';

    /** Technical error calling the RSP service. */
    case Psp594 = 'PSP_594';

    /** Due to a technical problem, unable to process your request. */
    case Psp595 = 'PSP_595';

    /** An error occurred during the settlement of this transaction. */
    case Psp596 = 'PSP_596';

    /** Settlement date too far away. */
    case Psp597 = 'PSP_597';

    /** Invalid transaction date. */
    case Psp598 = 'PSP_598';

    /** Error calculating the origin of the payment. */
    case Psp599 = 'PSP_599';

    /** Commercial card check failed. */
    case Psp600 = 'PSP_600';

    /** Refused because first installment was refused. */
    case Psp601 = 'PSP_601';

    /** Operation refused by Buyster. */
    case Psp602 = 'PSP_602';

    /** Transaction status could not be synchronized with the external system. */
    case Psp603 = 'PSP_603';

    /** An error occurred during the settlement of this transaction. */
    case Psp604 = 'PSP_604';

    /** A security error occurred during the 3DS process for this transaction. */
    case Psp605 = 'PSP_605';

    /** Currency not supported for this contract and/or store. */
    case Psp606 = 'PSP_606';

    /** The card associated with the alias is no longer valid. */
    case Psp607 = 'PSP_607';

    /** Due to a technical incident, unable to process your request. */
    case Psp608 = 'PSP_608';

    /** Timeout exceeded when redirecting the buyer. */
    case Psp609 = 'PSP_609';

    /** None of the contracts associated with your store can be used. */
    case Psp610 = 'PSP_610';

    /** Refusal of transactions without payment guarantee. */
    case Psp611 = 'PSP_611';

    /** Cancellation not allowed. */
    case Psp612 = 'PSP_612';

    /** Duplication not allowed. */
    case Psp613 = 'PSP_613';

    /** Surcharge not allowed. */
    case Psp614 = 'PSP_614';

    /** Refund not allowed. */
    case Psp615 = 'PSP_615';

    /** Manual payment not allowed for this card. */
    case Psp616 = 'PSP_616';

    /** Manual multi-installment payment not allowed for this card. */
    case Psp618 = 'PSP_618';

    /** Submitted date is invalid. */
    case Psp619 = 'PSP_619';

    /** Payment option of the initial transaction not applicable. */
    case Psp620 = 'PSP_620';

    /** Inactive card. */
    case Psp624 = 'PSP_624';

    /** Payment declined by the acquirer. */
    case Psp625 = 'PSP_625';

    /** This action is not possible because the payment sequence is not complete. */
    case Psp626 = 'PSP_626';

    /** Due to a technical problem, unable to process your request. */
    case Psp632 = 'PSP_632';

    /** Embedding a payment page in an iframe is not allowed. */
    case Psp635 = 'PSP_635';

    /** Refusal of derivative transactions without guarantee on the primary transaction. */
    case Psp636 = 'PSP_636';

    /** The transaction is a duplicate. */
    case Psp637 = 'PSP_637';

    /** Partial refund not possible on this transaction. */
    case Psp638 = 'PSP_638';

    /** Refund declined. */
    case Psp639 = 'PSP_639';

    /** Risk analyzer rejected the transaction. */
    case Psp641 = 'PSP_641';

    /** The card type used is not valid for the requested payment method. */
    case Psp642 = 'PSP_642';

    /** Due to a technical incident, unable to process your request. */
    case Psp643 = 'PSP_643';

    /** A production transaction was marked as test mode. */
    case Psp644 = 'PSP_644';

    /** A test transaction was marked as production mode. */
    case Psp645 = 'PSP_645';

    /** Invalid SMS code. */
    case Psp646 = 'PSP_646';

    /** Fraud module requested transaction decline. */
    case Psp647 = 'PSP_647';

    /** Due to a technical incident, the transaction was not created. */
    case Psp648 = 'PSP_648';

    /** Payment session expired (buyer did not complete 3DS authentication). */
    case Psp649 = 'PSP_649';

    /** Due to a technical incident, the transaction was not created. */
    case Psp650 = 'PSP_650';

    /** A Facily Pay transaction cannot be cancelled/modified/refunded between 23:30 and 5:30. */
    case Psp651 = 'PSP_651';

    /** Due to a technical incident, unable to process your request. */
    case Psp652 = 'PSP_652';

    /** Technical error calling Banque Accord service. */
    case Psp653 = 'PSP_653';

    /** Facily Pay transaction cannot be cancelled/modified/refunded due to transaction status. */
    case Psp655 = 'PSP_655';

    /** Due to a technical incident, unable to process your request. */
    case Psp658 = 'PSP_658';

    /** Amount is less than the minimum allowed. */
    case Psp659 = 'PSP_659';

    /** It is impossible to refund an unpaid transaction. */
    case Psp660 = 'PSP_660';

    /** Identity document type is present, but its number is missing. */
    case Psp665 = 'PSP_665';

    /** Identity document number is present, but its type is missing. */
    case Psp666 = 'PSP_666';

    /** Identity document type is unknown. */
    case Psp667 = 'PSP_667';

    /** Identity document number is invalid. */
    case Psp668 = 'PSP_668';

    /** Specific data for acquirer are invalid. */
    case Psp669 = 'PSP_669';

    /** Deferred payment not allowed. */
    case Psp670 = 'PSP_670';

    /** Number of months for deferred payment not allowed. */
    case Psp671 = 'PSP_671';

    /** The selected payment cinematic is invalid. */
    case Psp672 = 'PSP_672';

    /** Error on PayPal Express Checkout. */
    case Psp673 = 'PSP_673';

    /** Cancellation impossible; try refund. */
    case Psp675 = 'PSP_675';

    /** Refund impossible; try cancellation. */
    case Psp676 = 'PSP_676';

    /** No response to the authorization request within the time limit. */
    case Psp677 = 'PSP_677';

    /** Cancellation impossible; transaction already cancelled. */
    case Psp678 = 'PSP_678';

    /** Transaction status is unknown. */
    case Psp679 = 'PSP_679';

    /** Customer national identifier is missing. */
    case Psp682 = 'PSP_682';

    /** Format of the customer national identifier is incorrect. */
    case Psp683 = 'PSP_683';

    /** Payment method verification refused. */
    case Psp703 = 'PSP_703';

    /** Security error during the 3DS authorization process. */
    case Psp705 = 'PSP_705';

    /** Security error during the 3DS authorization process. */
    case Psp706 = 'PSP_706';

    /** 3D Secure - Authentication refused by the issuer. */
    case Psp707 = 'PSP_707';

    /** 3D Secure - Refused because issuer authentication is not possible. */
    case Psp708 = 'PSP_708';

    /** 3D Secure - Session altered by the ACS. */
    case Psp713 = 'PSP_713';

    /** OTP code expired. */
    case Psp716 = 'PSP_716';

    /** Invalid OTP code. */
    case Psp717 = 'PSP_717';

    /** Invalid authentication settings. */
    case Psp718 = 'PSP_718';

    /** Technical error during authentication. */
    case Psp719 = 'PSP_719';

    /** Internal error during authentication. */
    case Psp720 = 'PSP_720';

    /** Authentication was cancelled. */
    case Psp722 = 'PSP_722';

    /** Unknown cardholder. */
    case Psp724 = 'PSP_724';

    /** Unable to authenticate. */
    case Psp727 = 'PSP_727';

    /** Too many card payment attempts. */
    case Psp728 = 'PSP_728';

    /** No registration found with the required fields. */
    case Psp729 = 'PSP_729';

    /** Authentication identifier not found. */
    case Psp730 = 'PSP_730';

    /** formToken not found or expired. */
    case Psp903 = 'PSP_903';

    /** Error calling the wallet. Check the payment method configuration. */
    case Psp992 = 'PSP_992';

    /** Technical error in the administration API. */
    case Psp993 = 'PSP_993';

    /** Exceeding the maximum allowed number of characters. */
    case Psp994 = 'PSP_994';

    /** Internal error. */
    case Psp995 = 'PSP_995';

    /** Technical error. */
    case Psp996 = 'PSP_996';

    /** Technical error during cardholder authentication. */
    case Psp997 = 'PSP_997';

    /** HTTP error. */
    case Psp998 = 'PSP_998';

    /** Technical error. */
    case Psp999 = 'PSP_999';

    /** Payment order not found. */
    case Psp1000 = 'PSP_1000';

    /** Unable to reach the WhatsApp gateway. */
    case Psp1001 = 'PSP_1001';

    /** The recipient's phone number is not associated with a WhatsApp account. */
    case Psp1002 = 'PSP_1002';

    /** WhatsApp configuration missing. */
    case Psp1003 = 'PSP_1003';

    /** WhatsApp template not available for the requested locale. */
    case Psp1004 = 'PSP_1004';

    /** Action not allowed on a payment order with status "Finalized". */
    case Psp1005 = 'PSP_1005';

    /** Action not allowed on a payment order with status "Expired". */
    case Psp1006 = 'PSP_1006';

    /** Expiration date cannot be before creation and cannot exceed 90 days. */
    case Psp1007 = 'PSP_1007';

    /** Validity date required. */
    case Psp1008 = 'PSP_1008';

    /** VAT rate required (not provided, not calculated, and not configured). */
    case Psp1009 = 'PSP_1009';

    /** Payment order does not match the store identifier. */
    case Psp1010 = 'PSP_1010';

    /** Payment order does not match the mode (TEST or PRODUCTION). */
    case Psp1011 = 'PSP_1011';

    /** Invalid locale, expected format: xx_XX. */
    case Psp1012 = 'PSP_1012';

    /** Invalid parameter languageFallback, expected format: xx_XX. */
    case Psp1013 = 'PSP_1013';

    /** The store does not have a data collection form. */
    case Psp1014 = 'PSP_1014';

    /** The store does not support the data collection form. */
    case Psp1015 = 'PSP_1015';

    /** Emission channel not implemented. */
    case Psp1016 = 'PSP_1016';

    /** Unable to modify the emission channel of a payment order. */
    case Psp1017 = 'PSP_1017';

    /** Data collection form not available for the provided currency. */
    case Psp1018 = 'PSP_1018';

    /** Subject attribute is required. */
    case Psp1019 = 'PSP_1019';

    /** Recipient attribute is required. */
    case Psp1020 = 'PSP_1020';

    /** Message attribute is required. */
    case Psp1021 = 'PSP_1021';

    /** Email template not available for the requested locale. */
    case Psp1022 = 'PSP_1022';

    /** The amount attribute must be 0 when registering a payment method. */
    case Psp1023 = 'PSP_1023';

    /** The amount attribute must not be 0 for a payment. */
    case Psp1024 = 'PSP_1024';

    /** paymentReceiptEmail attribute is required. */
    case Psp1025 = 'PSP_1025';

    /** Duplicate data in expandedData. */
    case Psp1026 = 'PSP_1026';

    /** Invalid data in expandedData. */
    case Psp1027 = 'PSP_1027';

    /** An unknown error occurred while sending the SMS. */
    case Psp1028 = 'PSP_1028';

    /** SMS account identifier or password is invalid. */
    case Psp1029 = 'PSP_1029';

    /** SMS account balance exceeded. */
    case Psp1030 = 'PSP_1030';

    /** Invalid phone number. */
    case Psp1031 = 'PSP_1031';

    /** Payment order recipient email address is invalid. */
    case Psp1032 = 'PSP_1032';

    /** Payment order recipient email is not valid. */
    case Psp1033 = 'PSP_1033';

    /** Data collection form cannot be used if the store has the payment order invoice function. */
    case Psp1034 = 'PSP_1034';

    /** The requested currency does not match the store's currency. */
    case Psp1035 = 'PSP_1035';

    /** The requested reference already exists. */
    case Psp1036 = 'PSP_1036';

    /** One of the header parameters is missing. */
    case Psp1037 = 'PSP_1037';

    /** Message too long. */
    case Psp1038 = 'PSP_1038';

    /** Incompatible parameter count. */
    case Psp1039 = 'PSP_1039';

    /** Template missing. */
    case Psp1040 = 'PSP_1040';

    /** Missing language. */
    case Psp1041 = 'PSP_1041';

    /** Template parameter too long. */
    case Psp1042 = 'PSP_1042';

    /** Inconsistent template parameter format. */
    case Psp1043 = 'PSP_1043';

    /** SMS gateway unavailable. */
    case Psp1044 = 'PSP_1044';

    /** An active payment order invoice already exists for this reference; cannot reactivate order. */
    case Psp1045 = 'PSP_1045';

    /** An active payment order invoice already exists for this reference; cannot update order. */
    case Psp1046 = 'PSP_1046';

    /** Alias already cancelled. */
    case Psp1047 = 'PSP_1047';

    /** Alias not found. */
    case Psp1048 = 'PSP_1048';

    /** Invalid alias. */
    case Psp1049 = 'PSP_1049';

    /** Wallet not found. */
    case Psp1050 = 'PSP_1050';

    /** Function not enabled. */
    case Psp1051 = 'PSP_1051';

    /** Payment order identifier required. */
    case Psp1052 = 'PSP_1052';

    /** The URL generated by the payment order is too long. */
    case Psp1053 = 'PSP_1053';

    /** Shipping option not allowed. */
    case Psp1058 = 'PSP_1058';

    /** Shipping impossible. */
    case Psp1059 = 'PSP_1059';

    /** Remaining amount to ship. */
    case Psp1060 = 'PSP_1060';

    /** Incorrect shipping amount. */
    case Psp1061 = 'PSP_1061';

    /** Shipping amount exceeded. */
    case Psp1062 = 'PSP_1062';

    /** Shipping capture date too far away. */
    case Psp1063 = 'PSP_1063';

    /** Shipping expired. */
    case Psp1064 = 'PSP_1064';

    /** Cetelem services are currently unavailable; try again later. */
    case Psp1065 = 'PSP_1065';

    /** Data received from the wallet is not consistent. */
    case Psp1066 = 'PSP_1066';

    /** Unable to access the wallet. */
    case Psp1067 = 'PSP_1067';

    /** Unable to get payload information due to an unknown error. */
    case Psp1068 = 'PSP_1068';

    /** Unable to get payload information (store not found). */
    case Psp1069 = 'PSP_1069';

    /** Unable to get payload information (unable to get card info). */
    case Psp1070 = 'PSP_1070';

    /** Unable to get payload information due to an unknown error on CARD WALLET PAYAPP. */
    case Psp1071 = 'PSP_1071';

    /** Amount not allowed. */
    case Psp1072 = 'PSP_1072';

    /** Only SEPA aliases are supported. */
    case Psp1073 = 'PSP_1073';

    /** Credit operation not supported on the alias. */
    case Psp1074 = 'PSP_1074';

    /** Unable to credit the alias. */
    case Psp1075 = 'PSP_1075';

    /** Unexpected error during cancellation or refund. */
    case Psp1076 = 'PSP_1076';

    /** Technical error retrieving transaction details. */
    case Psp1077 = 'PSP_1077';

    /** Unexpected error during credit token. */
    case Psp1078 = 'PSP_1078';

    /** Unknown network token error. */
    case Psp1080 = 'PSP_1080';

    /** Invalid network token request. */
    case Psp1081 = 'PSP_1081';

    /** STS call error for the network token. */
    case Psp1082 = 'PSP_1082';

    /** Network token schema call error. */
    case Psp1083 = 'PSP_1083';

    /** Invalid network token card number. */
    case Psp1084 = 'PSP_1084';

    /** Invalid network token card not allowed. */
    case Psp1085 = 'PSP_1085';

    /** The network token issuer refused. */
    case Psp1086 = 'PSP_1086';

    /** Network tokenization is not eligible. */
    case Psp1087 = 'PSP_1087';

    /** QR Code creation failed in the application. */
    case Psp1091 = 'PSP_1091';

    /** Error creating QR code. */
    case Psp1094 = 'PSP_1094';

    /** Device serial number required if paymentSource is INSTORE. */
    case Psp1095 = 'PSP_1095';

    /** Action not allowed on a payment order with cancelled status. */
    case Psp1101 = 'PSP_1101';

    /** One of the SEPA mandates is not modifiable. */
    case Psp1154 = 'PSP_1154';

    /** Modification of buyer details ('Legal Identifier', 'Title', 'First Name', 'Last Name') is forbidden for a SEPA token. */
    case Psp1155 = 'PSP_1155';

    /** Sensitive data detected. */
    case Psp1999 = 'PSP_1999';

    /** Unable to delete the greylist with this PAN (card number). */
    case Psp2001 = 'PSP_2001';

    /** Greylist not found. */
    case Psp2002 = 'PSP_2002';

    /** No IP address associated with the alias. */
    case Psp2003 = 'PSP_2003';

    /** Unknown error. */
    case Psp9999 = 'PSP_9999';

    /**
     * Get the error category based on the error code prefix.
     *
     * @return string one of: "Acquirer error", "Authentication error", "Client-side JavaScript error", "Integration error (merchant side)", "PSP error", or "Unknown error type"
     */
    public function getErrorCategory(): string
    {
        if (str_starts_with($this->value, 'ACQ_')) {
            return 'Acquirer error';
        }

        if (str_starts_with($this->value, 'AUTH')) {
            return 'Authentication error';
        }

        if (str_starts_with($this->value, 'CLIENT_')) {
            return 'Client-side JavaScript error';
        }

        if (str_starts_with($this->value, 'INT_')) {
            return 'Integration error (merchant side)';
        }

        if (str_starts_with($this->value, 'PSP_')) {
            return 'PSP error';
        }

        return 'Unknown error type';
    }

    /**
     * Check if the error is an acquirer error.
     */
    public function isAcquirerError(): bool
    {
        return str_starts_with($this->value, 'ACQ_');
    }

    /**
     * Check if the error is an authentication error.
     */
    public function isAuthenticationError(): bool
    {
        return str_starts_with($this->value, 'AUTH');
    }

    /**
     * Check if the error is a client-side JavaScript error.
     */
    public function isClientError(): bool
    {
        return str_starts_with($this->value, 'CLIENT_');
    }

    /**
     * Check if the error is an integration error (merchant side).
     */
    public function isIntegrationError(): bool
    {
        return str_starts_with($this->value, 'INT_');
    }

    /**
     * Check if the error is a PSP error.
     */
    public function isPspError(): bool
    {
        return str_starts_with($this->value, 'PSP_');
    }

    /**
     * Determines if the error indicates that the payment method is invalid for scheduled (automatic) installment processing.
     *
     * If the payment method is considered invalid, it must be updated or replaced.
     *
     * @return bool true if the error code corresponds to an invalid payment method, false otherwise
     */
    public function isInvalidPaymentMethod(): bool
    {
        return \in_array($this, [
            self::Client301, // Invalid card number.
            self::Client309, // Invalid payment method.
            self::Int040,    // Invalid PAN parameter.
            self::Psp112,    // Payment method expired.
            self::Psp508,    // Card expiration invalid.
            self::Psp526,    // Invalid card number.
            self::Psp527,    // Invalid card number.
            self::Psp528,    // Invalid card number.
            self::Psp529,    // Invalid card number.
            self::Psp530,    // Card number fails Luhn check.
            self::Psp531,    // Card number invalid (length).
            self::Psp532,    // Card number not found.
            self::Psp533,    // Card number not found.
            self::Psp561,    // Alias invalid.
            self::Psp607,    // Card associated with alias is no longer valid.
            self::Psp624,    // Card inactive.
            self::Psp1047,   // Alias already cancelled.
            self::Psp1048,   // Alias not found.
            self::Psp1049,   // Alias invalid.
        ], true);
    }
}
