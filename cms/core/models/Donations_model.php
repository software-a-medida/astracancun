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

class Donations_model extends Model
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
					'description' => 'ASC'
				]
			];
		}
		else
		{
			$condition = [
				'id_donation' => $id
			];
		}

		$query = $this->database->select('donations', $fields, $condition);

		if ($id == 'all')
			return Functions::get_decoded_query($query);
		else
			return !empty($query) ? Functions::get_decoded_query($query[0]) : null;
	}

	/* Inserts
	------------------------------------------------------------------------------- */
	public function new($data)
	{
        $query = $this->database->insert('donations', [
            'description' => json_encode($data['description']),
            'type' => $data['type']
        ]);

        if (!empty($query))
            $query = $this->database->id();

        return $query;
	}

	/* Updates
	------------------------------------------------------------------------------- */
	public function edit($data)
	{
        $query = $this->database->update('donations', [
            'description' => json_encode($data['description']),
            'type' => $data['type']
        ], [
            'id_donation' => $data['id_donation']
        ]);

        return $query;
	}

	/* Deletes
	------------------------------------------------------------------------------- */
	public function delete($id)
	{
		$query = $this->database->delete('donations', [
			'id_donation' => $id
		]);

		return $query;
	}

	/* Others
	------------------------------------------------------------------------------- */
}
