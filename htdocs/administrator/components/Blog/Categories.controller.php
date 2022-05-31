<?php namespace BuriPHP\Administrator\Components\Blog\Controllers;

defined('_EXEC') or die;

use \BuriPHP\System\Libraries\{Component};

class Categories
{
	use \BuriPHP\System\Libraries\Controller;

	private function validate_form( $edit = false )
	{
        $post['title_es'] = ( isset($_POST['title_es']) && !empty($_POST['title_es']) ) ? $_POST['title_es'] : null;
        $post['title_en'] = ( isset($_POST['title_en']) && !empty($_POST['title_en']) ) ? $_POST['title_en'] : null;
		$post['description_es'] = ( isset($_POST['description_es']) && !empty($_POST['description_es']) ) ? $_POST['description_es'] : null;
		$post['description_en'] = ( isset($_POST['description_en']) && !empty($_POST['description_en']) ) ? $_POST['description_en'] : null;
		$post['image'] = ( isset($_FILES['image']) && !empty($_FILES['image']) ) ? $_FILES['image'] : null;

		$labels = [];

		if ( is_null($post['title_es']) )
		/*  */ array_push($labels, ['title_es', 'Debes escribir el título en español.']);

		if ( is_null($post['title_en']) )
		/*  */ array_push($labels, ['title_en', 'Debes escribir el título en inglés.']);

		if ( !empty($post['image']['name']) )
		{
			$__valid = json_decode((new Component())->execute([
				"component" => "Media",
				"controller" => "Media",
				"method" => "validate",
				"params" => [
					"action" => "images",
					"data" => $post['image'],
				]
			]), true);

			if ( $__valid['status'] === 'error' )
			/*  */ array_push($labels, ['image', $__valid['message']]);
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
        header('Content-type: application/json');

        return json_encode([
            'status' => 'OK',
            'list' => $this->model->get_list()
        ], JSON_PRETTY_PRINT);
	}

	public function create()
	{
        header('Content-type: application/json');

		$response = $this->validate_form();

        if ( $response['status'] == 'labels_error' )
        {
            return json_encode([
				'status' => $response['status'],
				'labels' => $response['labels']
			], JSON_PRETTY_PRINT);
        }
        else
        {
            $response = $this->model->create( $response['post'] );

            if ( is_null($response) )
            {
                return json_encode([
                    'status' => 'error',
                    'message' => 'Error desconocido: No se pudo guardar.'
                ], JSON_PRETTY_PRINT);
            }
            else
            {
                return json_encode([
                    'status' => 'OK',
                    'data' => $response
                ], JSON_PRETTY_PRINT);
            }
        }
	}

	public function delete()
	{
        header('Content-type: application/json');

		$post['id'] = ( isset($_POST['id']) && !empty($_POST['id']) ) ? $_POST['id'] : null;

		if ( is_null($post['id']) )
		{
			return json_encode([
				'status' => 'error',
				'message' => 'Selecciona una opción.'
			], JSON_PRETTY_PRINT);
		}
		else
		{
			$this->model->delete( $post );

			return json_encode([
				'status' => 'OK'
			], JSON_PRETTY_PRINT);
		}
	}
}