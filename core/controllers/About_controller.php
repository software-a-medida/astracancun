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

class About_controller extends Controller
{
	private $page;
	private $lang;

	public function __construct()
	{
		parent::__construct();

		$this->page = 'about';
		$this->lang = Session::get_value('lang');
	}

	/**
	* @author Irving Martinez Santiago <Chief Software Development Officer, imartinez@codemonkey.com.mx>
	* @since December 03 - 29, 2018 <@update>
	* @version 1.1.0
	* @summary (Proyecto) Se agregó la lista de timeline y la lista del equipo
	*/

	/* Ajax: No ajax
	** Render: About page
	------------------------------------------------------------------------------- */
	public function index()
	{
		$settings = $this->model->get_settings();

		define('_title', '{$lang.' . $this->page . '} | ' . Configuration::$web_page . ' | ' . $settings['seo']['keywords'][$this->page][$this->lang]);

		$template = $this->view->render($this, 'index');

		$timeline = $this->model->get_timeline();

		$lst_timeline = '';

		foreach ($timeline as $value)
		{
			$lst_timeline .=
			'<li>
				<div class="m-timeline__date">' . $value['year'] . '</div>
				<p>' . $value['description'][$this->lang] . '</p>
			</li>';
		}

		$team = $this->model->get_team();

		$lst_team = '';

		foreach ($team as $value)
		{
			$lst_team .=
			'<div class="item">
                <figure>
					<img src="{$path.uploads}' . $value['avatar'] . '" alt="Avatar"/>
                </figure>
                <div class="content">
                    <p>' . $value['name'] . '</p>
                    <span>' . $value['position'][$this->lang] . '</span>
                    <p class="semblance">' . $value['semblance'][$this->lang] . '</p>
                </div>
            </div>';
		}

		$replace = [
			'{$seo_keywords}' => $settings['seo']['keywords'][$this->page][$this->lang],
			'{$seo_description}' => $settings['seo']['descriptions'][$this->page][$this->lang],
			'{$cover}' => $settings['covers'][$this->page],
			'{$title}' => $settings['seo']['titles'][$this->page][$this->lang],
			'{$description}' => $settings['about']['description'][$this->lang],
			'{$background1}' => $settings['backgrounds'][$this->page][0],
			'{$history}' => $settings['about']['history'][$this->lang],
			'{$background2}' => $settings['backgrounds'][$this->page][1],
			'{$organ_government}' => $settings['about']['organ_government'][$this->lang],
			'{$mission}' => $settings['about']['mission'][$this->lang],
			'{$vission}' => $settings['about']['vission'][$this->lang],
			'{$values}' => $settings['about']['values'][$this->lang],
			'{$lst_timeline}' => $lst_timeline,
			'{$lst_team}' => $lst_team,
			'{$background3}' => $settings['backgrounds'][$this->page][2],
			'{$video1}' => $settings['videos'][$this->page][0],
			'{$video2}' => $settings['videos'][$this->page][1],
			'{$video3}' => $settings['videos'][$this->page][2],
			'{$video4}' => $settings['videos'][$this->page][3]
		];

		$template = $this->format->replace($replace, $template);

		echo $template;
	}
}
