<?php

namespace BuriPHP\Libraries;

/**
 *
 * @package BuriPHP.Libraries
 *
 * @since 1.0.0
 * @version 1.5.0
 * @license You can see LICENSE.txt
 *
 * @author David Miguel Gómez Macías < davidgomezmacias@gmail.com >
 * @copyright Copyright (C) CodeMonkey - Platform. All Rights Reserved.
 */

defined('_EXEC') or die;

use \BuriPHP\System\Libraries\{Component};

class Urls_registered
{
    static public $default = '/';

    static public function urls()
    {
        $urls = [
            '/' => [
                'controller' => 'Pages',
                'method' => 'index'
            ],
            '/about' => [
                'controller' => 'Pages',
                'method' => 'about'
            ],

            '/donations' => [
                'controller' => 'Donations',
                'method' => 'index'
            ],
            '/donations/%param%' => [
                'controller' => 'Donations',
                'method' => 'view'
            ],

            '/programs' => [
                'controller' => 'Services',
                'method' => 'index'
            ],
            '/programs/%param%' => [
                'controller' => 'Services',
                'method' => 'view'
            ],

            '/blog' => [
                'controller' => 'Blog',
                'method' => 'index'
            ],
            '/blog/%param%' => [
                'controller' => 'Blog',
                'method' => 'view'
            ],

            '/contact' => [
                'controller' => 'Pages',
                'method' => 'contact'
            ]
        ];

        $urls = array_merge($urls, Component::urls('PlatformAccess'));

        return $urls;
    }
}