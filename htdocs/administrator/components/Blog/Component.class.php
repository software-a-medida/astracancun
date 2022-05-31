<?php namespace BuriPHP\Administrator\Components\Blog;

use \BuriPHP\System\Libraries\{Format};

defined('_EXEC') or die;

class Component
{
    const NAME = 'Blog';
    const PATH = PATH_ADMINISTRATOR_COMPONENTS . Self::NAME . DIRECTORY_SEPARATOR;
    const LAYOUTS = Self::PATH .'layouts'. DIRECTORY_SEPARATOR;

    public function url_public_component()
    {
        return (new Format())->baseurl() . 'blog/';
    }

    public static function urls()
    {
        // Linea para importar las urls del componente al desarollo
        // $urls = array_merge($urls, System::import_urls_component('Blog'));

        return [
            '/blog' => [
                'component' => self::NAME,
                'controller' => 'Blog',
                'method' => 'list',
                'petition' => 'http',
                'permissions' => ['{blog_read}']
            ],
            '/blog/tools' => [
                'component' => self::NAME,
                'controller' => 'Blog',
                'method' => 'tools',
                'petition' => 'ajax',
                'permissions' => ['{blog_read}']
            ],
            '/blog/create' => [
                'component' => self::NAME,
                'controller' => 'Blog',
                'method' => 'create',
                'permissions' => ['{blog_read}','{blog_create}']
            ],
            '/blog/update' => [
                'component' => self::NAME,
                'controller' => 'Blog',
                'method' => 'update',
                'permissions' => ['{blog_read}','{blog_update}']
            ],
            '/blog/delete' => [
                'component' => self::NAME,
                'controller' => 'Blog',
                'method' => 'delete',
                'permissions' => ['{blog_read}','{blog_delete}']
            ],

            '/blog/categories/list' => [
                'component' => self::NAME,
                'controller' => 'Categories',
                'method' => 'list',
                'petition' => 'ajax',
                'permissions' => ['{blog_read}']
            ],
            '/blog/categories/create' => [
                'component' => self::NAME,
                'controller' => 'Categories',
                'method' => 'create',
                'petition' => 'ajax',
                'permissions' => ['{blog_read}','{categories_blog_create}']
            ],
            '/blog/categories/delete' => [
                'component' => self::NAME,
                'controller' => 'Categories',
                'method' => 'delete',
                'petition' => 'ajax',
                'permissions' => ['{blog_read}','{categories_blog_delete}']
            ]
        ];
    }
}
