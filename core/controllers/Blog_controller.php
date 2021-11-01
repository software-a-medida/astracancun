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

class Blog_controller extends Controller
{
	private $page;
	private $lang;

	public function __construct()
	{
		parent::__construct();

		$this->page = 'blog';
		$this->lang = Session::get_value('lang');
	}

	/**
	* @author Irving Martinez Santiago <Chief Software Development Officer, imartinez@codemonkey.com.mx>
	* @since December 03 - 29, 2018 <@update>
	* @version 1.1.0
	* @summary (Proyecto) Se agrego el aside del autor en el article.
	*/

	/* Ajax: No ajax
	** Render: Blog page
	------------------------------------------------------------------------------- */
	public function index()
	{
		$settings = $this->model->get_settings();

		define('_title', '{$lang.' . $this->page . '} | ' . Configuration::$web_page . ' | ' . $settings['seo']['keywords'][$this->page][$this->lang]);

		$template = $this->view->render($this, 'index');

		$blog = $this->model->get_blog();

		$lst_blog = '';

		foreach ($blog as $value)
		{
			$lst_blog .=
			'<article>
				<header>
					<figure>
						<img src="{$path.uploads}' . $value['cover'] . '" alt="Cover"/>
						<h4>' . $value['name'][$this->lang] . '</h4>
					</figure>
				</header>
				<aside class="author">
					<span class="author-image"><img src="'. (!empty($value['avatar']) ? '{$path.uploads}' . $value['avatar'] : '{$path.images}avatar.png') .'" alt="Avatar"></span>
                    <span class="author-name">' . $value['author'] . '</span>
                    <span class="date">' . $value['date'] . '</span>
				</aside>
				<aside>
					' . Functions::get_shortened_text($value['description'][$this->lang], 100) . '
				</aside>
				<footer>
					<a href="/blog/more/' . $value['id_blog'] . '" class="btn">{$lang.more}</a>
				</footer>
			</article>';
		}

		$replace = [
			'{$seo_keywords}' => $settings['seo']['keywords'][$this->page][$this->lang],
			'{$seo_description}' => $settings['seo']['descriptions'][$this->page][$this->lang],
			'{$cover}' => $settings['covers'][$this->page],
			'{$title}' => $settings['seo']['titles'][$this->page][$this->lang],
			'{$lst_blog}' => $lst_blog
		];

		$template = $this->format->replace($replace, $template);

		echo $template;
	}

	/* Ajax: No ajax
	** Render: Blog more page
	------------------------------------------------------------------------------- */
	public function more($id_blog)
	{
		$blog = $this->model->get_blog_by_id($id_blog);

		define('_title', $blog['name'][$this->lang] . ' | {$lang.' . $this->page . '} | ' . Configuration::$web_page);

		$template = $this->view->render($this, 'more');

		$lst_gallery = '';

		if (!empty($blog['gallery']))
		{
			$lst_gallery .=
			'<div class="cm-gallery-style-1" style="margin-top:50px;">';

			foreach ($blog['gallery'] as $value)
			{
				if ($value['type'] == 'image')
				{
					$lst_gallery .=
					'<figure>
		                <img src="{$path.uploads}' . $value['name'] . '" alt="Gallery" />
						<a href="{$path.uploads}' . $value['name'] . '" class="fancybox-thumb" rel="fancybox-thumb"></a>
	                </figure>';
				}
			}

			$lst_gallery .=
			'</div>';
		}

		$replace = [
			'{$seo_keywords}' => $blog['seo']['keywords'][$this->lang],
			'{$seo_description}' => $blog['seo']['description'][$this->lang],
			'{$cover}' => $blog['cover'],
			'{$name}' => $blog['name'][$this->lang],
			'{$description}' => $blog['description'][$this->lang],
			'{$avatar}' => !empty($blog['avatar']) ? '{$path.uploads}' . $blog['avatar'] : '{$path.images}avatar.png',
			'{$author}' => $blog['author'],
			'{$date}' => $blog['date'],
			'{$lst_gallery}' => $lst_gallery
		];

		$template = $this->format->replace($replace, $template);

		echo $template;
	}
}
