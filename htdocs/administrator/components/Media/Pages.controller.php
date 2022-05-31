<?php namespace BuriPHP\Administrator\Components\Media\Controllers;

defined('_EXEC') or die;

use \BuriPHP\Administrator\Components\Media\{Component};

class Pages
{
	use \BuriPHP\System\Libraries\Controller;

	private $component;

	public function ___construct()
	{
		$this->component = new Component();
	}

	public function view()
	{
        global $data;

		$data = $this->model->get_all();

		define('_title', 'Media - {$_webpage}');

		return $this->view->render(Component::LAYOUTS . 'view.php');
	}
}