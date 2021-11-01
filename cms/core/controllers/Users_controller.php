<?php

defined('_EXEC') or die;

/**
* @package valkyrie.cms.core.controllers
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since August 01 - 18, 2018 <@create>
* @version 1.0.0
* @summary cm-valkyrie-platform-website-template
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since December 01 - 15, 2018 <@update>
* @version 1.1.0
* @summary cm-valkyrie-platform-website-template
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

class Users_controller extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	/* Ajax 1: New or edit
	** Ajax 2: Restore
	** Ajax 3: Get
	** Ajax 4: Delete
	** Render: Page
	------------------------------------------------------------------------------- */
	public function index()
	{
		if (Format::exist_ajax_request() == true)
		{
			$action = $_POST['action'];
			$id = ($action == 'edit' OR $action == 'restore' OR $action == 'get' OR $action == 'delete') ? $_POST['id'] : null;

			if ($action == 'new' OR $action == 'edit')
			{
				$fullname = (isset($_POST['fullname']) AND !empty($_POST['fullname'])) ? $_POST['fullname'] : null;
				$email = (isset($_POST['email']) AND !empty($_POST['email'])) ? $_POST['email'] : null;
				$username = (isset($_POST['username']) AND !empty($_POST['username'])) ? $_POST['username'] : null;
				$password = ($action == 'new' AND isset($_POST['password']) AND !empty($_POST['password'])) ? $_POST['password'] : null;
				$level = (isset($_POST['level']) AND !empty($_POST['level'])) ? $_POST['level'] : null;
                $avatar = (isset($_FILES['avatar']['name']) AND !empty($_FILES['avatar']['name'])) ? $_FILES['avatar'] : null;
				$status = (isset($_POST['status']) AND !empty($_POST['status'])) ? true : false;

				$errors = [];

				if (!isset($fullname))
					array_push($errors, ['fullname','No deje este campo vacío']);

				if (isset($email) AND Functions::check_email($email) == false)
					array_push($errors, ['email','Dato inválido']);

				if (!isset($username))
					array_push($errors, ['username','No deje este campo vacío']);

				if ($action == 'new' AND !isset($password))
					array_push($errors, ['password','No deje este campo vacío']);

				if (!isset($level))
					array_push($errors, ['level','No deje este campo vacío']);

				if (empty($errors))
				{
					if ($action == 'new')
						$password = $this->security->create_password($password);

					$data = [
						'id_user' => $id,
                        'fullname' => $fullname,
                        'email' => strtolower($email),
                        'username' => strtolower($username),
                        'password' => $password,
                        'id_user_level' => $level,
                        'avatar' => $avatar,
                        'status' => $status
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

			if ($action == 'restore')
			{
				$password = (isset($_POST['password']) AND !empty($_POST['password'])) ? $_POST['password'] : null;

				$errors = [];

				if (!isset($password))
					array_push($errors, ['password','No deje este campo vacío']);

				if (empty($errors))
				{
					$password = $this->security->create_password($password);

					$data = [
						'id_user' => $id,
                        'password' => $password
					];

					$query = $this->model->restore($data);

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
					<td><figure><img src="' . (!empty($value['avatar']) ? '{$path.uploads}' . $value['avatar'] : '{$path.images}empty.png') . '" /></figure></td>
					<td>' . $value['fullname'] . '</td>
					<td>' . $value['level'] . '</td>
					<td>' . (($value['status'] == true) ? '<span class="success">Activado</span>' : '<span class="alert">Desactivado</span>') . '</td>
					<td>
						<a data-action="delete" data-id="' . $value['id_user'] . '"><i class="material-icons">delete</i><span>Eliminar</span></a>
						<a data-action="get" data-id="' . $value['id_user'] . '" data-restore><i class="material-icons">lock</i><span>Restablecer contraseña</span></a>
						<a data-action="get" data-id="' . $value['id_user'] . '"><i class="material-icons">menu</i><span>Detalles | Editar</span></a>
						<div class="clear"></div>
					</td>
				</tr>';
			}

			$users_levels = $this->model->get_users_levels();

			$lst_users_levels = '';

			foreach ($users_levels as $value)
				$lst_users_levels .= '<option value="' . $value['id_user_level'] . '">' . $value['name'] . '</option>';

			$replace = [
				'{$lst_datas}' => $lst_datas,
				'{$lst_users_levels}' => $lst_users_levels
			];

			$template = $this->format->replace($replace, $template);

			echo $template;
		}
	}
}
