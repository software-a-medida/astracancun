<?php

defined('_EXEC') or die;

/**
* @package valkyrie.cms.core.controllers
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since December 03 - 29, 2018 <@create>
* @version 1.1.0
* @summary (Proyecto)
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

class Timeline_controller extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	/* Ajax 1: New or edit
	** Ajax 2: Get
	** Ajax 3: Delete
	** Render: Page
	------------------------------------------------------------------------------- */
	public function index()
	{
		if (Format::exist_ajax_request() == true)
		{
			$action = $_POST['action'];
			$id = ($action == 'edit' OR $action == 'get' OR $action == 'delete') ? $_POST['id'] : null;

			if ($action == 'new' OR $action == 'edit')
			{
				$year = (isset($_POST['year']) AND !empty($_POST['year'])) ? $_POST['year'] : null;
				$description_es = (isset($_POST['description_es']) AND !empty($_POST['description_es'])) ? $_POST['description_es'] : null;
				$description_en = (isset($_POST['description_en']) AND !empty($_POST['description_en'])) ? $_POST['description_en'] : null;
				$priority = (isset($_POST['priority']) AND !empty($_POST['priority'])) ? $_POST['priority'] : null;

				$errors = [];

				if (!isset($year))
					array_push($errors, ['year','No deje este campo vacío']);
				else if (!is_numeric($year))
					array_push($errors, ['year','Ingrese únicamente número']);
				else if (strlen($year) != 4)
					array_push($errors, ['year','Ingrese el número a 4 carácteres']);

				if (!isset($description_es))
					array_push($errors, ['description_es','No deje este campo vacío']);

				if (!isset($description_en))
					array_push($errors, ['description_en','No deje este campo vacío']);

				if (isset($priority) AND !is_numeric($priority))
					array_push($errors, ['priority','Ingrese únicamente números']);
				else if (isset($priority) AND $priority == 0)
					array_push($errors, ['priority','Ingrese como mínimo el número 1']);
				else if (isset($priority) AND $priority < 0)
					array_push($errors, ['priority','No ingrese números negativos']);

				if (empty($errors))
				{
					$data = [
						'id_timeline' => $id,
                        'year' => $year,
                        'description' => [
                            'es' => $description_es,
    						'en' => $description_en,
                        ],
						'priority' => $priority
					];

					if ($action == 'new')
						$query = $this->model->new($data);
					else if ($action == 'edit')
						$query = $this->model->edit($data);

					if (!empty($query))
					{
						echo json_encode([
							'status' => 'success',
							'message' => 'Operación realizada correctamente'
						]);
					}
					else
					{
						echo json_encode([
							'status' => 'error',
							'message' => 'DATABASE OPERATION ERROR'
						]);
					}
				}
				else
				{
					echo json_encode([
						'status' => 'error',
						'message' => $errors
					]);
				}
			}

			if ($action == 'get')
			{
				$query = $this->model->get($id);

				if (!empty($query))
				{
					echo json_encode([
						'status' => 'success',
						'data' => $query
					]);
				}
				else
				{
					echo json_encode([
						'status' => 'error',
						'message' => 'DATABASE OPERATION ERROR'
					]);
				}
			}

			if ($action == 'delete')
			{
				$query = $this->model->delete($id);

				if (!empty($query))
				{
					echo json_encode([
						'status' => 'success',
						'message' => 'Operación realizada correctamente'
					]);
				}
				else
				{
					echo json_encode([
						'status' => 'error',
						'message' => 'DATABASE OPERATION ERROR'
					]);
				}
			}
		}
		else
		{
			define('_title', '{$lang.title} | ' . Configuration::$web_page);

			$template = $this->view->render($this, 'index');

			$datas = $this->model->get('all', ['id_timeline','year']);

			$lst_datas = '';

			foreach ($datas as $value)
			{
				$lst_datas .=
				'<tr>
					<td>' . $value['year'] . '</td>
					<td>' . (!empty($value['priority']) ? '<span class="busy">Prioridad ' . $value['priority'] . '</span>' : '<span class="empty">Sin prioridad</span>') . '</td>
					<td>
						<a data-action="delete" data-id="' . $value['id_timeline'] . '"><i class="material-icons">delete</i><span>Eliminar</span></a>
						<a data-action="get" data-id="' . $value['id_timeline'] . '"><i class="material-icons">menu</i><span>Detalles | Editar</span></a>
						<div class="clear"></div>
					</td>
				</tr>';
			}

			$replace = [
				'{$lst_datas}' => $lst_datas
			];

			$template = $this->format->replace($replace, $template);

			echo $template;
		}
	}
}
