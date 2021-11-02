<?php
defined('_EXEC') or die;

class Index_model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function new_payment_tmp($data)
	{
		$query = $this->database->insert('com_payment_tmp', [
			'data' => $data
		]);

		if (isset($query) AND !empty($query))
			$id = $this->database->id($query);
		else
			$id = null;

		return $id;
	}
}
