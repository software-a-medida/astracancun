<?php
defined('_EXEC') or die;

define('PAYMENTS_TERMINAL', 'com_payments_terminal');
define('PAYMENTS_TERMINAL_URI', '{$vkye_domain}/components/'. PAYMENTS_TERMINAL .'/');
define('COM_PAYMENTS_TERMINAL', dirname(__FILE__) . DIRECTORY_SEPARATOR);

require_once COM_PAYMENTS_TERMINAL . '/conekta/Conekta.php';

require_once COM_PAYMENTS_TERMINAL . 'helpers' . DIRECTORY_SEPARATOR . 'PaymentsTerminal' . CLASS_PHP;
require_once COM_PAYMENTS_TERMINAL . 'helpers' . DIRECTORY_SEPARATOR . 'PayPal' . CLASS_PHP;
require_once COM_PAYMENTS_TERMINAL . 'helpers' . DIRECTORY_SEPARATOR . 'OxxoPay' . CLASS_PHP;
