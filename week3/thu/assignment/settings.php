<?php

define('__INCLUDED__', true);

/** PATH */
define('APP_PATH', __DIR__);
define('APP_INCLUDE_PATH', __DIR__ . '/includes/');

/**
 * Database config
 */
define('DB_HOST', 'localhost');
define('DB_PASS', '');
define('DB_USER', 'root');
define('DB_NAME', 'decagon');

/**
 * Paystack secret key
 */
define('APP_SECRET_KEY', 'sk_test_092414cb55d96ae3eb00bd39f93505fecbb56893');

require APP_INCLUDE_PATH . "model/Customer.php";
require APP_INCLUDE_PATH . "service/CustomerService.php";
require APP_INCLUDE_PATH . "service/PayStack.php";
require APP_INCLUDE_PATH . "exception/ApiRequestException.php";