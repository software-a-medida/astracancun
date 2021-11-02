<?php
defined('_EXEC') or die;

class Index_controller extends Controller
{
	private $lang;

	public function __construct()
	{
		parent::__construct();
		$this->lang = Session::getValue('lang');
	}

	public function index($payment)
	{
		if (isset($payment) AND !empty($payment))
		{
			if (Format::existAjaxRequest() == true)
			{

			}
			else
			{
				define('_title', '{$vkye_webpage}');

				$template = $this->view->render($this, 'index');
				$template = $this->format->replaceFile($template, 'header');

				$payment = json_decode($payment, true);

				$payment_tmp = $this->model->new_payment_tmp(json_encode($payment['data']));

				Session::setValue('payment_checkout', json_encode($payment['payment']));
				Session::setValue('var_tmp', $payment_tmp);

				header('Location: /' . $this->lang . '/payment');

				$replace = [

				];

				$template = $this->format->replace($replace, $template);

				echo $template;
			}
		}
		else
			header('Location: https://astracancun.org/');
	}

	public function thanks()
	{
		define('_title', '{$vkye_webpage}');

		$template = $this->view->render($this, 'thanks');
		$template = $this->format->replaceFile($template, 'header');

		$replace = [

		];

		$template = $this->format->replace($replace, $template);

		echo $template;
	}
}
