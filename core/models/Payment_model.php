<?php
defined('_EXEC') or die;

class Payment_model extends Model
{
	public $totalAmount;
	public $routeLayers;
	public $pathLanguage;
	public $paymentsTerminal;

	public function __construct()
	{
		parent::__construct();
		$this->component->loadComponent('payments_terminal');
		$this->routeLayers = [
			'head' => [
				'path' => COM_PAYMENTS_TERMINAL . 'assets/layers/',
				'file' => 'head'
			],
			'main' => [
				'path' => COM_PAYMENTS_TERMINAL . 'assets/layers/'
			],
			'footer' => [
				'path' => COM_PAYMENTS_TERMINAL . 'assets/layers/',
				'file' => 'footer'
			]
		];

		$this->pathLanguage = COM_PAYMENTS_TERMINAL . 'languages/';

		$this->paymentsTerminal = new PaymentsTerminal();
	}

	public function error()
	{
		define('_title', Language::getLang('{$lang.payment_error}', 'com_titles_page', $this->pathLanguage));

		$view = new View();

		$this->routeLayers['main']['file'] = 'gateway_empty';
		$template = $view->render('Payment', $this->routeLayers);
		$template = Language::getLang($template, 'com_payments_terminal', $this->pathLanguage);

		echo $template;
	}

	public function currency()
	{
		return $this->paymentsTerminal->currency;
	}

	public function payment_urls( $url = '' )
	{
		switch ( $url )
	    {
	        case 'create_order':
	            return $this->paymentsTerminal->create_order;
	            break;

	        case 'clean':
	            return $this->paymentsTerminal->clean_order;
	            break;

	        case 'paypal':
	            return $this->paymentsTerminal->paypal_url;
	            break;

	        case 'paypal_method':
	            return $this->paymentsTerminal->paypal_method_url;
	            break;

	        case 'paypal_redirect':
	            return $this->paymentsTerminal->paypal_redirect_url;
	            break;

	        case 'paypal_ipn':
	            return $this->paymentsTerminal->paypal_ipn_url;
	            break;

	        case 'paypal_cancel':
	            return $this->paymentsTerminal->paypal_cancel_url;
	            break;

	        case 'paypal_success':
	            return $this->paymentsTerminal->paypal_success_url;
	            break;

	        case 'oxxopay':
	            return $this->paymentsTerminal->oxxopay_url;
	            break;

	        case 'oxxopay_listener':
	            return $this->paymentsTerminal->oxxopay_listener_url;
	            break;

	        default:
	            return $this->paymentsTerminal->payment_url;
	            break;
	    }
	}

	public function checkout_view_items()
	{
		$arr = Session::getValue('payment_checkout');
		$arr = json_decode($arr);

		$html = '';
		foreach ($arr as $item)
		{
			$item->amount_single = $item->amount;
			$item->amount_total  = $item->amount * $item->quantity;
			$this->totalAmount   = $this->totalAmount + (int) $item->amount_total;

			$html .=
				'<tr>
					<td data-title="{$lang.payment_gateway_table_quantity}">'. $item->quantity .'</td>
					<td data-title="{$lang.payment_gateway_table_description}">'. $item->item_name .'</td>
					<td data-title="{$lang.payment_gateway_table_unitary_price}">$ '. number_format($item->amount_single, 2, '.', ',') .'</td>
					<td data-title="{$lang.payment_gateway_table_price}" style="text-align: right;">$ '. number_format($item->amount_total, 2, '.', ',') .'</td>
				</tr>';
		}

		return $html;
	}

	public function paypal ( $action = '' )
	{
		$paypal = new PayPal();

	    switch ( strtoupper( $action ) )
	    {
	        case 'IPN':
	            $paypal->validate_ipn();
	            break;

	        default:
	            $number_item = 0;
	            $items = json_decode(Session::getValue('payment_checkout'));

	            foreach ($items as $item)
	            {
	                $number_item = $number_item + 1;

	                $paypal->add_field('item_name_'.$number_item ,  $item->item_name);
	                $paypal->add_field('amount_'.$number_item,      $item->amount);
	                $paypal->add_field('quantity_'.$number_item,    $item->quantity);
	                $paypal->add_field('item_number_'.$number_item, $item->item_number);
	            }

	            $paypal->add_field('invoice', $this->security->randomString( 5 ));

	            return $paypal->submit_paypal();
	            break;
	    }
	}

	public function oxxopay ( $action = '' )
	{
		$oxxopay = new OxxoPay();

		switch ( strtoupper( $action ) )
		{
			case 'LISTENER':
				$oxxopay->listener();
				break;

			default:
				$response = $oxxopay->createOrder();

				Session::unsetValue('payment_checkout');
				Session::unsetValue('payment_success');
				Session::unsetValue('payment_customer_data');

				return $response;
				break;
		}
	}
}
