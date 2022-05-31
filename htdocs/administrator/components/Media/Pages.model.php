<?php namespace BuriPHP\Administrator\Components\Media\Models;

defined('_EXEC') or die;

use \BuriPHP\System\Libraries\{Session};

class Pages
{
    use \BuriPHP\System\Libraries\Model;

	public function get_all(Type $var = null)
	{
		return $this->database->select("media", [
			"id",
			"type",
			"media",
			"date",
		], [
			"type[~]" => "image/%",
			"ORDER" => [
				"date" => "DESC"
			]
		]);
	}
}
