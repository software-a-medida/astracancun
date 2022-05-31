<?php

namespace BuriPHP\Administrator\Components\Users\Controllers;

defined('_EXEC') or die;

use \BuriPHP\Administrator\Components\Users\{Component};
use \BuriPHP\System\Libraries\{Session};

class Users
{
	use \BuriPHP\System\Libraries\Controller;

	public function read()
	{
		global $users, $levels, $permissions;

		$users = $this->model->read_all_users();
		$levels = $this->model->read_all_levels();
		$permissions = $this->model->read_all_permissions();

		define('_title', 'Lista de usuarios registrados en {$_webpage}');
		return $this->view->render(Component::LAYOUTS . 'view_all.php');
	}

	public function read_user()
	{
		if (!isset($_GET['id']) || empty($_GET['id']))
			$_GET['id'] = null;

		$response = $this->model->read_user($_GET['id']);

		if (!empty($response)) {
			return json_encode([
				'status' => 'OK',
				'data' => $response
			], JSON_PRETTY_PRINT);
		} else {
			return json_encode([
				'status' => 'error',
				'message' => 'No existe el usuario.'
			], JSON_PRETTY_PRINT);
		}
	}

	public function create_user()
	{
		$post['name'] = (isset($_POST['name']) && !empty($_POST['name'])) ? $_POST['name'] : null;
		$post['username'] = (isset($_POST['username']) && !empty($_POST['username'])) ? $_POST['username'] : null;
		$post['email'] = (isset($_POST['email']) && !empty($_POST['email'])) ? $_POST['email'] : null;
		$post['prefix'] = (isset($_POST['prefix']) && !empty($_POST['prefix'])) ? $_POST['prefix'] : null;
		$post['phone'] = (isset($_POST['phone']) && !empty($_POST['phone'])) ? $_POST['phone'] : null;
		$post['password'] = (isset($_POST['password']) && !empty($_POST['password'])) ? $_POST['password'] : null;
		$post['level'] = (isset($_POST['level']) && !empty($_POST['level'])) ? $_POST['level'] : null;
		$post['permissions'] = (isset($_POST['permissions']) && !empty($_POST['permissions'])) ? $_POST['permissions'] : null;

		$labels = [];

		if (is_null($post['name']))
			array_push($labels, ['name', 'Escribe el nombre completo.']);

		if (is_null($post['username']))
			array_push($labels, ['username', 'Escribe el usuario.']);

		if (is_null($post['email']))
			array_push($labels, ['email', 'Escribe el correo electrónico.']);

		if (is_null($post['prefix']))
			array_push($labels, ['prefix', 'Selecciona un prefijo de teléfono.']);

		if (is_null($post['phone']))
			array_push($labels, ['phone', 'Registra un número telefónico.']);

		if (is_null($post['password']))
			array_push($labels, ['password', 'Debe tener una contraseña.']);

		if (is_null($post['level']))
			array_push($labels, ['level', 'Selecciona un nivel de usuario.']);

		if (!empty($labels)) {
			return json_encode([
				'status' => 'labels_error',
				'labels' => $labels
			], JSON_PRETTY_PRINT);
		} else {
			$this->model->create_user($post);

			return json_encode([
				'status' => 'OK',
				'redirect' => 'index.php/users'
			], JSON_PRETTY_PRINT);
		}
	}

	public function update_user()
	{
		$post['id'] = (isset($_POST['id']) && !empty($_POST['id'])) ? $_POST['id'] : null;
		$post['name'] = (isset($_POST['name']) && !empty($_POST['name'])) ? $_POST['name'] : null;
		$post['username'] = (isset($_POST['username']) && !empty($_POST['username'])) ? $_POST['username'] : null;
		$post['email'] = (isset($_POST['email']) && !empty($_POST['email'])) ? $_POST['email'] : null;
		$post['prefix'] = (isset($_POST['prefix']) && !empty($_POST['prefix'])) ? $_POST['prefix'] : null;
		$post['phone'] = (isset($_POST['phone']) && !empty($_POST['phone'])) ? str_replace(['(', ')', '-', ' '], '', $_POST['phone']) : null;
		$post['password'] = (isset($_POST['password']) && !empty($_POST['password'])) ? $_POST['password'] : null;
		$post['level'] = (isset($_POST['level']) && !empty($_POST['level'])) ? $_POST['level'] : null;
		$post['permissions'] = (isset($_POST['permissions']) && !empty($_POST['permissions'])) ? $_POST['permissions'] : null;

		$labels = [];

		if (is_null($post['id']))
			array_push($labels, ['id', 'Hace falta seleccionar un usuario en el sistema.']);

		if (is_null($post['name']))
			array_push($labels, ['name', 'Escribe el nombre completo.']);

		if (is_null($post['username']))
			array_push($labels, ['username', 'Escribe el usuario.']);

		if (is_null($post['email']))
			array_push($labels, ['email', 'Escribe el correo electrónico.']);

		if (is_null($post['prefix']))
			array_push($labels, ['prefix', 'Selecciona un prefijo de teléfono.']);

		if (is_null($post['level']))
			array_push($labels, ['level', 'Selecciona un nivel de usuario.']);

		if (!empty($labels)) {
			return json_encode([
				'status' => 'labels_error',
				'labels' => $labels
			], JSON_PRETTY_PRINT);
		} else {
			$this->model->update_user($post);

			return json_encode([
				'status' => 'OK',
				'redirect' => 'index.php/users'
			], JSON_PRETTY_PRINT);
		}
	}

	public function delete_user()
	{
		header('Content-type: application/json');

		$post['id'] = (isset($_POST['id']) && !empty($_POST['id'])) ? $_POST['id'] : null;

		if (is_null($post['id'])) {
			return json_encode([
				'status' => 'error',
				'message' => 'Debes elegir un usuario.'
			], JSON_PRETTY_PRINT);
		} else if (Session::get_value('__id_user') === $post['id']) {
			return json_encode([
				'status' => 'error',
				'message' => 'No puedes eliminar tu usuario.'
			], JSON_PRETTY_PRINT);
		} else {
			$this->model->delete_user($post);

			return json_encode([
				'status' => 'OK',
				'redirect' => 'index.php/users'
			], JSON_PRETTY_PRINT);
		}
	}
}