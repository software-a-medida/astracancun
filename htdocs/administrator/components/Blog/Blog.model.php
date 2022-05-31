<?php namespace BuriPHP\Administrator\Components\Blog\Models;

defined('_EXEC') or die;

use \BuriPHP\System\Libraries\{Session,Security,Component};

class Blog
{
    use \BuriPHP\System\Libraries\Model;

	public function get( $id = null )
	{
		$where = [
			'status[!]' => 'removed',
			'ORDER' => [
				'blog.publication_date' => 'DESC'
			]
		];

		if ( !is_null($id) )
		{
			$where['blog.id'] = $id;
		}

		return $this->database->select("blog", [
			"[>]blog_categories" => [
				"id_category" => "id"
			],
			"[>]users" => [
				"author" => "id"
			]
		], [
			'blog.id',
			'blog.url',
			'blog.title',
			'blog_categories.title(category) [Object] ',
			'blog.id_category',
			'blog.image',
			'blog.content',
			'blog.sm_title',
			'blog.sm_description',
			'blog.sm_image',
			'blog.tags [Object]',
			'blog.status',
			'blog.publication_date',
			'users.username',
		], $where);
	}

    public function save( $data = [], $edit = false )
	{
		if ( empty($data) )
		/*  */ return null;

		$save = [
			'title' => $data['title'],
			'id_category' => $data['category'],
			'content' => json_encode($data['description']),
			'tags' => ( !is_null($data['tags']) ) ? explode(',', trim($data['tags'], ',')) : null,
			'author' => Session::get_value('__id_user'),
			'sm_title' => $data['sm_title'],
			'sm_description' => $data['sm_description']
		];

		$component = new Component();

		if ( !empty($data['image_cover']['name']) )
		{
			$data['image_cover'] = $component->execute([
				"component" => "Media",
				"controller" => "Media",
				"method" => "upload",
				"params" => [
					"action" => "images",
					"data" => $data['image_cover'],
				]
			]);

			$save['image'] = json_decode($data['image_cover'], true)['data'][0]['file'];
		}

		if ( !empty($data['sm_image_cover']['name']) )
		{
			$data['sm_image_cover'] = $component->execute([
				"component" => "Media",
				"controller" => "Media",
				"method" => "upload",
				"params" => [
					"action" => "images",
					"data" => $data['sm_image_cover'],
				]
			]);

			$save['sm_image'] = json_decode($data['sm_image_cover'], true)['data'][0]['file'];
		}

		if ( $edit == false )
		{
			$data['url'] = $this->security->clean_string($data['title']);
			$data['url'] = str_replace('_', '-', $data['url']);
			$save['url'] = strtolower($data['url']);
			
			$save['__session'] = [
				'user' => Session::get_value('__user'),
				'id' => Session::get_value('__id_user'),
				'token' => Session::get_value('__token')
			];

			$this->database->insert('blog', $save);

			if ( $this->database->id() )
			/*  */ return [ 'status' => 'OK' ];
			else
			{
				return [
					'status' => 'error',
					'message' => 'Ocurrió un problema al guardar el artículo.'
				];
			}
		}

		if ( $edit == true )
		{
			$this->database->update('blog', $save, [
				'id' => $data['id']
			]);

			return [ 'status' => 'OK' ];
		}
	}

	public function delete( $data )
	{
		$this->database->update('blog', [
			'status' => 'removed'
		],[
			'id' => $data['id']
		]);
	}
}
