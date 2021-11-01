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

class Team_controller extends Controller
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
				$name = (isset($_POST['name']) AND !empty($_POST['name'])) ? $_POST['name'] : null;
				$position_es = (isset($_POST['position_es']) AND !empty($_POST['position_es'])) ? $_POST['position_es'] : null;
				$position_en = (isset($_POST['position_en']) AND !empty($_POST['position_en'])) ? $_POST['position_en'] : null;
				$semblance_es = (isset($_POST['semblance_es']) AND !empty($_POST['semblance_es'])) ? $_POST['semblance_es'] : null;
				$semblance_en = (isset($_POST['semblance_en']) AND !empty($_POST['semblance_en'])) ? $_POST['semblance_en'] : null;
                $avatar = (isset($_FILES['avatar']['name']) AND !empty($_FILES['avatar']['name'])) ? $_FILES['avatar'] : null;
				$priority = (isset($_POST['priority']) AND !empty($_POST['priority'])) ? $_POST['priority'] : null;

				$errors = [];

				if (!isset($name))
					array_push($errors, ['name','No deje este campo vacío']);

				if (!isset($position_es))
					array_push($errors, ['position_es','No deje este campo vacío']);

				if (!isset($position_en))
					array_push($errors, ['position_en','No deje este campo vacío']);

				if (!isset($semblance_es))
					array_push($errors, ['semblance_es','No deje este campo vacío']);

				if (!isset($semblance_en))
					array_push($errors, ['semblance_en','No deje este campo vacío']);

                if ($action == 'new' AND !isset($avatar))
					array_push($errors, ['avatar','No deje este campo vacío']);

				if (isset($priority) AND !is_numeric($priority))
					array_push($errors, ['priority','Ingrese únicamente números']);
				else if (isset($priority) AND $priority == 0)
					array_push($errors, ['priority','Ingrese como mínimo el número 1']);
				else if (isset($priority) AND $priority < 0)
					array_push($errors, ['priority','No ingrese números negativos']);

				if (empty($errors))
				{
					$data = [
						'id_team' => $id,
                        'name' => $name,
                        'position' => [
                            'es' => $position_es,
    						'en' => $position_en,
                        ],
                        'semblance' => [
                            'es' => $semblance_es,
    						'en' => $semblance_en,
                        ],
                        'avatar' => $avatar,
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

			$datas = $this->model->get('all', ['id_team','name','avatar','priority']);

			$lst_datas = '';

			foreach ($datas as $value)
			{
				$lst_datas .=
				'<tr>
					<td><figure><img src="{$path.uploads}' . $value['avatar'] . '" /></figure></td>
					<td>' . $value['name'] . '</td>
					<td>' . (!empty($value['priority']) ? '<span class="busy">Prioridad ' . $value['priority'] . '</span>' : '<span class="empty">Sin prioridad</span>') . '</td>
					<td>
						<a data-action="delete" data-id="' . $value['id_team'] . '"><i class="material-icons">delete</i><span>Eliminar</span></a>
						<a data-action="get" data-id="' . $value['id_team'] . '"><i class="material-icons">menu</i><span>Detalles | Editar</span></a>
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
