<?php

defined('_EXEC') or die;

/**
* @package valkyrie.cms.core.models
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
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since December 03 - 29, 2018 <@update>
* @version 1.1.0
* @summary (Proyecto)
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

class Settings_model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* Selects
	------------------------------------------------------------------------------- */
	public function get_settings()
	{
		$query = $this->database->select('settings', '*');

		return Functions::get_decoded_query($query[0]);
	}

	/* Inserts
	------------------------------------------------------------------------------- */

	/* Updates
	------------------------------------------------------------------------------- */
	public function edit_logotypes($file, $logotypes, $action)
	{
		$edited = Functions::get_decoded_query($this->database->select('settings', [
			'logotypes'
		])[0]);

		$logotypes[$action] = Functions::uploader($file, PATH_UPLOADS, ['png','jpg','jpeg'], 'unlimited');

		$query = $this->database->update('settings', [
			'logotypes' => json_encode($logotypes)
		]);

		if (!empty($query))
			unlink('../uploads/' . $edited['logotypes'][$action]);

		return $query;
	}

	public function edit_covers($file, $covers, $action, $option)
	{
		if ($action == 'programs' OR $action == 'donations' OR $action == 'blog' OR $action == 'about' OR $action == 'contact')
		{
			$edited = Functions::get_decoded_query($this->database->select('settings', [
				'covers'
			])[0]);

			$covers[$action] = Functions::uploader($file, PATH_UPLOADS, ['png','jpg','jpeg'], 'unlimited');
		}
		else if ($action == 'home')
		{
			if ($option == 'edit')
				array_push($covers['home'], Functions::uploader($file, PATH_UPLOADS, ['png','jpg','jpeg'], 'unlimited'));
			else if ($option == 'delete')
			{
				$deleted = $covers['home'][$file];
				unset($covers['home'][$file]);
				$covers['home'] = array_values($covers['home']);
			}
		}

		$query = $this->database->update('settings', [
			'covers' => json_encode($covers)
		]);

		if ($action == 'programs' OR $action == 'donations' OR $action == 'blog' OR $action == 'about' OR $action == 'contact')
		{
			if (!empty($query))
				unlink('../uploads/' . $edited['covers'][$action]);
		}
		else if ($action == 'home' AND $option == 'delete' AND !empty($query))
			unlink('../uploads/' . $deleted);

		return $query;
	}

	public function edit_backgrounds($file, $backgrounds, $action, $option)
	{
		$edited = $backgrounds;

		$backgrounds[$action][$option] = Functions::uploader($file, PATH_UPLOADS, ['png','jpg','jpeg'], 'unlimited');

		$query = $this->database->update('settings', [
			'backgrounds' => json_encode($backgrounds)
		]);

		if (!empty($query))
			unlink('../uploads/' . $edited[$action][$option]);

		return $query;
	}

	public function edit_videos($videos)
	{
		$query = $this->database->update('settings', [
			'videos' => json_encode($videos)
		]);

		return $query;
	}

	public function edit_contact($contact)
	{
		$query = $this->database->update('settings', [
			'contact' => json_encode($contact)
		]);

		return $query;
	}

	public function edit_about($about)
	{
		$query = $this->database->update('settings', [
			'about' => json_encode($about)
		]);

		return $query;
	}

	public function edit_notices($notices)
	{
		$query = $this->database->update('settings', [
			'notices' => json_encode($notices)
		]);

		return $query;
	}

	public function edit_seo($seo)
	{
		$query = $this->database->update('settings', [
			'seo' => json_encode($seo)
		]);

		return $query;
	}

	/* Deletes
	------------------------------------------------------------------------------- */

	/* Others
	------------------------------------------------------------------------------- */
}
