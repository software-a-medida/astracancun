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
		global $url;

		$url = $param[0];

		switch ($param[0]) {
			case 'beca-alumno':
				define('_title', 'Beca a un alumno - ' . \BuriPHP\Configuration::$web_page);
				return $this->view->render(PATH_LAYOUTS . 'Donations/view.php');
				break;
			case 'patrocina-atleta':
				define('_title', 'Patrocina a un atleta - ' . \BuriPHP\Configuration::$web_page);
				return $this->view->render(PATH_LAYOUTS . 'Donations/view.php');
				break;
			case 'apadrina-artista':
				define('_title', 'Apadrina un artista - ' . \BuriPHP\Configuration::$web_page);
				return $this->view->render(PATH_LAYOUTS . 'Donations/view.php');
				break;
			case 'dona-especie':
				define('_title', 'Dona en especie - ' . \BuriPHP\Configuration::$web_page);
				return $this->view->render(PATH_LAYOUTS . 'Donations/view.php');
				break;
			case 'dona-dinero':
				define('_title', 'Dona en dinero - ' . \BuriPHP\Configuration::$web_page);
				return $this->view->render(PATH_LAYOUTS . 'Donations/view.php');
				break;
			case 'dona-tiempo':
				define('_title', 'Dona tu tiempo - ' . \BuriPHP\Configuration::$web_page);
				return $this->view->render(PATH_LAYOUTS . 'Donations/view.php');
				break;

			default:
				Errors::http('404');
				break;
		}
	}
}