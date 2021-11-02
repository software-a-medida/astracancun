<?php
defined('_EXEC') or die;

class Payment_controller extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if( Session::existsVar('payment_checkout') == true )
		{
			if ( Format::existAjaxRequest() == true )
			{
				$post['name'] = ( isset($_POST['name']) && !empty($_POST['name']) ) ? $_POST['name'] : null;
		        $post['lastname'] = ( isset($_POST['lastname']) && !empty($_POST['lastname']) ) ? $_POST['lastname'] : null;
		        $post['phone'] = ( isset($_POST['phone']) && !empty($_POST['phone']) ) ? $_POST['phone'] : null;
		        $post['address'] = ( isset($_POST['address']) && !empty($_POST['address']) ) ? $_POST['address'] : null;
		        $post['country'] = ( isset($_POST['country']) && !empty($_POST['country']) ) ? $_POST['country'] : null;
		        $post['state'] = ( isset($_POST['state']) && !empty($_POST['state']) ) ? $_POST['state'] : null;
		        $post['city'] = ( isset($_POST['city']) && !empty($_POST['city']) ) ? $_POST['city'] : null;
		        $post['postal_code'] = ( isset($_POST['postal_code']) && !empty($_POST['postal_code']) ) ? $_POST['postal_code'] : null;
		        $post['email'] = ( isset($_POST['email']) && !empty($_POST['email']) ) ? $_POST['email'] : null;
		        $post['payment_method'] = ( isset($_POST['payment_method']) && !empty($_POST['payment_method']) ) ? $_POST['payment_method'] : 'credit_card';

		        $labels = [];

				if ( $post['payment_method'] != 'paypal' )
				{
					if ( is_null($post['name']) || strlen($post['name']) < 5 )
			        {
			            $labels[] = [
			                'name',
							$template = Language::getLang('{$lang.ajax_error_name}', 'com_payments_terminal', $this->model->pathLanguage)
			            ];
			        }

			        if ( is_null($post['lastname']) || strlen($post['lastname']) < 5 )
			        {
			            $labels[] = [
			                'lastname',
			                $template = Language::getLang('{$lang.ajax_error_lastname}', 'com_payments_terminal', $this->model->pathLanguage)
			            ];
			        }

			        if ( is_null($post['phone']) || strlen($post['phone']) < 10 || !is_numeric($post['phone']) )
			        {
			            $labels[] = [
			                'phone',
			                $template = Language::getLang('{$lang.ajax_error_phone}', 'com_payments_terminal', $this->model->pathLanguage)
			            ];
			        }

			        if ( is_null($post['address']) )
			        {
			            $labels[] = [
			                'address',
			                $template = Language::getLang('{$lang.ajax_error_address}', 'com_payments_terminal', $this->model->pathLanguage)
			            ];
			        }

			        if ( is_null($post['country']) )
			        {
			            $labels[] = [
			                'country',
			                $template = Language::getLang('{$lang.ajax_error_country}', 'com_payments_terminal', $this->model->pathLanguage)
			            ];
			        }

			        if ( is_null($post['state']) )
			        {
			            $labels[] = [
			                'state',
			                $template = Language::getLang('{$lang.ajax_error_state}', 'com_payments_terminal', $this->model->pathLanguage)
			            ];
			        }

			        if ( is_null($post['city']) )
			        {
			            $labels[] = [
			                'city',
			                $template = Language::getLang('{$lang.ajax_error_city}', 'com_payments_terminal', $this->model->pathLanguage)
			            ];
			        }

			        if ( is_null($post['postal_code']) )
			        {
			            $labels[] = [
			                'postal_code',
			                $template = Language::getLang('{$lang.ajax_error_postal_code}', 'com_payments_terminal', $this->model->pathLanguage)
			            ];
			        }

			        if ( is_null($post['email']) || Security::checkMail($post['email']) == false )
			        {
			            $labels[] = [
			                'email',
			                $template = Language::getLang('{$lang.ajax_error_email}', 'com_payments_terminal', $this->model->pathLanguage)
			            ];
			        }
				}

				if ( empty($labels) )
		        {
					switch ( $post['payment_method'] )
					{
						case 'paypal':
							$redirect = $this->model->payment_urls('paypal_redirect');
							$page = null;
							break;
						case 'cash':
							Session::setValue('payment_customer_data', $post);
							$redirect = $this->model->payment_urls('oxxopay');
							$page = null;
							break;
						case 'wire_transfer':
							$page = 4;
							break;
						default:
							$page = 1;
							break;
					}

		            echo json_encode([
		                'page' => $page,
						'redirect' => ( isset($redirect) ) ? $redirect : null,
		                'status' => 'success'
		            ]);
		        }
		        else
		        {
		            echo json_encode([
		                'status' => 'error',
		                'labels' => $labels
		            ]);
		        }
			}
			else
			{
				define('_title', Language::getLang('{$lang.payment_gateway}', 'com_titles_page', $this->model->pathLanguage));

				$this->model->routeLayers['main']['file'] = 'gateway';
				$arr = [
					'{$items}' => $this->model->checkout_view_items(),
					'{$amount}' => number_format($this->model->totalAmount, 2, '.', ','),
					'{$currency}' => $this->model->currency()
				];

				$template = $this->view->render('Payment', $this->model->routeLayers);
				$template = $this->format->replace($arr, $template);
				$template = Language::getLang($template, 'com_payments_terminal', $this->model->pathLanguage);

				echo $template;
			}
		}
		else
			$this->model->error();
	}

	public function paypal( $params = '' )
	{
		if ( $params == 'redirect' )
		{
			if ( Session::existsVar('payment_checkout') == true )
			{
				define('_title', Language::getLang('{$lang.payment_paypal}', 'com_titles_page', $this->model->pathLanguage));

				$this->model->routeLayers['main']['file'] = 'paypal';
				$arr = [
					'{$paypal_url}' => $this->model->payment_urls('paypal'),
					'{$inputs_data_paypal}' => $this->model->paypal()
				];

				$template = $this->view->render('Payment', $this->model->routeLayers);
				$template = $this->format->replace($arr, $template);
				$template = Language::getLang($template, 'com_payments_terminal', $this->model->pathLanguage);

				echo $template;
			}
			else
				$this->model->error();
		}
		elseif ( $params == 'ipn' )
		{
			$this->model->paypal('ipn');
		}
		else
			$this->model->error();
	}

	public function oxxopay( $params = '' )
	{
		if ( $params == 'listener' )
		{
			$this->model->oxxopay('listener');
		}
		else
		{
			if ( Session::existsVar('payment_checkout') == true && Session::existsVar('payment_customer_data') == true )
			{
				define('_title', Language::getLang('{$lang.payment_oxxopay}', 'com_titles_page', $this->model->pathLanguage));

				$response = $this->model->oxxopay();

				$this->model->routeLayers['main']['file'] = 'oxxopay';
				$arr = [
					'{$totalAmount}' => $response['totalAmount'],
					'{$referenceHtml}' => $response['html']
				];

				$template = $this->view->render('Payment', $this->model->routeLayers);
				$template = $this->format->replace($arr, $template);
				$template = Language::getLang($template, 'com_payments_terminal', $this->model->pathLanguage);

				echo $template;
			}
			else
				$this->model->error();
		}
	}

	public function cancel()
	{
		if ( Session::existsVar('payment_checkout') == true )
		{
			define('_title', Language::getLang('{$lang.payment_cancel}', 'com_titles_page', $this->model->pathLanguage));

			$this->model->routeLayers['main']['file'] = 'cancel';

			$template = $this->view->render('Payment', $this->model->routeLayers);
			$template = Language::getLang($template, 'com_payments_terminal', $this->model->pathLanguage);

			echo $template;
		}
		else
			$this->model->error();
	}

	public function success()
	{
		if ( Session::existsVar('payment_checkout') == true OR
			Session::existsVar('payment_success') == true)
		{
			Session::unsetValue('payment_checkout');
			Session::unsetValue('payment_success');

			define('_title', Language::getLang('{$lang.payment_success}', 'com_titles_page', $this->model->pathLanguage));

			$this->model->routeLayers['main']['file'] = 'success';

			$template = $this->view->render('Payment', $this->model->routeLayers);
			$template = Language::getLang($template, 'com_payments_terminal', $this->model->pathLanguage);

			echo $template;
		}
		else
			$this->model->error();
	}

	public function create_order()
	{
		if ( Format::existAjaxRequest() == true )
		{
			$post['quantity'] = ( isset($_POST['quantity']) && !empty($_POST['quantity']) ) ? $_POST['quantity'] : null;
			$post['description'] = ( isset($_POST['description']) && !empty($_POST['description']) ) ? $_POST['description'] : null;
			$post['price'] = ( isset($_POST['price']) && !empty($_POST['price']) ) ? $_POST['price'] : null;

			$labels = [];

			if ( is_null($post['quantity']) || $post['quantity'] < 1 )
			{
				$labels[] = [
					'quantity',
					$template = Language::getLang('{$lang.ajax_error_quantity}', 'com_payments_terminal', $this->model->pathLanguage)
				];
			}

			if ( is_null($post['description']) )
			{
				$labels[] = [
					'description',
					$template = Language::getLang('{$lang.ajax_error_description}', 'com_payments_terminal', $this->model->pathLanguage)
				];
			}

			if ( is_null($post['price']) )
			{
				$labels[] = [
					'price',
					$template = Language::getLang('{$lang.ajax_error_price}', 'com_payments_terminal', $this->model->pathLanguage)
				];
			}

			if ( empty($labels) )
			{
				if ( Session::existsVar('payment_checkout') == true )
				{
					$cart = json_decode(Session::getValue('payment_checkout'));
					$cart[] = [
						'item_name' => $post['description'],
						'amount' => $post['price'],
						'quantity' => $post['quantity'],
						'item_number' => $this->security->randomString( 10 )
					];

					Session::setValue('payment_checkout', json_encode($cart));
				}
				else
				{
					Session::setValue("var_tmp", null);
					Session::setValue('payment_checkout', json_encode([
						[
							'item_name' => $post['description'],
							'amount' => $post['price'],
							'quantity' => $post['quantity'],
							'item_number' => $this->security->randomString( 10 )
						]
					]));
				}

				echo json_encode([
					'status' => 'success',
					'redirect' => $this->model->payment_urls()
				]);
			}
			else
			{
				echo json_encode([
					'status' => 'error',
					'labels' => $labels
				]);
			}
		}
		else
		{
			define('_title', Language::getLang('{$lang.payment_create_order}', 'com_titles_page', $this->model->pathLanguage));

			$this->model->routeLayers['main']['file'] = 'create_order';

			$arr = [
				'{$url_clean_order}' => $this->model->payment_urls('clean'),
			];

			$template = $this->view->render('Payment', $this->model->routeLayers);
			$template = $this->format->replace($arr, $template);
			$template = Language::getLang($template, 'com_payments_terminal', $this->model->pathLanguage);

			echo $template;
		}
	}

	public function clean()
	{
		Session::unsetValue('payment_checkout');
		Session::unsetValue('payment_success');
		Session::unsetValue('payment_customer_data');

		header('Location: '. $this->model->payment_urls('create_order'));
	}
}
