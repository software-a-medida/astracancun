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

class Timeline_model extends Model
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
					'year' => 'DESC'
				]
			];
		}
		else
		{
			$condition = [
				'id_timeline' => $id
			];
		}

		$query = $this->database->select('timeline', $fields, $condition);

		if ($id == 'all')
			return Functions::get_decoded_query($query);
		else
			return !empty($query) ? Functions::get_decoded_query($query[0]) : null;
	}

	/* Inserts
	------------------------------------------------------------------------------- */
	public function new($data)
	{
        $query = $this->database->insert('timeline', [
            'year' => $data['year'],
            'description' => json_encode($data['description']),
            'priority' => $data['priority']
        ]);

        if (!empty($query))
        {
            $query = $this->database->id();

            if (!empty($data['priority']))
            {
                $this->database->update('timeline', [
                    'priority' => null
                ], [
                    'AND' => [
                        'id_timeline[!]' => $query,
                        'priority' => $data['priority']
                    ]
                ]);
            }
        }

        return $query;
	}

	/* Updates
	------------------------------------------------------------------------------- */
	public function edit($data)
	{
		$edited = $this->get($data['id_timeline'], ['priority']);

        $query = $this->database->update('timeline', [
            'year' => $data['year'],
            'description' => json_encode($data['description']),
            'priority' => $data['priority']
        ], [
            'id_timeline' => $data['id_timeline']
        ]);

        if (!empty($query))
        {
            if (!empty($data['priority']) AND $data['priority'] != $edited['priority'])
            {
                $this->database->update('timeline', [
                    'priority' => null
                ], [
                    'AND' => [
                        'id_timeline[!]' => $data['id_timeline'],
                        'priority' => $data['priority']
                    ]
                ]);
            }
        }

        return $query;
	}

	/* Deletes
	------------------------------------------------------------------------------- */
	public function delete($id)
	{
		$query = $this->database->delete('timeline', [
			'id_timeline' => $id
		]);

		return $query;
	}

	/* Others
	------------------------------------------------------------------------------- */
}
