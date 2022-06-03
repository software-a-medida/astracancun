<?php

namespace BuriPHP\Core\Controllers;

defined('_EXEC') or die;

use BuriPHP\System\Libraries\{Errors};

class Donations
{
	use \BuriPHP\System\Libraries\Controller;

	public function index()
	{
		global $allies_logos;
		$allies_logos = $this->model->get_gallery(1);

		define('_title', 'Sé un aliado - ' . \BuriPHP\Configuration::$web_page);
		return $this->view->render(PATH_LAYOUTS . 'Donations/index.php');
	}

	public function view($param)
	{
		switch ($param[0]) {
			case 'beca-alumno':
				define('_title', 'Beca a un alumno - ' . \BuriPHP\Configuration::$web_page);
				return $this->view->render(PATH_LAYOUTS . 'Donations/view.php');
				break;

			default:
				Errors::http('404');
				break;
		}
	}
}