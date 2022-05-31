<?php

namespace BuriPHP\Administrator\Components\MyServices;

use \BuriPHP\System\Libraries\{Format};

defined('_EXEC') or die;

class Component
{
    const NAME = 'MyServices';
    const PATH = PATH_ADMINISTRATOR_COMPONENTS . Self::NAME . DIRECTORY_SEPARATOR;
    const LAYOUTS = Self::PATH . 'layouts' . DIRECTORY_SEPARATOR;

    public function url_public_component($list = false)
    {
        if (!$list) :
            return (new Format())->baseurl() . 'services/';
        else :
            return (new Format())->baseurl() . 'service/';
        endif;
    }

    public static function urls()
    {
        // Linea para importar las urls del componente al desarollo
        // $urls = array_merge($urls, Component::urls('MyServices'));

        return [
            '/services' => [
                'component' => self::NAME,
                'controller' => 'Services',
                'method' => 'list',
                'petition' => 'http',
                'permissions' => ['{services_read}']
            ],
            '/services/tools' => [
                'component' => self::NAME,
                'controller' => 'Services',
                'method' => 'tools',
                'petition' => 'ajax',
                'permissions' => ['{services_read}']
            ],
            '/services/create' => [
                'component' => self::NAME,
                'controller' => 'Services',
                'method' => 'create',
                'permissions' => ['{services_read}', '{services_create}']
            ],
            '/services/update' => [
                'component' => self::NAME,
                'controller' => 'Services',
                'method' => 'update',
                'permissions' => ['{services_read}', '{services_update}']
            ],
            '/services/delete' => [
                'component' => self::NAME,
                'controller' => 'Services',
                'method' => 'delete',
                'permissions' => ['{services_read}', '{services_delete}']
            ],

            '/services/categories/list' => [
                'component' => self::NAME,
                'controller' => 'Categories',
                'method' => 'list',
                'petition' => 'ajax',
                'permissions' => ['{services_read}']
            ],
            '/services/categories/create' => [
                'component' => self::NAME,
                'controller' => 'Categories',
                'method' => 'create',
                'petition' => 'ajax',
                'permissions' => ['{services_read}', '{categories_services_create}']
            ],
            '/services/categories/delete' => [
                'component' => self::NAME,
                'controller' => 'Categories',
                'method' => 'delete',
                'petition' => 'ajax',
                'permissions' => ['{services_read}', '{categories_services_delete}']
            ]
        ];
    }
}