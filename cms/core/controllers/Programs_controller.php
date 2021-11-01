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

class Programs_controller extends Controller
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
				$name_es = (isset($_POST['name_es']) AND !empty($_POST['name_es'])) ? $_POST['name_es'] : null;
				$name_en = (isset($_POST['name_en']) AND !empty($_POST['name_en'])) ? $_POST['name_en'] : null;
				$description_es = (isset($_POST['description_es']) AND !empty($_POST['description_es'])) ? $_POST['description_es'] : null;
				$description_en = (isset($_POST['description_en']) AND !empty($_POST['description_en'])) ? $_POST['description_en'] : null;
				$cover = (isset($_FILES['cover']['name']) AND !empty($_FILES['cover']['name'])) ? $_FILES['cover'] : null;
				$priority = (isset($_POST['priority']) AND !empty($_POST['priority'])) ? $_POST['priority'] : null;
				$seo_keywords_es = (isset($_POST['seo_keywords_es']) AND !empty($_POST['seo_keywords_es'])) ? $_POST['seo_keywords_es'] : null;
				$seo_keywords_en = (isset($_POST['seo_keywords_en']) AND !empty($_POST['seo_keywords_en'])) ? $_POST['seo_keywords_en'] : null;
				$seo_description_es = (isset($_POST['seo_description_es']) AND !empty($_POST['seo_description_es'])) ? $_POST['seo_description_es'] : null;
				$seo_description_en = (isset($_POST['seo_description_en']) AND !empty($_POST['seo_description_en'])) ? $_POST['seo_description_en'] : null;

				$errors = [];

				if (!isset($name_es))
					array_push($errors, ['name_es','No deje este campo vacío']);

				if (!isset($name_en))
					array_push($errors, ['name_en','No deje este campo vacío']);

				if (!isset($description_es))
					array_push($errors, ['description_es','No deje este campo vacío']);

				if (!isset($description_en))
					array_push($errors, ['description_en','No deje este campo vacío']);

				if ($action == 'new' AND !isset($cover))
					array_push($errors, ['cover','No deje este campo vacío']);

				if (isset($priority) AND !is_numeric($priority))
					array_push($errors, ['priority','Ingrese únicamente números']);
				else if (isset($priority) AND $priority == 0)
					array_push($errors, ['priority','Ingrese como mínimo el número 1']);
				else if (isset($priority) AND $priority < 0)
					array_push($errors, ['priority','No ingrese números negativos']);

				if (!isset($seo_keywords_es))
					array_push($errors, ['seo_keywords_es','No deje este campo vacío']);

				if (!isset($seo_keywords_en))
					array_push($errors, ['seo_keywords_en','No deje este campo vacío']);

				if (!isset($seo_description_es))
					array_push($errors, ['seo_description_es','No deje este campo vacío']);
				else if (strlen($seo_description_es) < 70)
					array_push($errors, ['seo_description_es','Ingrese mínimo 70 carácteres']);
				else if (strlen($seo_description_es) > 320)
					array_push($errors, ['seo_description_es','Ingrese máximo 320 carácteres']);

				if (!isset($seo_description_en))
					array_push($errors, ['seo_description_en','No deje este campo vacío']);
				else if (strlen($seo_description_en) < 70)
					array_push($errors, ['seo_description_en','Ingrese mínimo 70 carácteres']);
				else if (strlen($seo_description_en) > 320)
					array_push($errors, ['seo_description_en','Ingrese máximo 320 carácteres']);

				if (empty($errors))
				{
					$data = [
						'id_program' => $id,
						'name' => [
							'es' => $name_es,
							'en' => $name_en
						],
						'description' => [
							'es' => $description_es,
							'en' => $description_en
						],
						'seo' => [
							'keywords' => [
								'es' => $seo_keywords_es,
								'en' => $seo_keywords_en
							],
							'description' => [
								'es' => $seo_description_es,
								'en' => $seo_description_en
							]
						],
						'cover' => $cover,
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

			$datas = $this->model->get('all', ['id_program','name','cover','priority']);

			$lst_datas = '';

			foreach ($datas as $value)
			{
				$lst_datas .=
				'<tr>
					<td><figure><img src="{$path.uploads}' . $value['cover'] . '" /></figure></td>
					<td>' . $value['name']['es'] . '</td>
					<td>' . (!empty($value['priority']) ? '<span class="busy">Prioridad ' . $value['priority'] . '</span>' : '<span class="empty">Sin prioridad</span>') . '</td>
					<td>
						<a data-action="delete" data-id="' . $value['id_program'] . '"><i class="material-icons">delete</i><span>Eliminar</span></a>
						<a href="index.php?c=programs&m=gallery&p=' . $value['id_program'] . '"><i class="material-icons">photo</i><span>Galería</span></a>
						<a data-action="get" data-id="' . $value['id_program'] . '"><i class="material-icons">menu</i><span>Detalles | Editar</span></a>
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

	/* Gallery
	------------------------------------------------------------------------------- */
	public function gallery($id)
	{
		if (Format::exist_ajax_request() == true)
		{
			$action = $_POST['action'];

			if ($action == 'new')
				$image = $_POST['image'];
			else if ($action == 'delete')
				$image = $_POST['id'];

			$data = [
				'id_program' => $id,
				'image' => $image
			];

			if ($action == 'new')
				$query = $this->model->new_gallery($data);
			else if ($action == 'delete')
				$query = $this->model->delete_gallery($data);

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
			define('_title', '{$lang.title} | ' . Configuration::$web_page);

			$template = $this->view->render($this, 'gallery');

			$data = $this->model->get($id, ['name','gallery']);

			$lst_datas = '';

			if (!empty($data['gallery']))
			{
				foreach ($data['gallery'] as $key => $value)
				{
					$lst_datas .=
					'<figure>
						<img src="{$path.uploads}' . $value . '" alt="Gallery" />
						<a data-action="delete" data-id="' . $key . '"><i class="material-icons">delete</i></a>
					</figure>';
				}
			}

			$replace = [
				'{$name}' => $data['name']['es'],
				'{$lst_datas}' => $lst_datas
			];

			$template = $this->format->replace($replace, $template);

			echo $template;
		}
	}
}
