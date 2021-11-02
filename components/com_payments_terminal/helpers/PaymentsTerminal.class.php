<?php
defined('_EXEC') or die;

class PaymentsTerminal
{
    public $controller = 'payment';
    public $payment_url;
    public $currency;
    public $sandbox;
    public $debug;
    public $notifications_email;
    public $create_order;
    public $clean_order;

    /* PayPal */
    public $paypal_url;
    public $paypal_method_url;
    public $paypal_redirect_url;
    public $paypal_ipn_url;
    public $paypal_cancel_url;
    public $paypal_success_url;
    public $paypal_merchant_email;
    public $paypal_custom_variable;

    // OxxoPay
    public $oxxopay_url;
    public $oxxopay_listener_url;
    public $oxxopay_expires;

    // Conekta
    public $conekta_private_key;
    public $conekta_public_key;

    public function __construct()
    {
        $this->paymentSettings();
        $this->parseUrls();
    }

    private function paymentSettings()
    {
        $database = new Medoo();
        $settings = $database->select('com_payment_settings', '*', ['LIMIT' => 1]);

        if ( isset($settings[0]) )
        {
            $settings = $settings[0];

            $this->notifications_email = $settings['email_notifications'];
            $this->paypal_merchant_email = $settings['email_paypal_account'];
            $this->currency = $settings['currency'];
            $this->sandbox = ( $settings['sandbox'] == 1 ) ? true : false;
            $this->debug = ( $settings['debug'] == 1 ) ? true : false;
            $this->paypal_custom_variable = Session::getValue('var_tmp');
            $this->conekta_private_key = $settings['conekta_private_key'];
            $this->conekta_public_key = $settings['conekta_public_key'];
            $this->oxxopay_expires = $settings['conekta_oxxopay_expires'];
        }
        else
            exit('Hace falta la configuración');
    }

    private function parseUrls()
    {
        if( $this->sandbox == true )
            $this->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
        else
            $this->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';

        if ( Configuration::$urlFriendly == true )
        {
            $this->create_order =
                Security::protocol().Configuration::$domain.'/'.$_SESSION['lang'].'/'.$this->controller.'/create_order';
            $this->clean_order =
                Security::protocol().Configuration::$domain.'/'.$_SESSION['lang'].'/'.$this->controller.'/clean';
            $this->payment_url =
                Security::protocol().Configuration::$domain.'/'.$_SESSION['lang'].'/'.$this->controller;
            $this->paypal_method_url =
                Security::protocol().Configuration::$domain.'/'.$_SESSION['lang'].'/'.$this->controller.'/paypal';
            $this->paypal_redirect_url =
                Security::protocol().Configuration::$domain.'/'.$_SESSION['lang'].'/'.$this->controller.'/paypal/redirect';
            $this->paypal_ipn_url =
                Security::protocol().Configuration::$domain.'/'.$_SESSION['lang'].'/'.$this->controller.'/paypal/ipn';
            $this->paypal_cancel_url =
                Security::protocol().Configuration::$domain.'/'.$_SESSION['lang'].'/'.$this->controller.'/cancel';
            $this->paypal_success_url =
                Security::protocol().Configuration::$domain.'/'.$_SESSION['lang'].'/'.$this->controller.'/success';
            $this->oxxopay_url =
                Security::protocol().Configuration::$domain.'/'.$_SESSION['lang'].'/'.$this->controller.'/oxxopay';
            $this->oxxopay_listener_url =
                Security::protocol().Configuration::$domain.'/'.$_SESSION['lang'].'/'.$this->controller.'/oxxopay/listener';
        }
        else
        {
            $this->create_order =
                Security::protocol().Configuration::$domain.'/index.php?c='.$this->controller.'&m=create_order';
            $this->clean_order =
                Security::protocol().Configuration::$domain.'/index.php?c='.$this->controller.'&m=clean';
            $this->payment_url =
                Security::protocol().Configuration::$domain.'/index.php?c='.$this->controller;
            $this->paypal_method_url =
                Security::protocol().Configuration::$domain.'/index.php?c='.$this->controller.'&m=paypal';
            $this->paypal_redirect_url =
                Security::protocol().Configuration::$domain.'/index.php?c='.$this->controller.'&m=paypal&p=redirect';
            $this->paypal_ipn_url =
                Security::protocol().Configuration::$domain.'/index.php?c='.$this->controller.'&m=paypal&p=ipn';
            $this->paypal_cancel_url =
                Security::protocol().Configuration::$domain.'/index.php?c='.$this->controller.'&m=cancel';
            $this->paypal_success_url =
                Security::protocol().Configuration::$domain.'/index.php?c='.$this->controller.'&m=success';
            $this->oxxopay_url =
                Security::protocol().Configuration::$domain.'/index.php?c='.$this->controller.'&m=oxxopay';
            $this->oxxopay_listener_url =
                Security::protocol().Configuration::$domain.'/index.php?c='.$this->controller.'&m=oxxopay&p=listener';
        }
    }
}
