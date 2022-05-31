<?php

namespace BuriPHP\Core\Controllers;

defined('_EXEC') or die;

class Pages
{
	use \BuriPHP\System\Libraries\Controller;

	public function index()
	{
		define('_title', 'Inicio - ' . \BuriPHP\Configuration::$web_page);
		return $this->view->render(PATH_LAYOUTS . 'Pages/index.php');
	}

	public function programs()
	{
		define('_title', 'Nuestros programas - ' . \BuriPHP\Configuration::$web_page);
		return $this->view->render(PATH_LAYOUTS . 'Pages/programs.php');
	}

	public function programsView()
	{
		define('_title', 'Nuestros programas - ' . \BuriPHP\Configuration::$web_page);
		return $this->view->render(PATH_LAYOUTS . 'Pages/programsView.php');
	}

	public function donations()
	{
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