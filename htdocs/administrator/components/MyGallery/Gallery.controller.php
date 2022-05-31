<?php namespace BuriPHP\Administrator\Components\MyGallery\Controllers;

defined('_EXEC') or die;

use \BuriPHP\System\Libraries\{Format,Session,Errors};
use \BuriPHP\Administrator\Components\MyGallery\{Component};

class Gallery
{
	use \BuriPHP\System\Libraries\Controller;

	private $component;

	public function ___construct()
	{
		$this->component = new Component();
	}

    public function index()
    {
		global $galleries;

        define('_title', 'Mis galerías {$_webpage}');

		$galleries = $this->model->get_all_galleries();

		return $this->view->render(Component::LAYOUTS . 'index.php');
    }

    public function list()
    {
		header('Content-type: application/json');

        return json_encode([
            'status' => 'OK',
            'list' => $this->model->get_all_galleries()
        ], JSON_PRETTY_PRINT);
    }

    public function create()
    {
		/* Action Ajax ------------------------------------------------------ */
		if ( Format::exist_ajax_request() )
		{
			$post['title'] = ( isset($_POST['title']) && !empty($_POST['title']) ) ? $_POST['title'] : null;
			$post['description'] = ( isset($_POST['description']) && !empty($_POST['description']) ) ? $_POST['description'] : null;
			$post['image_id'] = ( isset($_POST['image_id']) && !empty($_POST['image_id']) ) ? $_POST['image_id'] : [];

			$labels = [];

			if ( is_null($post['title']) || strlen($post['title']) < 2 )
			/*  */ array_push($labels, ['title', 'Escribe un título con más de 2 caracteres.']);

			if ( empty($post['image_id']) )
			{
				return json_encode([
					'status' => 'error',
					'message' => 'Se requiere seleccionar al menos una imágen.'
				], JSON_PRETTY_PRINT);
			}
			else if ( !empty($labels) )
			{
				return json_encode([
					'status' => 'labels_error',
					'labels' => $labels
				], JSON_PRETTY_PRINT);
			}
			else
			{
				$this->model->create([
					'name' => $post['title'],
					'description' => $post['description'],
					'ids' => $post['image_id'],
					'__session' => [
						'user' => Session::get_value('__user'),
						'id' => Session::get_value('__id_user'),
						'token' => Session::get_value('__token')
					]
				]);

				return json_encode([
					'status' => 'OK',
					'redirect' => 'index.php/gallery'
				], JSON_PRETTY_PRINT);
			}
		}
		else
		{
			global $images;

			define('_title', 'Nueva galería {$_webpage}');

			$images = $this->model->get_all_media();

			return $this->view->render(Component::LAYOUTS . 'create.php');
		}
    }

	public function update()
    {
		if ( isset($_GET['id']) && !empty($_GET['id']) )
		{
			$response = $this->model->get_gallery($_GET['id']);

			if ( isset($response) && !empty($response) )
			{
				/* Action Ajax ------------------------------------------------------ */
				if ( Format::exist_ajax_request() )
				{
					$post['title'] = ( isset($_POST['title']) && !empty($_POST['title']) ) ? $_POST['title'] : null;
					$post['description'] = ( isset($_POST['description']) && !empty($_POST['description']) ) ? $_POST['description'] : null;
					$post['image_id'] = ( isset($_POST['image_id']) && !empty($_POST['image_id']) ) ? $_POST['image_id'] : [];

					$labels = [];

					if ( is_null($post['title']) || strlen($post['title']) < 2 )
					/*  */ array_push($labels, ['title', 'Escribe un título con más de 2 caracteres.']);

					if ( empty($post['image_id']) )
					{
						return json_encode([
							'status' => 'error',
							'message' => 'Se requiere seleccionar al menos una imágen.'
						], JSON_PRETTY_PRINT);
					}
					else if ( !empty($labels) )
					{
						return json_encode([
							'status' => 'labels_error',
							'labels' => $labels
						], JSON_PRETTY_PRINT);
					}
					else
					{
						$this->model->update([
							'name' => $post['title'],
							'description' => $post['description'],
							'ids' => $post['image_id']
						], $response[0]['id']);

						return json_encode([
							'status' => 'OK',
						], JSON_PRETTY_PRINT);
					}
				}
				else
				{
					global $images, $data;

					define('_title', 'Actualizar galería {$_webpage}');

					$images = $this->model->get_all_media();
					$data = $response[0];

					return $this->view->render(Component::LAYOUTS . 'update.php');
				}
			}
			else
			/*  */ Errors::http('404');
		}
		else
		/*  */ Errors::http('404');
    }

	public function delete()
	{
		header('Content-type: application/json');

		$post['id'] = ( isset($_POST['id']) && !empty($_POST['id']) ) ? $_POST['id'] : null;

		if ( is_null($post['id']) )
		{
			return json_encode([
				'status' => 'error',
				'message' => 'Debes seleccionar una galería.'
			], JSON_PRETTY_PRINT);
		}
		else
		{
			$this->model->delete($post);

			return json_encode([
				'status' => 'OK'
			], JSON_PRETTY_PRINT);
		}
	}
}