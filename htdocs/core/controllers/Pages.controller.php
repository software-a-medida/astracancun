<?php

namespace BuriPHP\Core\Controllers;

defined('_EXEC') or die;

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