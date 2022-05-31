<?php namespace BuriPHP\Administrator\Components\Media;

defined('_EXEC') or die;

class Component
{
    const NAME = 'Media';
    const PATH = PATH_ADMINISTRATOR_COMPONENTS . Self::NAME . DIRECTORY_SEPARATOR;
    const LAYOUTS = Self::PATH .'layouts'. DIRECTORY_SEPARATOR;

    public static function urls()
    {
        // Linea para importar las urls del componente al desarollo
        // $urls = array_merge($urls, Component::urls('Media'));
        
        return [
            '/media' => [
                'component' => self::NAME,
                'controller' => 'Pages',
                'method' => 'view'
            ],

            '/media/validate' => [
                'component' => self::NAME,
                'controller' => 'Media',
                'method' => 'validate',
                'petition' => 'ajax'
            ],
            '/media/upload' => [
                'component' => self::NAME,
                'controller' => 'Media',
                'method' => 'upload',
                'petition' => 'ajax'
            ],
            '/media/delete' => [
                'component' => self::NAME,
                'controller' => 'Media',
                'method' => 'delete',
                'petition' => 'ajax'
            ]
        ];
    }
}
