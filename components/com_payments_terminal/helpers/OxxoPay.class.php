<?php
defined('_EXEC') or die;

class OxxoPay extends PaymentsTerminal
{
    private $security;
    private $database;
    private $itemsOrder;
    private $totalAmount;
    private $orderResponse;

    public function __construct()
    {
        parent::__construct();

        $this->security = new Security();
        $this->database = new Medoo();

        $this->itemsOrder = [];
        $this->totalAmount = 0;
        $this->orderResponse = [];

        define(
            "LOG_FILE",
            $this->security->directorySeparator(COM_PAYMENTS_TERMINAL ."logs". DIRECTORY_SEPARATOR ."oxxopay.log"));
    }

    public function createOrder()
    {
        $this->itemsOrder();
        $this->process();

        if ( $this->debug == true )
            error_log(date('[Y-m-d H:i e] '). PHP_EOL, 3, LOG_FILE);

        $html = '';

        foreach ( $this->orderResponse as $key => $value )
        {
            $html .= '<div class="reference">
                <div>
                    <span>{$lang.payment_pay_oxxopay_reference} #'. $value['number'] .'</span>
                    <span>'. $value['reference'] .'</span>
                </div>
                <div>
                    <span>{$lang.payment_pay_oxxopay_amount}</span>
                    <span><sup>$</sup>'. number_format($value['amount'], 2, '.', ',') .' <sup>'. $this->currency .'</sup></span>
                </div>
                <div>
                    <p>'. $value['order']['name'] .'</p>
                </div>
            </div>';
        }

        return [
            'totalAmount' => number_format($this->totalAmount, 2, '.', ','),
            'html' => $html
        ];
    }

    private function setKeys()
    {
        \Conekta\Conekta::setApiKey( $this->conekta_private_key );
		\Conekta\Conekta::setApiVersion("2.0.0");
    }

    private function itemsOrder()
    {
        $arr = Session::getValue('payment_checkout');
		$arr = json_decode($arr);

		foreach ($arr as $item)
		{
			$item->amount_single = $item->amount;
			$item->amount_total  = $item->amount * $item->quantity;
			$this->totalAmount   = $this->totalAmount + (int) $item->amount_total;

			$this->itemsOrder[] = [
				"name" => $item->item_name,
				"unit_price" => $item->amount_single ."00",
				"quantity" => $item->quantity
			];
		}
    }

    private function process()
    {
        $this->setKeys();
        $customer_data = Session::getValue('payment_customer_data');

        try {
            $date = new DateTime( Format::getDateHour() );
            $date->modify("+{$this->oxxopay_expires} days");
            $expires_at = $date->getTimestamp();

			if ( $this->totalAmount > 10000 )
			{
				$a = $this->totalAmount / 10000;
				$a = ( is_float($a) ) ? explode('.', $a)[0] + 1 : $a;
				$b = $this->totalAmount / $a;

				$quantityOrders = $a;
				$amountPerOrder = ( is_float($b) ) ? explode('.', $b)[0] + 1 : $b;
				$nameOrder = "";

				foreach ( $this->itemsOrder as $value )
					$nameOrder .= $value['name'] . " + ";

				for ( $i=1; $i <= $quantityOrders; $i++ )
				{
					$order = \Conekta\Order::create(
						[
							"line_items" => [
								[
									"name" => trim($nameOrder, ' + ') . ". Orden # $i de $quantityOrders",
									"unit_price" => $amountPerOrder ."00",
									"quantity" => 1
								]
							],
							"currency" => $this->currency,
							"customer_info" => [
								"name" => "{$customer_data['name']} {$customer_data['lastname']}",
								"email" => "{$customer_data['email']}",
								"phone" => "{$customer_data['phone']}"
							],
							"charges" => [
								[
									"payment_method" => [
										"type" => "oxxo_cash",
                                        "expires_at" => $expires_at
									]
								]
							]
						]
					);

                    $this->database->insert('com_payment_verified', [
                        'payment_method' => 'oxxopay',
                        'txn_id'         => $order->charges[0]->payment_method->reference,
                        'payer_email'    => $customer_data['email'],
                        'data'           => json_encode( $order )
                    ]);

                    $this->responseOrder( $order, $i );
				}
			}
			else
			{
				$order = \Conekta\Order::create(
					[
						"line_items" => $this->itemsOrder,
						"currency" => $this->currency,
						"customer_info" => [
							"name" => "{$customer_data['name']} {$customer_data['lastname']}",
							"email" => "{$customer_data['email']}",
							"phone" => "{$customer_data['phone']}"
						],
						"charges" => [
							[
								"payment_method" => [
									"type" => "oxxo_cash",
                                    "expires_at" => $expires_at
								]
							]
						]
					]
				);

                $this->database->insert('com_payment_verified', [
                    'payment_method' => 'oxxopay',
                    'txn_id'         => $order->charges[0]->payment_method->reference,
                    'payer_email'    => $customer_data['email'],
                    'data'           => json_encode( $order ),
                    'status_payment' => 'pending'
                ]);

                $this->responseOrder( $order );
			}
		}
        catch (\Conekta\ParameterValidationError $error)
        {
            echo $error->getMessage();
            exit();
        }
        catch (\Conekta\Handler $error)
		{
            echo $error->getMessage();
            exit();
        }
    }

    private function responseOrder( $order, $number = 1 )
    {
        $this->orderResponse[] = [
            "number" => $number,
            "ID" => $order->id,
            "payment_method" => $order->charges[0]->payment_method->service_name,
            "reference" => $order->charges[0]->payment_method->reference,
            "expires_at" => date("d/m/Y", $order->charges[0]->payment_method->expires_at),
            "amount" => $order->amount/100,
            "currency" => $order->currency,
            "order" => [
                "quantity" => $order->line_items[0]->quantity,
                "name" => $order->line_items[0]->name,
                "unit_price" => $order->line_items[0]->unit_price/100
            ]
        ];
    }

    public function listener()
    {
        $body = @file_get_contents('php://input');

        if ( isset($body) && !empty($body) )
        {
            http_response_code(200);

            $paid = json_decode($body, true);

            if ( $paid['type'] == 'charge.paid' )
            {
                $ticket = $this->database->select('com_payment_verified', '*', [
                    "txn_id" => $paid['data']['object']['payment_method']['reference']
                ]);

                $this->database->update('com_payment_verified', [
                    'status_payment' => 'paid'
                ], [
                    "txn_id" => $paid['data']['object']['payment_method']['reference']
                ]);

                require_once $this->security->directorySeparator(PATH_INCLUDES . PAYMENTS_TERMINAL . '_oxxopay_successful.php');
            }
        }
        else
            http_response_code(404);
    }
}
