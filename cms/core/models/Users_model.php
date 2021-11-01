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

class Users_model extends Model
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
			$query = $this->database->select('users', [
	            '[>]users_levels' => [
	                'id_user_level' => 'id_user_level'
	            ]
	        ], [
				'users.id_user',
				'users.fullname',
				'users_levels.name(level)',
				'users.avatar',
				'users.status'
			], [
				'ORDER' => [
					'users.fullname' => 'ASC'
				]
			]);
		}
		else
		{
			$query = $this->database->select('users', $fields, [
				'id_user' => $id
			]);
		}

		if ($id == 'all')
			return $query;
		else
			return !empty($query) ? $query[0] : null;
	}

	public function get_users_levels()
	{
		$query = $this->database->select('users_levels', [
			'id_user_level',
			'name'
		], [
			'ORDER' => [
				'priority' => 'ASC'
			]
		]);

		return $query;
	}

	/* Inserts
	------------------------------------------------------------------------------- */
	public function new($data)
	{
		if (!empty($data['avatar']))
			$data['avatar'] = Functions::uploader($data['avatar'], PATH_UPLOADS, ['png','jpg','jpeg'], 'unlimited');

		$query = $this->database->insert('users', [
			'fullname' => $data['fullname'],
			'email' => $data['email'],
			'username' => $data['username'],
			'password' => $data['password'],
			'id_user_level' => $data['id_user_level'],
			'avatar' => $data['avatar'],
			'status' => $data['status']
		]);

		if (!empty($query))
			$query = $this->database->id();

		return $query;
	}

	/* Updates
	------------------------------------------------------------------------------- */
	public function edit($data)
	{
		$edited = $this->get($data['id_user'], ['avatar']);

		$data['avatar'] = !empty($data['avatar']) ? Functions::uploader($data['avatar'], PATH_UPLOADS, ['png','jpg','jpeg'], 'unlimited') : $edited['avatar'];

		$query = $this->database->update('users', [
			'fullname' => $data['fullname'],
			'email' => $data['email'],
			'username' => $data['username'],
			'id_user_level' => $data['id_user_level'],
			'avatar' => $data['avatar'],
			'status' => $data['status']
		], [
			'id_user' => $data['id_user']
		]);

		if (!empty($query))
		{
			if ($data['avatar'] != $edited['avatar'])
				Functions::undoloader($edited['avatar'], PATH_UPLOADS);
		}

		return $query;
	}

	public function restore($data)
	{
		$query = $this->database->update('users', [
			'password' => $data['password']
		], [
			'id_user' => $data['id_user']
		]);

		return $query;
	}

	/* Deletes
	------------------------------------------------------------------------------- */
	public function delete($id)
	{
		$deleted = $this->get($id, ['avatar']);

		$query = $this->database->delete('users', [
			'id_user' => $id
		]);

		if (!empty($query))
			Functions::undoloader($deleted['avatar'], PATH_UPLOADS);

		return $query;
	}

	/* Others
	------------------------------------------------------------------------------- */
}
