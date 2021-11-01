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

class Donations_model extends Model
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
			'logotypes',
			'covers',
			'seo',
			'contact',
			'videos',
			'donate_min_amount'
		]);

		return !empty($query) ? Functions::get_decoded_query($query[0]) : null;
	}

	public function get_donations_by_type($type)
	{
		$query = $this->database->select('donations', [
			'id_donation',
			'description'
		], [
			'type' => $type
		]);

		return Functions::get_decoded_query($query);
	}

	public function get_donation_by_id($id_donation)
	{
		$query = $this->database->select('donations', [
			'id_donation',
			'description'
		], [
			'id_donation' => $id_donation
		]);

		return !empty($query) ? Functions::get_decoded_query($query[0]) : null;
	}

	public function get_allies()
	{
		$allies = [];

		$query = $this->database->select('allies', [
			'logotype',
			'website'
		], [
			'priority[>=]' => 1,
			'ORDER' => [
				'priority' => 'ASC'
			]
		]);

		foreach ($query as $value)
			array_push($allies, $value);

		$query = $this->database->select('allies', [
			'logotype',
			'website'
		], [
			'priority[=]' => null
		]);

		foreach ($query as $value)
			array_push($allies, $value);

		return $allies;
	}

	public function get_stories()
	{
		$stories = [];

		$query = $this->database->select('stories', [
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
			array_push($stories, $value);

		$query = $this->database->select('stories', [
			'name',
			'description',
			'cover'
		], [
			'priority[=]' => null
		]);

		foreach ($query as $value)
			array_push($stories, $value);

		return Functions::get_decoded_query($stories);
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
