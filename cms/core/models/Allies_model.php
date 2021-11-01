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

class Allies_model extends Model
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
				'id_allie' => $id
			];
		}

		$query = $this->database->select('allies', $fields, $condition);

		if ($id == 'all')
			return $query;
		else
			return !empty($query) ? $query[0] : null;
	}

	/* Inserts
	------------------------------------------------------------------------------- */
	public function new($data)
	{
		$data['logotype'] = Functions::uploader($data['logotype'], PATH_UPLOADS, ['png','jpg','jpeg'], 'unlimited');

		if (!empty($data['logotype']))
		{
			$query = $this->database->insert('allies', [
				'name' => $data['name'],
				'logotype' => $data['logotype'],
				'website' => $data['website'],
				'priority' => $data['priority']
			]);

			if (!empty($query))
			{
				$query = $this->database->id();

				if (!empty($data['priority']))
				{
					$this->database->update('allies', [
						'priority' => null
					], [
						'AND' => [
							'id_allie[!]' => $query,
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
		$edited = $this->get($data['id_allie'], ['logotype','priority']);

		$data['logotype'] = !empty($data['logotype']) ? Functions::uploader($data['logotype'], PATH_UPLOADS, ['png','jpg','jpeg'], 'unlimited') : $edited['logotype'];

		if (!empty($data['logotype']))
		{
			$query = $this->database->update('allies', [
				'name' => $data['name'],
				'logotype' => $data['logotype'],
				'website' => $data['website'],
				'priority' => $data['priority']
			], [
				'id_allie' => $data['id_allie']
			]);

			if (!empty($query))
			{
				if ($data['logotype'] != $edited['logotype'])
					Functions::undoloader($edited['logotype'], PATH_UPLOADS);

				if (!empty($data['priority']) AND $data['priority'] != $edited['priority'])
				{
					$this->database->update('allies', [
						'priority' => null
					], [
						'AND' => [
							'id_allie[!]' => $data['id_allie'],
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
		$deleted = $this->get($id, ['logotype']);

		$query = $this->database->delete('allies', [
			'id_allie' => $id
		]);

		if (!empty($query))
			Functions::undoloader($deleted['logotype'], PATH_UPLOADS);

		return $query;
	}

	/* Others
	------------------------------------------------------------------------------- */
}
