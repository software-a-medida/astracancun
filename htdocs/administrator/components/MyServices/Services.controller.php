<?php namespace BuriPHP\Administrator\Components\MyServices\Controllers;

defined('_EXEC') or die;

use \BuriPHP\System\Libraries\{Format,Errors,Component};
use \BuriPHP\Administrator\Components\MyServices\Component as ServicesComponent;

class Services
{
	use \BuriPHP\System\Libraries\Controller;

	public function tools()
    {
        header('Content-type: application/json');

        switch ( $_GET['t'] ) {
            case 'get_url':
                $data['url'] = $this->security->clean_string($_POST['string']);
                $data['url'] = str_replace('_', '-', $data['url']);

                return json_encode([
                    'status' => 'OK',
                    'url' => strtolower($data['url'])
                ], JSON_PRETTY_PRINT);
                break;
            
            default:
                Errors::http('404');
                return json_encode([
                    'status' => 'error'
                ], JSON_PRETTY_PRINT);
                break;
        }
    }

	private function validate_form( $edit = false )
	{
		$post['title'] = ( isset($_POST['title']) && !empty($_POST['title']) ) ? $_POST['title'] : null;
		$post['category'] = ( isset($_POST['category']) && !empty($_POST['category']) ) ? $_POST['category'] : null;
		$post['lang'] = ( isset($_POST['lang']) && !empty($_POST['lang']) ) ? $_POST['lang'] : null;
		$post['description'] = ( isset($_POST['description']) && !empty($_POST['description']) ) ? $_POST['description'] : null;
		$post['tags'] = ( isset($_POST['tags']) && !empty($_POST['tags']) ) ? trim($_POST['tags']) : null;
		$post['image_cover'] = ( isset($_FILES['image_cover']) && !empty($_FILES['image_cover']) ) ? $_FILES['image_cover'] : null;
		$post['sm_title'] = ( isset($_POST['sm_title']) && !empty($_POST['sm_title']) ) ? $_POST['sm_title'] : null;
		$post['sm_description'] = ( isset($_POST['sm_description']) && !empty($_POST['sm_description']) ) ? $_POST['sm_description'] : null;
		$post['sm_image_cover'] = ( isset($_FILES['sm_image_cover']) && !empty($_FILES['sm_image_cover']) ) ? $_FILES['sm_image_cover'] : null;

		$labels = [];

		if ( is_null($post['title']) || strlen($post['title']) < 5 )
		/*  */ array_push($labels, ['title', 'Escribe un título con más de 5 caracteres.']);

		if ( is_null($post['description']) || strlen($post['description']) < 20 )
		/*  */ array_push($labels, ['description', 'Escribe una descripción más larga de 20 caracteres.']);

		if ( $edit == false )
		{
			$component = new Component();

			$__valid = json_decode($component->execute([
				"component" => "Media",
				"controller" => "Media",
				"method" => "validate",
				"params" => [
					"action" => "images",
					"data" => $post['image_cover'],
				]
			]), true);

			if ( $__valid['status'] === 'error' )
			/*  */ array_push($labels, ['image_cover', $__valid['message']]);

			if ( !empty($post['sm_image_cover']['name']) )
			{
				$__valid = json_decode($component->execute([
					"component" => "Media",
					"controller" => "Media",
					"method" => "validate",
					"params" => [
						"action" => "images",
						"data" => $post['sm_image_cover'],
					]
				]), true);

				if ( $__valid['status'] === 'error' )
				/*  */ array_push($labels, ['sm_image_cover', $__valid['message']]);
			}
		}

		if ( !empty($labels) )
		{
			return [
				'status' => 'labels_error',
				'labels' => $labels
			];
		}
		else
		{
			return [
				'status' => 'OK',
				'post' => $post
			];
		}
	}

	public function list()
	{
		global $data, $langs;

        $data = $this->model->get();
        $langs = $this->format->import_file(PATH_ADMINISTRATOR_INCLUDES, 'codes_language_iso', 'json');

		define('_title', 'Lista de servicios - {$_webpage}');

		return $this->view->render(ServicesComponent::LAYOUTS . 'list.php');
	}

	public function create()
	{
		if ( Format::exist_ajax_request() )
		{
			$response = $this->validate_form();

			if ( $response['status'] == 'error' )
			{
				return json_encode([
					'status' => 'error',
					'message' => $response['message']
				], JSON_PRETTY_PRINT);
			}
			else if ( $response['status'] == 'labels_error' )
			{
				return json_encode([
					'status' => 'labels_error',
					'labels' => $response['labels']
				], JSON_PRETTY_PRINT);
			}
			else
			{
				$response = $this->model->save( $response['post'] );

				if ( $response['status'] == 'error' )
				{
					return json_encode([
						'status' => 'error',
						'message' => $response['message']
					], JSON_PRETTY_PRINT);
				}
				else
				{
					return json_encode([
						'status' => 'OK',
						'redirect' => 'index.php/services'
					], JSON_PRETTY_PRINT);
				}
			}
		}
		else
		{
			define('_title', 'Nuevo servicio - {$_webpage}');

			return $this->view->render(ServicesComponent::LAYOUTS . 'create.php');
		}
	}

	public function update()
	{
		if ( isset($_GET['id']) && !empty($_GET['id']) )
		{
			$response = $this->model->get($_GET['id']);

			if ( isset($response) && !empty($response) )
			{
				/* Action Ajax ------------------------------------------------------ */
				if ( Format::exist_ajax_request() )
				{
					$response = $this->validate_form(true);

					if ( $response['status'] == 'error' )
					{
						return json_encode([
							'status' => 'error',
							'message' => $response['message']
						], JSON_PRETTY_PRINT);
					}
					else if ( $response['status'] == 'labels_error' )
					{
						return json_encode([
							'status' => 'labels_error',
							'labels' => $response['labels']
						], JSON_PRETTY_PRINT);
					}
					else
					{
						$response['post']['id'] = $_GET['id'];

						$response = $this->model->save( $response['post'], true );

						if ( $response['status'] == 'error' )
						{
							return json_encode([
								'status' => 'error',
								'message' => $response['message']
							], JSON_PRETTY_PRINT);
						}
						else
						{
							return json_encode([
								'status' => 'OK',
								'redirect' => 'index.php/services/update?id='. $_GET['id']
							], JSON_PRETTY_PRINT);
						}
					}
				}
				else
				{
					global $data, $langs;

					$data = $response[0];
					$langs = $this->format->import_file(PATH_ADMINISTRATOR_INCLUDES, 'codes_language_iso', 'json');

					define('_title', $data['title'] .' - {$_webpage}');

					return $this->view->render(ServicesComponent::LAYOUTS . 'update.php');
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
				'message' => 'Debes seleccionar un servicio.'
			], JSON_PRETTY_PRINT);
		}
		else
		{
			$this->model->delete($post);

			return json_encode([
				'status' => 'OK',
				'redirect' => 'index.php/services'
			], JSON_PRETTY_PRINT);
		}
	}
}