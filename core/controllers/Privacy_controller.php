<?php

defined('_EXEC') or die;

/**
* @package valkyrie.core.controllers
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since August 01 - 18, 2018 <@create>
* @version 1.0.0
* @summary cm-valkyrie-platform-website-template
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since December 01 - 15, 2018 <@update>
* @version 1.1.0
* @summary cm-valkyrie-platform-website-template
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

class Privacy_controller extends Controller
{
	private $lang;

	public function __construct()
	{
		parent::__construct();

		$this->lang = Session::get_value('lang');
	}

	/* Ajax: No ajax
	** Render: Privacy page
	------------------------------------------------------------------------------- */
	public function index()
	{
		$settings = $this->model->get_settings();

		define('_title', '{$lang.privacy} | ' . Configuration::$web_page);

		$template = $this->view->render($this, 'index');

		$replace = [
			'{$privacy}' => $settings['notices']['privacy'][$this->lang]
		];

		$template = $this->format->replace($replace, $template);

		echo $template;
	}
}
