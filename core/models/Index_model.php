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
* @author Irving Martinez Santiago <Chief Software Development Officer, imartinez@codemonkey.com.mx>
* @since December 03 - 29, 2018 <@update>
* @version 1.1.0
* @summary (Proyecto) Se agregaron los campos de backgrounds, about y videos en la consulta de configuraciones. Se agregaron las funciones para obtener las listas de aliados y blog.
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

class Index_model extends Model
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
			'seo',
			'about',
			'videos'
		]);

		return !empty($query) ? Functions::get_decoded_query($query[0]) : null;
	}

	public function get_allies()
	{
		$query = $this->database->select('allies', [
			'logotype',
			'website'
		], [
			'priority[>=]' => 1,
			'ORDER' => [
				'priority' => 'ASC'
			],
			'LIMIT' => 8
		]);

		return $query;
	}

	public function get_blog()
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
            'users.avatar',
            'blog.cover'
		], [
			'priority[>=]' => 1,
			'ORDER' => [
				'priority' => 'ASC'
			],
			'LIMIT' => 3
		]);

		return Functions::get_decoded_query($query);
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
