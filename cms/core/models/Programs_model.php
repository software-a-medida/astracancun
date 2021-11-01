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

class Programs_model extends Model
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
				'id_program' => $id
			];
		}

		$query = $this->database->select('programs', $fields, $condition);

		if ($id == 'all')
			return Functions::get_decoded_query($query);
		else
			return !empty($query) ? Functions::get_decoded_query($query[0]) : null;
	}

	/* Inserts
	------------------------------------------------------------------------------- */
	public function new($data)
	{
		$data['cover'] = Functions::uploader($data['cover'], PATH_UPLOADS, ['png','jpg','jpeg'], 'unlimited');

		if (!empty($data['cover']))
		{
			$query = $this->database->insert('programs', [
				'name' => json_encode($data['name']),
				'description' => json_encode($data['description']),
				'seo' => json_encode($data['seo']),
				'cover' => $data['cover'],
				'priority' => $data['priority']
			]);

			if (!empty($query))
			{
				$query = $this->database->id();

				if (!empty($data['priority']))
				{
					$this->database->update('programs', [
						'priority' => null
					], [
						'AND' => [
							'id_program[!]' => $query,
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
		$edited = $this->get($data['id_program'], ['cover','priority']);

		$data['cover'] = !empty($data['cover']) ? Functions::uploader($data['cover'], PATH_UPLOADS, ['png','jpg','jpeg'], 'unlimited') : $edited['cover'];

		if (!empty($data['cover']))
		{
			$query = $this->database->update('programs', [
				'name' => json_encode($data['name']),
				'description' => json_encode($data['description']),
				'seo' => json_encode($data['seo']),
				'cover' => $data['cover'],
				'priority' => $data['priority']
			], [
				'id_program' => $data['id_program']
			]);

			if (!empty($query))
			{
				if ($data['cover'] != $edited['cover'])
					Functions::undoloader($edited['cover'], PATH_UPLOADS);

				if (!empty($data['priority']) AND $data['priority'] != $edited['priority'])
				{
					$this->database->update('programs', [
						'priority' => null
					], [
						'AND' => [
							'id_program[!]' => $data['id_program'],
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
		$deleted = $this->get($id, ['cover','gallery']);

		$query = $this->database->delete('programs', [
			'id_program' => $id
		]);

		if (!empty($query))
		{
			Functions::undoloader($deleted['cover'], PATH_UPLOADS);

			if (!empty($deleted['gallery']))
				Functions::undoloader($deleted['gallery'], PATH_UPLOADS);
		}

		return $query;
	}

	/* Others
	------------------------------------------------------------------------------- */

	/* Gallery
	------------------------------------------------------------------------------- */
	public function new_gallery($data)
	{
		$data['image'] = Functions::uploader($data['image'], PATH_UPLOADS, ['png','jpg','jpeg'], 'unlimited');

		if (!empty($data['image']))
		{
			$edited = $this->get($data['id_program'], ['gallery']);

			if (!empty($edited['gallery']))
				array_push($edited['gallery'], $data['image']);
			else
			{
				$edited['gallery'] = [];
				array_push($edited['gallery'], $data['image']);
			}

			$query = $this->database->update('programs', [
				'gallery' => json_encode($edited['gallery'])
			], [
				'id_program' => $data['id_program']
			]);

			return $query;
		}
		else
			return null;
	}

	public function delete_gallery($data)
	{
		$edited = $this->get($data['id_program'], ['gallery']);

		$img = $edited['gallery'][$data['image']];

		unset($edited['gallery'][$data['image']]);

		if (count($edited['gallery']) > 0)
		{
			$edited['gallery'] = array_values($edited['gallery']);
			$edited['gallery'] = json_encode($edited['gallery']);
		}
		else
			$edited['gallery'] = null;

		$query = $this->database->update('programs', [
			'gallery' => $edited['gallery']
		], [
			'id_program' => $data['id_program']
		]);

		Functions::undoloader($img, PATH_UPLOADS);

		return $query;
	}
}
