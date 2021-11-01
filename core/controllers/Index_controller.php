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

class Index_controller extends Controller
{
	private $page;
	private $lang;

	public function __construct()
	{
		parent::__construct();

		$this->page = 'home';
		$this->lang = Session::get_value('lang');
	}

	/**
	* @author Irving Martinez Santiago <Chief Software Development Officer, imartinez@codemonkey.com.mx>
	* @since December 03 - 29, 2018 <1.0.0> <@update>
	* @version 1.1.0
	* @summary (Proyecto) Se agregaron las lista del slideshow, aliados y blog.
	*/

	/* Ajax: No ajax
	** Render: Home page
	------------------------------------------------------------------------------- */
	public function index()
	{
		$settings = $this->model->get_settings();

		define('_title', '{$lang.' . $this->page . '} | ' . Configuration::$web_page . ' | ' . $settings['seo']['keywords'][$this->page][$this->lang]);

		$template = $this->view->render($this, 'index');

		$lst_slideshow = '';

		foreach ($settings['covers'][$this->page] as $value)
		{
			$lst_slideshow .=
			'<div class="item" data-image-src="{$path.uploads}' . $value . '"></div>';
		}

		$allies = $this->model->get_allies();

		$lst_allies = '';

		foreach ($allies as $value)
		{
			$lst_allies .=
			'<div class="item">
				<a href="' . $value['website'] . '" target="_blank"><img src="{$path.uploads}' . $value['logotype'] . '" alt="Logotype"></a>
	        </div>';
		}

		$blog = $this->model->get_blog();

		$lst_blog = '';

		foreach ($blog as $value)
		{
			$lst_blog .=
			'<article>
				<header>
					<figure>
						<img src="{$path.uploads}' . $value['cover'] . '" alt="Cover">
						<h4>' . $value['name'][$this->lang] . '</h4>
					</figure>
				</header>
				<aside class="author">
					<span class="author-image"><img src="'. (!empty($value['avatar']) ? '{$path.uploads}' . $value['avatar'] : '{$path.images}avatar.png') .'" alt="Avatar"></span>
                    <span class="author-name">' . $value['author'] . '</span>
                    <span class="date">' . $value['date'] . '</span>
				</aside>
				<aside>
					<p>' . Functions::get_shortened_text($value['description'][$this->lang], 100) . '</p>
				</aside>
				<footer>
					<a href="/blog/more/' . $value['id_blog'] . '" class="btn">{$lang.more}</a>
				</footer>
			</article>';
		}

		$replace = [
			'{$seo_keywords}' => $settings['seo']['keywords'][$this->page][$this->lang],
			'{$seo_description}' => $settings['seo']['descriptions'][$this->page][$this->lang],
			'{$lst_slideshow}' => $lst_slideshow,
			'{$title}' => $settings['seo']['titles'][$this->page][$this->lang],
			'{$slogan}' => $settings['seo']['titles']['slogan'][$this->lang],
			'{$about_description}' => $settings['about']['description'][$this->lang],
			'{$video}' => $settings['videos'][$this->page][0],
			'{$lst_allies}' => $lst_allies,
			'{$lst_blog}' => $lst_blog
		];

		$template = $this->format->replace($replace, $template);

		echo $template;
	}
}
