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

class Stories_model extends Model
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
				'id_storie' => $id
			];
		}

		$query = $this->database->select('stories', $fields, $condition);

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
			$query = $this->database->insert('stories', [
				'name' => json_encode($data['name']),
				'description' => json_encode($data['description']),
				'cover' => $data['cover'],
				'priority' => $data['priority']
			]);

			if (!empty($query))
			{
				$query = $this->database->id();

				if (!empty($data['priority']))
				{
					$this->database->update('stories', [
						'priority' => null
					], [
						'AND' => [
							'id_storie[!]' => $query,
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
		$edited = $this->get($data['id_storie'], ['cover','priority']);

		$data['cover'] = !empty($data['cover']) ? Functions::uploader($data['cover'], PATH_UPLOADS, ['png','jpg','jpeg'], 'unlimited') : $edited['cover'];

		if (!empty($data['cover']))
		{
			$query = $this->database->update('stories', [
                'name' => json_encode($data['name']),
				'description' => json_encode($data['description']),
				'cover' => $data['cover'],
				'priority' => $data['priority']
			], [
				'id_storie' => $data['id_storie']
			]);

			if (!empty($query))
			{
				if ($data['cover'] != $edited['cover'])
					Functions::undoloader($edited['cover'], PATH_UPLOADS);

				if (!empty($data['priority']) AND $data['priority'] != $edited['priority'])
				{
					$this->database->update('stories', [
						'priority' => null
					], [
						'AND' => [
							'id_storie[!]' => $data['id_storie'],
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
		$deleted = $this->get($id, ['cover']);

		$query = $this->database->delete('stories', [
			'id_storie' => $id
		]);

		if (!empty($query))
			Functions::undoloader($deleted['cover'], PATH_UPLOADS);

		return $query;
	}

	/* Others
	------------------------------------------------------------------------------- */
}
