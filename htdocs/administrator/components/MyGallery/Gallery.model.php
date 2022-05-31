<?php namespace BuriPHP\Administrator\Components\MyGallery\Models;

defined('_EXEC') or die;

class Gallery
{
    use \BuriPHP\System\Libraries\Model;

	public function get_all_galleries()
	{
		$response = $this->database->select('mygalleries', [
			'id',
			'name',
			'description',
			'ids [Object]',
		], [
			'ORDER' => [
				'id' => 'DESC'
			]
		]);

		foreach ( $response as $key => $value )
		{
			$response[$key]['media'] = $this->database->select('media', [
				'id',
				'media (image)',
			],[
				'id' => $response[$key]['ids']
			]);
		}

		return $response;
	}

	public function get_gallery( $id = null )
	{
		if ( is_null($id) )
			return false;

		$response = $this->database->select('mygalleries', [
			'id',
			'name',
			'description',
			'ids [Object]',
		], [
			'id' => $id
		]);

		foreach ( $response as $key => $value )
		{
			$response[$key]['media'] = $this->database->select('media', [
				'id',
				'media (image)',
			],[
				'id' => $response[$key]['ids']
			]);
		}

		return $response;
	}

    public function get_all_media($var = null)
	{
		return $this->database->select('media', [
			'id',
			'type',
			'media',
			'date',
		], [
			'ORDER' => [
				'date' => 'DESC'
			]
		]);
	}

	public function create( $data = null )
	{
		if ( is_null($data) )
			return false;

		$this->database->insert('mygalleries', $data);

		return $this->database->id();
	}

	public function update( $data = null, $id = null )
	{
		if ( is_null($data) )
			return false;

		if ( is_null($id) )
			return false;

		$this->database->update('mygalleries', $data, [
			'id' => $id
		]);
	}

	public function delete( $data )
	{
		$this->database->delete('mygalleries', [
			'id' => $data['id']
		]);
	}
}
