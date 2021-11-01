<?php

defined('_EXEC') or die;

/**
* @package valkyrie.core.controllers
*
* @author Irving Martinez Santiago <Chief Software Development Officer, imartinez@codemonkey.com.mx>
* @since December 03 - 29, 2018 <@create>
* @version 1.1.0
* @summary (Proyecto)
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

class Programs_controller extends Controller
{
	private $page;
	private $lang;

	public function __construct()
	{
		parent::__construct();

		$this->page = 'programs';
		$this->lang = Session::get_value('lang');
	}

	/* Ajax: No ajax
	** Render: Programs page
	------------------------------------------------------------------------------- */
	public function index()
	{
		$settings = $this->model->get_settings();

		define('_title', '{$lang.' . $this->page . '} | ' . Configuration::$web_page . ' | ' . $settings['seo']['keywords'][$this->page][$this->lang]);

		$template = $this->view->render($this, 'index');

		$programs = $this->model->get_programs();

		$lst_programs = '';

		$count = 1;

		foreach ($programs as $value)
		{
			$lst_programs .=
			'<article ' . (($count >= 4) ? 'class="twin"' : '') . '>
				<header>
					<figure>
						<img src="{$path.uploads}' . $value['cover'] . '" alt="Cover"/>
						<h4>' . $value['name'][$this->lang] . '</h4>
					</figure>
				</header>
				<aside>
					' . Functions::get_shortened_text($value['description'][$this->lang], 100) . '
				</aside>
				<footer>
					<a href="/programs/more/' . $value['id_program'] . '" class="btn">{$lang.more}</a>
				</footer>
			</article>';

			$count = $count + 1;
		}

		$replace = [
			'{$seo_keywords}' => $settings['seo']['keywords'][$this->page][$this->lang],
			'{$seo_description}' => $settings['seo']['descriptions'][$this->page][$this->lang],
			'{$cover}' => $settings['covers'][$this->page],
			'{$title}' => $settings['seo']['titles'][$this->page][$this->lang],
			'{$lst_programs}' => $lst_programs,
			'{$video}' => $settings['videos']['programs'][0]
		];

		$template = $this->format->replace($replace, $template);

		echo $template;
	}

	/* Ajax: No ajax
	** Render: Programs more page
	------------------------------------------------------------------------------- */
	public function more($id_program)
	{
		$program = $this->model->get_program_by_id($id_program);

		define('_title', $program['name'][$this->lang] . ' | {$lang.' . $this->page . '} | ' . Configuration::$web_page);

		$template = $this->view->render($this, 'more');

		$lst_gallery = '';

		if (!empty($program['gallery']))
		{
			$lst_gallery .=
			'<div class="cm-gallery-style-1" style="margin-top:50px;">';

			foreach ($program['gallery'] as $value)
			{
				if ($value['type'] == 'image')
				{
					$lst_gallery .=
					'<figure>
		                <img src="{$path.uploads}/' . $value['name'] . '" alt="Gallery" />
						<a href="{$path.uploads}/' . $value['name'] . '" class="fancybox-thumb" rel="fancybox-thumb"><i class="material-icons">open_with</i></a>
	                </figure>';
				}
			}

			$lst_gallery .=
			'</div>';
		}

		$replace = [
			'{$seo_keywords}' => $program['seo']['keywords'][$this->lang],
			'{$seo_description}' => $program['seo']['description'][$this->lang],
			'{$cover}' => $program['cover'],
			'{$name}' => $program['name'][$this->lang],
			'{$description}' => $program['description'][$this->lang],
			'{$lst_gallery}' => $lst_gallery
		];

		$template = $this->format->replace($replace, $template);

		echo $template;
	}
}
