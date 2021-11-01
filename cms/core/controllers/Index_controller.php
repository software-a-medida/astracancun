<?php

defined('_EXEC') or die;

/**
* @package valkyrie.cms.core.controllers
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since August 01 - 18, 2018 <@create>
* @version 1.0.0
* @summary cm-valkyrie-platform-website-template
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

class Index_controller extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	/* Ajax: No action
	** Render: Home page
	------------------------------------------------------------------------------- */
	public function index()
	{
		if (Format::exist_ajax_request() == true)
		{

		}
		else
		{
			define('_title', '{$lang.title}');

			$template = $this->view->render($this, 'index');

			echo $template;
		}
	}

	/* Ajax: No ajax
	** Render: Unavailable page
	------------------------------------------------------------------------------- */
	public function unavailable()
	{
		define('_title', '{$lang.title}');

		$template = $this->view->render($this, 'unavailable');

		echo $template;
	}
}
