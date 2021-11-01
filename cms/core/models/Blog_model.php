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
	public function get($id, $fields = null)
	{
		$fields = (!empty($fields)) ? $fields : '*';

		if ($id == 'all')
		{
			$query = $this->database->select('blog', [
	            '[>]users' => [
	                'id_user' => 'id_user'
	            ]
	        ], [
				'blog.id_blog',
				'blog.name',
				'blog.date',
				'users.fullname(author)',
				'users.username(authorhash)',
				'blog.cover',
				'blog.priority'
			], [
				'ORDER' => [
					'blog.date' => 'DESC'
				]
			]);
		}
		else
		{
			$query = $this->database->select('blog', $fields, [
				'id_blog' => $id
			]);
		}

		if ($id == 'all')
			return Functions::get_decoded_query($query);
		else
			return !empty($query) ? Functions::get_decoded_query($query[0]) : null;
	}

	public function get_authors()
	{
		$query = $this->database->select('users', [
			'id_user',
			'fullname',
			'username'
		], [
			'status' => true
		]);

		return $query;
	}

	/* Inserts
	------------------------------------------------------------------------------- */
	public function new($data)
	{
		$data['cover'] = Functions::uploader($data['cover'], PATH_UPLOADS, ['png','jpg','jpeg'], 'unlimited');

		if (!empty($data['cover']))
		{
			$query = $this->database->insert('blog', [
				'name' => json_encode($data['name']),
				'description' => json_encode($data['description']),
				'date' => $data['date'],
				'id_user' => $data['id_user'],
				'seo' => json_encode($data['seo']),
				'cover' => $data['cover'],
				'priority' => $data['priority']
			]);

			if (!empty($query))
			{
				$query = $this->database->id();

				if (!empty($data['priority']))
				{
					$this->database->update('blog', [
						'priority' => null
					], [
						'AND' => [
							'id_blog[!]' => $query,
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
		$edited = $this->get($data['id_blog'], ['cover','priority']);

		$data['cover'] = !empty($data['cover']) ? Functions::uploader($data['cover'], PATH_UPLOADS, ['png','jpg','jpeg'], 'unlimited') : $edited['cover'];

		if (!empty($data['cover']))
		{
			$query = $this->database->update('blog', [
				'name' => json_encode($data['name']),
				'description' => json_encode($data['description']),
				'id_user' => $data['id_user'],
				'seo' => json_encode($data['seo']),
				'cover' => $data['cover'],
				'priority' => $data['priority']
			], [
				'id_blog' => $data['id_blog']
			]);

			if (!empty($query))
			{
				if ($data['cover'] != $edited['cover'])
					Functions::undoloader($edited['cover'], PATH_UPLOADS);

				if (!empty($data['priority']) AND $data['priority'] != $edited['priority'])
				{
					$this->database->update('blog', [
						'priority' => null
					], [
						'AND' => [
							'id_blog[!]' => $data['id_blog'],
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

		$query = $this->database->delete('blog', [
			'id_blog' => $id
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
			$edited = $this->get($data['id_blog'], ['gallery']);

			if (!empty($edited['gallery']))
				array_push($edited['gallery'], $data['image']);
			else
			{
				$edited['gallery'] = [];
				array_push($edited['gallery'], $data['image']);
			}

			$query = $this->database->update('blog', [
				'gallery' => json_encode($edited['gallery'])
			], [
				'id_blog' => $data['id_blog']
			]);

			return $query;
		}
		else
			return null;
	}

	public function delete_gallery($data)
	{
		$edited = $this->get($data['id_blog'], ['gallery']);

		$img = $edited['gallery'][$data['image']];

		unset($edited['gallery'][$data['image']]);

		if (count($edited['gallery']) > 0)
		{
			$edited['gallery'] = array_values($edited['gallery']);
			$edited['gallery'] = json_encode($edited['gallery']);
		}
		else
			$edited['gallery'] = null;

		$query = $this->database->update('blog', [
			'gallery' => $edited['gallery']
		], [
			'id_blog' => $data['id_blog']
		]);

		Functions::undoloader($img, PATH_UPLOADS);

		return $query;
	}
}
