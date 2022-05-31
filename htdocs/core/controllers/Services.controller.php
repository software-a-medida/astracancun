<?php

namespace BuriPHP\Core\Controllers;

defined('_EXEC') or die;

use BuriPHP\System\Libraries\{Errors};

class Services
{
	use \BuriPHP\System\Libraries\Controller;

	public function index()
	{
		global $services;
		$services = $this->model->get();

		define('_title', 'Nuestros programas - ' . \BuriPHP\Configuration::$web_page);
		return $this->view->render(PATH_LAYOUTS . 'Services/index.php');
	}

	public function view($param)
	{
		$response = $this->model->get($param[0]);

		if (count($response) > 0) {
			global $data;
			$data = $response[0];

			define('_title', 'Nuestros programas - ' . \BuriPHP\Configuration::$web_page);
			return $this->view->render(PATH_LAYOUTS . 'Services/view.php');
		} else {
			Errors::http('404');
		}
	}
}