<?php namespace BuriPHP\Administrator\Components\Blog\Models;

defined('_EXEC') or die;

use \BuriPHP\System\Libraries\{Session,Component};

class Categories
{
    use \BuriPHP\System\Libraries\Model;

    public function get_list()
    {
        return $this->database->select('blog_categories', [
			'id',
			'title [Object]'
		]);
    }

	public function create( $data = null )
	{
		if ( is_null($data) )
		/*  */ return null;

		if ( !empty($data['image']['name']) )
		{
			$data['image'] = (new Component())->execute([
				"component" => "Media",
				"controller" => "Media",
				"method" => "upload",
				"params" => [
					"action" => "images",
					"data" => $data['image'],
				]
			]);

			$data['image'] = json_decode($data['image'], true)['data'][0]['file'];
		}
		else
		{
			$data['image'] = null;
		}

		$this->database->insert('blog_categories', [
			'title' => ['es' => $data['title_es'], 'en' => $data['title_en']],
			'image' => $data['image'],
			'description' => ['es' => $data['description_es'], 'en' => $data['description_en']],
			'__session' => [
				'user' => Session::get_value('__user'),
				'id' => Session::get_value('__id_user'),
				'token' => Session::get_value('__token')
			],
		]);

		return [
			'id' => $this->database->id(),
			'title' => ['es' => $data['title_es'], 'en' => $data['title_en']],
			'image' => $data['image'],
		];
	}

    public function delete( $data = null )
	{
		if ( is_null($data) )
		/*  */ return null;

		$this->database->delete('blog_categories', [
			'id' => $data['id']
		]);
	}
}
