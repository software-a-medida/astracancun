<?php

defined('_EXEC') or die;

/**
* @package valkyrie.core.models
*
* @author Irving Martinez Santiago <Chief Software Development Officer, imartinez@codemonkey.com.mx>
* @since December 03 - 29, 2018 <@create>
* @version 1.1.0
* @summary (Proyecto)
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

class Programs_model extends Model
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
			'videos'
		]);

		return !empty($query) ? Functions::get_decoded_query($query[0]) : null;
	}

	public function get_programs()
	{
		$programs = [];

		$query = $this->database->select('programs', [
			'id_program',
			'name',
			'description',
			'cover'
		], [
			'priority[>=]' => 1,
			'ORDER' => [
				'priority' => 'ASC'
			]
		]);

		foreach ($query as $value)
			array_push($programs, $value);

		$query = $this->database->select('programs', [
			'id_program',
			'name',
			'description',
			'cover'
		], [
			'priority[=]' => null
		]);

		foreach ($query as $value)
			array_push($programs, $value);

		return Functions::get_decoded_query($programs);
	}

	public function get_program_by_id($id_program)
	{
		$query = $this->database->select('programs', [
			'name',
			'description',
			'seo',
			'cover',
			'gallery'
		], [
			'id_program' => $id_program
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
