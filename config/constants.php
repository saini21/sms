<?php
define('SITE_TITLE', 'Earn with SMS');
define('SITE_URL', 'http://localhost/vikas/sms');
define('PROFILE_IMAGE_PATH', '/vikas/sms/files/Users/profile_image/');
define('ADMIN_PROFILE_IMAGE_PATH', '/vikas/sms/files/Admins/profile_image/');
define('PAYMENT_PROOF_IMAGE_PATH', '/vikas/sms/files/PaymentProofs/proof_image/');
define('LONG_DATE', 'l, F j, Y \a\t g:i a');
define('SHORT_DATE', 'M j, y  g:i A');
define('DATE_ONLY', 'j-m-Y');
define('SQL_DATE', 'Y-m-d');
define('NICE_DATE', 'l, F j, Y');
define('PAGE_LIMIT', 20);
define('FROM_EMAIL', 'no-reply@sms.com');
define('SUPPORT_EMAIL', 'support@sms.com');

/*
 * DB Constants
 */

define('DB_USER', 'root');
define('DB_PASS', 'gurunanak');
define('DB_NAME', 'sms');



/*
 * GENRAL
 *
 */

define('MSG_CHARACTER_LIMIT', 160);


/*
 * Status Constants
 */

define('SUCCESS_CODE', 200);
define('INVALID_ACCESS_TOKEN', 459);
define('TOKEN_EXPIRED', 457);
define('CODE_BAD_REQUEST', 400);
define('SYSTEM_ERROR', 500);
define('MISMATCH', 408);
define('USER_ALREADY_EXIST', 520);
define('RECORD_NOT_FOUND', 404);
define('PAGE_NOT_FOUND', 404);
define('EMAIL_DOESNOT_REGISTERED', 413);

/*
 * PayTM
 */

define('PAYTM_ENVIRONMENT', 'TEST'); // PROD // TEST

//define('PAYTM_MERCHANT_KEY', 'S2WL4TV!c7R7btSr');
//define('PAYTM_MERCHANT_MID', 'SinghS73900361277933');

//define('PAYTM_MERCHANT_KEY', 'l5!6r98CmTj4Ur8!');
//define('PAYTM_MERCHANT_MID', 'ukepMa12970012930269');

define('PAYTM_MERCHANT_KEY', 't8%fungxrVlj9KyY');
define('PAYTM_MERCHANT_MID', 'Earnwi29994223681667');



define('PAYTM_MERCHANT_WEBSITE', 'WEBSTAGING');

$PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatus';
$PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/processTransaction';
if (PAYTM_ENVIRONMENT == 'PROD') {
    $PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
    $PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
}

define('PAYTM_REFUND_URL', '');
define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
define('PAYTM_TXN_URL', $PAYTM_TXN_URL);
