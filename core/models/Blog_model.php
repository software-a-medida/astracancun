<?php

defined('_EXEC') or die;

/**
* @package valkyrie.core.models
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

class Blog_model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* Selects
	------------------------------------------------------------------------------- */
	public function get_settings()
	{
		$query = $this->database->select('settings', [
			'covers',
			'seo'
		]);

		return !empty($query) ? Functions::get_decoded_query($query[0]) : null;
	}

	public function get_blog()
	{
		$blog = [];

		$query = $this->database->select('blog', [
            '[>]users' => [
                'id_user' => 'id_user'
            ]
        ], [
			'blog.id_blog',
			'blog.name',
			'blog.description',
			'blog.date',
            'users.fullname(author)',
            'users.avatar',
            'blog.cover'
		], [
			'blog.priority[>=]' => 1,
			'ORDER' => [
				'blog.priority' => 'ASC'
			]
		]);

		foreach ($query as $value)
			array_push($blog, $value);

        $query = $this->database->select('blog', [
            '[>]users' => [
                'id_user' => 'id_user'
            ]
        ], [
            'blog.id_blog',
			'blog.name',
			'blog.description',
			'blog.date',
            'users.fullname(author)',
			'users.avatar',
            'blog.cover'
		], [
			'blog.priority[=]' => null
		]);

		foreach ($query as $value)
			array_push($blog, $value);

		return Functions::get_decoded_query($blog);
	}

	public function get_blog_by_id($id_blog)
	{
		$query = $this->database->select('blog', [
            '[>]users' => [
                'id_user' => 'id_user'
            ]
        ], [
			'blog.id_blog',
			'blog.name',
			'blog.description',
			'blog.date',
            'users.fullname(author)',
            'blog.seo',
            'blog.cover',
            'blog.gallery'
		], [
			'blog.id_blog' => $id_blog
		]);

		return !empty($query) ? Functions::get_decoded_query($query[0]) : null;
	}

	/* Inserts
	------------------------------------------------------------------------------- */

	/* Updates
	------------------------------------------------------------------------------- */

	/* Deletes
	------------------------------------------------------------------------------- */

	/* Others
	------------------------------------------------------------------------------- */
}
