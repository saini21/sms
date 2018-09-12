<?php
define('SITE_TITLE', 'Earn with SMS');
define('SITE_URL', 'http://localhost/sms');
define('PROFILE_IMAGE_PATH', '/sms/files/Users/profile_image/');
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
