<?php

defined('_EXEC') or die;

/**
* @package valkyrie.cms.core.models
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since December 03 - 29, 2018 <@create>
* @version 1.1.0
* @summary (Proyecto)
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

class Team_model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* Selects
	------------------------------------------------------------------------------- */
	public function get($id, $fields = null)
	{
		$fields = (!empty($fields)) ? $fields : '*';

		if ($id == 'all')
		{
			$condition = [
				'ORDER' => [
					'name' => 'ASC'
				]
			];
		}
		else
		{
			$condition = [
				'id_team' => $id
			];
		}

		$query = $this->database->select('team', $fields, $condition);

		if ($id == 'all')
			return Functions::get_decoded_query($query);
		else
			return !empty($query) ? Functions::get_decoded_query($query[0]) : null;
	}

	/* Inserts
	------------------------------------------------------------------------------- */
	public function new($data)
	{
		$data['avatar'] = Functions::uploader($data['avatar'], PATH_UPLOADS, ['png','jpg','jpeg'], 'unlimited');

		if (!empty($data['avatar']))
		{
			$query = $this->database->insert('team', [
				'name' => $data['name'],
				'position' => json_encode($data['position']),
				'semblance' => json_encode($data['semblance']),
				'avatar' => $data['avatar'],
				'priority' => $data['priority']
			]);

			if (!empty($query))
			{
				$query = $this->database->id();

				if (!empty($data['priority']))
				{
					$this->database->update('team', [
						'priority' => null
					], [
						'AND' => [
							'id_team[!]' => $query,
							'priority' => $data['priority']
						]
					]);
				}
			}

			return $query;
		}
		else
			return null;
	}

	/* Updates
	------------------------------------------------------------------------------- */
	public function edit($data)
	{
		$edited = $this->get($data['id_team'], ['avatar','priority']);

		$data['avatar'] = !empty($data['avatar']) ? Functions::uploader($data['avatar'], PATH_UPLOADS, ['png','jpg','jpeg'], 'unlimited') : $edited['avatar'];

		if (!empty($data['avatar']))
		{
			$query = $this->database->update('team', [
                'name' => $data['name'],
				'position' => json_encode($data['position']),
				'semblance' => json_encode($data['semblance']),
				'avatar' => $data['avatar'],
				'priority' => $data['priority']
			], [
				'id_team' => $data['id_team']
			]);

			if (!empty($query))
			{
				if ($data['avatar'] != $edited['avatar'])
					Functions::undoloader($edited['avatar'], PATH_UPLOADS);

				if (!empty($data['priority']) AND $data['priority'] != $edited['priority'])
				{
					$this->database->update('team', [
						'priority' => null
					], [
						'AND' => [
							'id_team[!]' => $data['id_team'],
							'priority' => $data['priority']
						]
					]);
				}
			}

			return $query;
		}
		else
			return null;
	}

	/* Deletes
	------------------------------------------------------------------------------- */
	public function delete($id)
	{
		$deleted = $this->get($id, ['avatar']);

		$query = $this->database->delete('team', [
			'id_team' => $id
		]);

		if (!empty($query))
			Functions::undoloader($deleted['avatar'], PATH_UPLOADS);

		return $query;
	}

	/* Others
	------------------------------------------------------------------------------- */
}
