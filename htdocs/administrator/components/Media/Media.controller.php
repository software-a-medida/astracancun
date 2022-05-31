<?php

namespace BuriPHP\Administrator\Components\Media\Controllers;

defined('_EXEC') or die;

use \BuriPHP\System\Libraries\{Format, Security, Upload};
use \BuriPHP\Administrator\Components\Media\{Component, Resizeimage};

class Media
{
    use \BuriPHP\System\Libraries\Controller;

    private $component;
    private $allowed_files;

    public function ___construct()
    {
        require_once Component::PATH . 'Resizeimage' . CLASS_PHP;

        $this->component = new Component();
        $this->allowed_files = [
            'images' => ['jpg', 'jpeg', 'png'],
            'applications' => ['pdf', 'doc', 'xlsx'],
            'attached' => ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'xlsx']
        ];
    }

    public function validate($params)
    {
        $params = (isset($params) && !empty($params)) ? $params : ['action' => (isset($_POST['action']) && !empty($_POST['action'])) ? $_POST['action'] : null, 'data' => (isset($_FILES['data']) && !empty($_FILES['data'])) ? $_FILES['data'] : null];

        if (!is_null($params['action']) && !is_null($params['data'])) {
            $response = Upload::validate_file($params['data'], $this->allowed_files[$params['action']]);

            if ($response['status'] == 'OK') {
                return json_encode([
                    'status' => 'OK',
                    'token' => (new Security())->random_string('5')
                ]);
            } else {
                return json_encode([
                    'status' => 'error',
                    'message' => $response['message']
                ]);
            }
        } else {
            return json_encode([
                'status' => 'error',
                'message' => 'No se envio una accion o un archivo para validar.'
            ]);
        }
    }

    public function upload($params = [])
    {
        $params = (isset($params) && !empty($params)) ? $params : ['action' => (isset($_POST['action']) && !empty($_POST['action'])) ? $_POST['action'] : null, 'data' => (isset($_FILES['data']) && !empty($_FILES['data'])) ? $_FILES['data'] : null];

        if (!is_null($params['action']) && !is_null($params['data']) && isset($params['data']['name'])) {
            if (is_array($params['data']['name'])) {
                return $this->multiple($params['data'], $params['action']);
            } else {
                return $this->unique($params['data'], $params['action']);
            }
        } else {
            return json_encode([
                'status' => 'error',
                'message' => 'No se envio una accion o un archivo para correcto.'
            ]);
        }
    }

    private function unique($params, $type_files)
    {
        if (($_ = Upload::validate_file($params, $this->allowed_files[$type_files]))['status'] === 'ERROR') {
            return json_encode([
                'status' => 'error',
                'message' => $_['message']
            ]);
        } else {
            $data = Upload::upload_file($params, [
                'path_uploads' => PATH_UPLOADS,
                'set_name' => 'FILE_NAME_LAST_RANDOM'
            ]);

            if ($type_files === "images") :
                $data['thumb'] = pathinfo(PATH_UPLOADS . $data['file'], PATHINFO_FILENAME) . '_thumb.' . pathinfo(PATH_UPLOADS . $data['file'], PATHINFO_EXTENSION);
                $resize = (new Resizeimage(PATH_UPLOADS . $data['file']))->resizeTo(350, 350, 'maxWidth')->saveImage(PATH_UPLOADS . $data['thumb']);
            endif;

            unset($data['status']);
            $data['mime'] = mime_content_type(PATH_UPLOADS . $data['file']);
            $data['root'] = (new Format)->baseurl() . basename(PATH_UPLOADS) . '/';

            if ($type_files !== 'attached') :
                $data['id'] = $this->model->register($data);
            endif;

            return json_encode([
                'status' => 'OK',
                'data' => [$data]
            ]);
        }
    }

    private function multiple($params, $type_files)
    {
        $array = (isset($params) && !empty($params)) ? Upload::order_array($params, $this->allowed_files[$type_files]) : null;

        if (($_ = Upload::validate_array($array, $this->allowed_files[$type_files]))['status'] === 'ERROR') {
            return json_encode([
                'status' => 'error',
                'message' => $_['message'],
                'data' => $_['labels'],
            ]);
        } else {
            $data = Upload::upload_array($array, [
                'path_uploads' => PATH_UPLOADS,
                'set_name' => 'FILE_NAME_LAST_RANDOM'
            ]);

            $response = [];

            foreach ($data as $value) {
                if ($type_files === "images") :
                    $value['thumb'] = pathinfo(PATH_UPLOADS . $value['file'], PATHINFO_FILENAME) . '_thumb.' . pathinfo(PATH_UPLOADS . $value['file'], PATHINFO_EXTENSION);
                    $resize = (new Resizeimage(PATH_UPLOADS . $value['file']))->resizeTo(350, 350, 'maxWidth')->saveImage(PATH_UPLOADS . $value['thumb']);
                endif;

                unset($value['status']);
                $value['mime'] = mime_content_type(PATH_UPLOADS . $value['file']);
                $value['root'] = (new Format)->baseurl() . basename(PATH_UPLOADS) . '/';

                if ($type_files !== 'attached') :
                    $value['id'] = $this->model->register($value);
                endif;

                $response[] = $value;
            }

            return json_encode([
                'status' => 'OK',
                'data' => $response
            ]);
        }
    }

    public function delete($params = [])
    {
        $params = (empty($params) && isset($_POST) && !empty($_POST)) ? $_POST : $params;
        $post['id'] = (isset($params['id']) && !empty($params['id'])) ? $params['id'] : null;

        if (is_null($post['id'])) {
            return json_encode([
                'status' => 'error',
                'message' => 'Debes seleccionar un archivo multimedia.'
            ]);
        } else {
            return json_encode([
                'status' => 'OK',
                'data' => [
                    'file' => $this->model->delete($post)['file']
                ]
            ]);
        }
    }
}