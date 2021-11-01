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

class Donations_controller extends Controller
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
				$description_es = (isset($_POST['description_es']) AND !empty($_POST['description_es'])) ? $_POST['description_es'] : null;
				$description_en = (isset($_POST['description_en']) AND !empty($_POST['description_en'])) ? $_POST['description_en'] : null;
				$type = (isset($_POST['type']) AND !empty($_POST['type'])) ? $_POST['type'] : null;

				$errors = [];

				if (!isset($description_es))
					array_push($errors, ['description_es','No deje este campo vacío']);
                else if ($type == 'dinero' AND !is_numeric($description_es))
                    array_push($errors, ['description_es','Ingrese únicamente números']);
                else if ($type == 'dinero' AND $description_es <= 0)
                    array_push($errors, ['description_es','No ingrese 0 ó número negativos']);
                else if ($type == 'dinero' AND $description_es != $description_en)
                    array_push($errors, ['description_es','Ingrese la misma cantidad']);

				if (!isset($description_en))
					array_push($errors, ['description_en','No deje este campo vacío']);
                else if ($type == 'dinero' AND !is_numeric($description_en))
                    array_push($errors, ['description_en','Ingrese únicamente números']);
                else if ($type == 'dinero' AND $description_en <= 0)
                    array_push($errors, ['description_en','No ingrese 0 ó número negativos']);
                else if ($type == 'dinero' AND $description_en != $description_es)
                    array_push($errors, ['description_en','Ingrese la misma cantidad']);

				if (!isset($type))
					array_push($errors, ['type','No deje este campo vacío']);
				else if ($type != 'especie' AND $type != 'dinero' AND $type != 'tiempo')
					array_push($errors, ['type','Dato no válido']);

				if (empty($errors))
				{
					$data = [
						'id_donation' => $id,
                        'description' => [
                            'es' => $description_es,
    						'en' => $description_en,
                        ],
                        'type' => $type
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

			$datas = $this->model->get('all');

			$lst_datas = '';

			foreach ($datas as $value)
			{
				$lst_datas .=
				'<tr>
					<td>' . (($value['type'] == 'dinero') ? '$ ' . $value['description']['es'] . ' MXN' : $value['description']['es']) . '</td>
					<td>' . $value['type'] . '</td>
					<td>
						<a data-action="delete" data-id="' . $value['id_donation'] . '"><i class="material-icons">delete</i><span>Eliminar</span></a>
						<a data-action="get" data-id="' . $value['id_donation'] . '"><i class="material-icons">menu</i><span>Detalles | Editar</span></a>
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
