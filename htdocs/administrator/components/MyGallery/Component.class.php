<?php

namespace BuriPHP\Administrator\Components\MyGallery;

defined('_EXEC') or die;

use \BuriPHP\System\Libraries\{Database};

class Component
{
    const NAME = 'MyGallery';
    const PATH = PATH_ADMINISTRATOR_COMPONENTS . self::NAME . DIRECTORY_SEPARATOR;
    const LAYOUTS = self::PATH . 'layouts' . DIRECTORY_SEPARATOR;

    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public static function urls()
    {
        // Linea para importar las urls del componente al desarollo
        // $urls = array_merge($urls, Component::urls('MyGallery'));

        return [
            '/gallery' => [
                'component' => self::NAME,
                'controller' => 'Gallery',
                'method' => 'index',
            ],
            '/gallery/list' => [
                'component' => self::NAME,
                'controller' => 'Gallery',
                'method' => 'list',
            ],
            '/gallery/create' => [
                'component' => self::NAME,
                'controller' => 'Gallery',
                'method' => 'create',
            ],
            '/gallery/update' => [
                'component' => self::NAME,
                'controller' => 'Gallery',
                'method' => 'update',
            ],
            '/gallery/delete' => [
                'component' => self::NAME,
                'controller' => 'Gallery',
                'method' => 'delete',
                'petition' => 'ajax',
            ],
        ];
    }
}