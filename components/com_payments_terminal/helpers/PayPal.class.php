<?php
defined('_EXEC') or die;

class PayPal extends PaymentsTerminal
{
    private $security;
    private $database;
    private $format;

    public $paypal_post_data;
    private $paypal_fields;

    public function __construct()
    {
        parent::__construct();

        $this->security = new Security();
        $this->database = new Medoo();
        $this->format = new Format();

        $this->add_field('rm', 2);
        $this->add_field('cmd', '_cart');
        $this->add_field('txn_type', 'cart');
        $this->add_field('charset', 'utf-8');
        $this->add_field('upload', 1);
        $this->add_field('currency_code', $this->currency);
        $this->add_field('business', $this->paypal_merchant_email);
        $this->add_field('return', $this->paypal_success_url);
        $this->add_field('cancel_return', $this->paypal_cancel_url);
        $this->add_field('notify_url', $this->paypal_ipn_url);
        $this->add_field('custom', $this->paypal_custom_variable);
    }

    public function add_field( $field, $value )
    {
        $this->paypal_fields["$field"] = $value;
    }

    public function submit_paypal()
    {
        $inputs = "\n";
        foreach ($this->paypal_fields as $name => $value)
            $inputs .= "\t".'<input type="hidden" name="'. $name .'" value="'. $value .'" />'."\n";

        return $inputs;
    }

    public function validate_ipn()
    {
        date_default_timezone_set(Configuration::$timeZone);
        define(
            "LOG_FILE",
            $this->security->directorySeparator(COM_PAYMENTS_TERMINAL ."logs". DIRECTORY_SEPARATOR ."paypal.log"));

        if($this->debug == true)
            error_log(PHP_EOL, 3, LOG_FILE);

        $raw_post_data 	= file_get_contents('php://input');
        $raw_post_array = explode('&', $raw_post_data);
        $myPost 		= [];

        foreach ( $raw_post_array as $keyval )
        {
        	$keyval = explode ('=', $keyval);
        	if (count($keyval) == 2)
        		$myPost[$keyval[0]] = urldecode($keyval[1]);
        }

        $req = 'cmd=_notify-validate';

        if(function_exists('get_magic_quotes_gpc'))
        	$get_magic_quotes_exists = true;

        foreach ( $myPost as $key => $value )
        {
        	if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1)
        		$value = urlencode(stripslashes($value));
        	else
        		$value = urlencode($value);

        	$req .= "&$key=$value";
        }

        if ( $this->debug == true )
        {
            $data_post_log = '';
            for ($i=0; $i<80; $i++) { $data_post_log .= '-'; }
            $data_post_log .= "\n";

            foreach ($myPost as $key => $value)
                $data_post_log .= str_pad($key, 25)."$value\n";
            $data_post_log .= "\n\n";
        }

        $ch = curl_init($this->paypal_url);

        if ( $ch == false )
            return false;

        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);

        if ( $this->debug == true )
        {
        	curl_setopt($ch, CURLOPT_HEADER, 1);
        	curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
        }

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

        // CONFIG: Please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path
        // of the certificate as shown below. Ensure the file is readable by the webserver.
        // This is mandatory for some environments.
        //$cert = __DIR__ . "./cacert.pem";
        //curl_setopt($ch, CURLOPT_CAINFO, $cert);

        $res = curl_exec($ch);

        if (curl_errno($ch) != 0)
        {
        	if ( $this->debug == true )
                error_log(date('[Y-m-d H:i e] '). "Can't connect to PayPal to validate IPN message: " . curl_error($ch) . PHP_EOL, 3, LOG_FILE);

        	curl_close($ch);

        	exit;
        }
        else
        {
    		if ( $this->debug == true )
    		{
    			error_log(date('[Y-m-d H:i e] '). "HTTP request of validation request:". curl_getinfo($ch, CURLINFO_HEADER_OUT) ." for IPN payload: $req" . PHP_EOL, 3, LOG_FILE);
    			error_log(date('[Y-m-d H:i e] '). "HTTP response of validation request: $res" . PHP_EOL, 3, LOG_FILE);
    		}

    		curl_close($ch);
        }

        $tokens = explode("\r\n\r\n", trim($res));
        $res = trim(end($tokens));

        if (strcmp ($res, "VERIFIED") == 0)
        {
            $exists = $this->database->count('com_payment_verified', [
                'AND' => [
                    'txn_id'        => $myPost['txn_id'],
                    'payer_email'   => $myPost['payer_email']
                ]
            ]);

            if(empty($exists) OR $exists === 0)
            {
                if($myPost['payment_status'] == 'Completed')
                {
                    $this->database->insert('com_payment_verified', [
                        'payment_method' => 'paypal',
                        'txn_id'         => $myPost['txn_id'],
                        'payer_email'    => $myPost['payer_email'],
                        'data'           => $myPost,
                        'status_payment' => 'paid'
                    ]);

                    $ticket = $this->database->select('com_payment_tmp', 'data', [
                        'id_tmp' => $myPost['custom']
                    ]);

                    $ticket = (!empty($ticket)) ? json_decode($ticket[0], true) : "";

                    require_once $this->security->directorySeparator(PATH_INCLUDES . PAYMENTS_TERMINAL . '_paypal_successful.php');

                    Session::setValue("payment_success", true);
                }
            }

        	if ( $this->debug == true )
            {
                error_log(date('[Y-m-d H:i e] '). "Verified IPN: $req ". PHP_EOL, 3, LOG_FILE);
                error_log($data_post_log . PHP_EOL, 3, LOG_FILE);
            }
        }
        else if (strcmp ($res, "INVALID") == 0)
        {
            if( isset($myPost['txn_id']) AND isset($myPost['payer_email']) )
            {
                $exists = $this->database->count('com_payment_invalid', [
                    'AND' => [
                        'txn_id'        => $myPost['txn_id'],
                        'payer_email'   => $myPost['payer_email']
                    ]
                ]);

                if(empty($exists) OR $exists === 0)
                {
                    $this->database->insert('com_payment_invalid', [
                        'payment_method' => 'paypal',
                        'txn_id'         => $myPost['txn_id'],
                        'payer_email'    => $myPost['payer_email'],
                        'data'           => json_encode( $myPost )
                    ]);

                    /* Send Email */
                    $html  = "";
                    $html .= "<h3>There has been an invalid payment on your website.</h3>";
                    $html .= "<h4>Date and hour: ". Format::getDateHour() ."</h4><br/>";
                    $html .= "<h5>Information: </h5>";
                    $html .= "<pre>$data_post_log</pre>";

                    $altHtml  = "";
                    $altHtml .= "There has been an invalid payment on your website.\n";
                    $altHtml .= "Date and hour: ". Format::getDateHour() . "\n\n";
                    $altHtml .= "Information:\n";
                    $altHtml .= "$data_post_log";

                    $header_mail = "MIME-Version: 1.0\r\n";
                    $header_mail .= "Content-type: text/html; charset=utf-8\r\n";
                    $header_mail .= "From: ". Configuration::$webPage ." <". $this->notifications_email .">\r\n";

                    mail($this->notifications_email, 'He tried to make a payment through PayPal with ' . Configuration::$domain, $html, $header_mail);
                }
            }

        	if ( $this->debug == true )
        		error_log(date('[Y-m-d H:i e] '). "Invalid IPN: $req" . PHP_EOL, 3, LOG_FILE);
        }
    }

}
