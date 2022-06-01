<?php

namespace BuriPHP\Core\Controllers;

defined('_EXEC') or die;

class Blog
{
	use \BuriPHP\System\Libraries\Controller;

	public function index()
	{
		global $blog;
		$blog = $this->model->get();

		define('_title', 'Inicio - ' . \BuriPHP\Configuration::$web_page);
		return $this->view->render(PATH_LAYOUTS . 'Blog/index.php');
	}

	public function view()
	{
		define('_title', 'Inicio - ' . \BuriPHP\Configuration::$web_page);
		return $this->view->render(PATH_LAYOUTS . 'Blog/view.php');
	}
}