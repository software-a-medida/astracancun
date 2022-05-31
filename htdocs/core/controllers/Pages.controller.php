<?php

namespace BuriPHP\Core\Controllers;

defined('_EXEC') or die;

use BuriPHP\System\Libraries\{Errors};

class Pages
{
	use \BuriPHP\System\Libraries\Controller;

	public function index()
	{
		global $allies_logos;
		$allies_logos = $this->model->get_gallery(1);

		define('_title', 'Inicio - ' . \BuriPHP\Configuration::$web_page);
		return $this->view->render(PATH_LAYOUTS . 'Pages/index.php');
	}

	public function programs()
	{
		global $services;
		$services = $this->model->get_services();

		define('_title', 'Nuestros programas - ' . \BuriPHP\Configuration::$web_page);
		return $this->view->render(PATH_LAYOUTS . 'Pages/programs.php');
	}

	public function programsView($param)
	{
		$response = $this->model->get_services($param[0]);

		if (count($response) > 0) {
			global $data;
			$data = $response[0];

			define('_title', 'Nuestros programas - ' . \BuriPHP\Configuration::$web_page);
			return $this->view->render(PATH_LAYOUTS . 'Pages/programsView.php');
		} else {
			Errors::http('404');
		}
	}

	public function donations()
	{
		global $allies_logos;
		$allies_logos = $this->model->get_gallery(1);

		define('_title', 'Sé un aliado - ' . \BuriPHP\Configuration::$web_page);
		return $this->view->render(PATH_LAYOUTS . 'Pages/donations.php');
	}

	public function about()
	{
		define('_title', 'Sé un aliado - ' . \BuriPHP\Configuration::$web_page);
		return $this->view->render(PATH_LAYOUTS . 'Pages/about.php');
	}

	public function contact()
	{
		define('_title', 'Sé un aliado - ' . \BuriPHP\Configuration::$web_page);
		return $this->view->render(PATH_LAYOUTS . 'Pages/contact.php');
	}
}