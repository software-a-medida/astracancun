<?php namespace BuriPHP\Administrator\Components\Media\Models;

defined('_EXEC') or die;

use \BuriPHP\System\Libraries\{Session};

class Media
{
    use \BuriPHP\System\Libraries\Model;

    public function register( $data = null )
	{
		if ( is_null($data) )
			return false;

		$this->database->insert('media', [
			'type' => $data['mime'],
			'media' => $data['file'],
			'__session' => [
				'user' => Session::get_value('__user'),
				'id' => Session::get_value('__id_user'),
				'token' => Session::get_value('__token')
			],
		]);

		return $this->database->id();
	}

    public function delete( $data )
	{
		$name = $this->database->select('media', [
			'media'
		], [
			'id' => $data['id']
		]);

		unlink(PATH_UPLOADS . pathinfo(PATH_UPLOADS . $name[0]['media'], PATHINFO_FILENAME) .'_thumb.'. pathinfo(PATH_UPLOADS . $name[0]['media'], PATHINFO_EXTENSION));
		unlink(PATH_UPLOADS . $name[0]['media']);

		$this->database->delete('media', [
			'id' => $data['id']
		]);

        return [
            'status' => 'OK',
            'file' => $name[0]['media']
        ];
	}
}
