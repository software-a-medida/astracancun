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
* @summary (Proyecto) Se anexaron los campos de backgrounds y videos en la consulta de configuraciones. Se agregaron las funciones para obtener las listas del timeline y del equipo. 
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

class About_model extends Model
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
			'backgrounds',
			'seo',
			'about',
			'videos'
		]);

		return !empty($query) ? Functions::get_decoded_query($query[0]) : null;
	}

	public function get_timeline()
	{
		$query = $this->database->select('timeline', [
			'year',
			'description'
		], [
			'ORDER' => [
				'priority' => 'ASC'
			]
		]);

		return Functions::get_decoded_query($query);
	}

	public function get_team()
	{
		$team = [];

		$query = $this->database->select('team', [
			'name',
			'position',
			'semblance',
			'avatar'
		], [
			'priority[>=]' => 1,
			'ORDER' => [
				'priority' => 'ASC'
			]
		]);

		foreach ($query as $value)
			array_push($team, $value);

		$query = $this->database->select('team', [
			'name',
			'position',
			'semblance',
			'avatar'
		], [
			'priority' => null
		]);

		foreach ($query as $value)
			array_push($team, $value);

		return Functions::get_decoded_query($team);
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
