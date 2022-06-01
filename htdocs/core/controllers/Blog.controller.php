<?php

namespace BuriPHP\Core\Controllers;

defined('_EXEC') or die;

use BuriPHP\System\Libraries\{Errors};

class Blog
{
	use \BuriPHP\System\Libraries\Controller;

	public function index()
	{
		global $blog;
		$blog = $this->model->get();

		define('_title', 'Blog - ' . \BuriPHP\Configuration::$web_page);
		return $this->view->render(PATH_LAYOUTS . 'Blog/index.php');
	}

	public function view($param)
	{
		$response = $this->model->get($param[0]);

		if (count($response) > 0) {
			global $data;
			$data = $response[0];

			define('_title', $data['title'] . ' - ' . \BuriPHP\Configuration::$web_page);
			return $this->view->render(PATH_LAYOUTS . 'Blog/view.php');
		} else {
			Errors::http('404');
		}
	}
}