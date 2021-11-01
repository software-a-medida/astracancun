<?php

defined('_EXEC') or die;

/**
* @package valkyrie.cms.core.libraries
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
* @copyright Copyright (C) Code Monkey S de RL <contact@codemonkey.com.mx, wwww.codemonkey.com.mx>. Todos los derechos reservados.
*/

class User_level_vkye_adm
{
    static public function login_redirect($level)
    {
        switch ($level)
        {
            case '{owner}': return 'index.php?c=programs'; break;
            case '{administrator}': return 'index.php?c=programs'; break;
            case '{editor}': return 'index.php?c=blog'; break;
            default: return 'index.php'; break;
        }
    }

    public function access ($path)
    {
        $level = Session::get_value('_vkye_level');

        switch ($level)
        {
            case '{owner}':
                return true;
            break;

            case '{administrator}':
                return $this->check_path($path, [
                    '/Index/unavailable',
                    '/Products/index',
                    '/Blog/index',
                    '/Gallery/index',
                    '/Settings/index'
                ]);
            break;

            case '{editor}':
                return $this->check_path($path, [
                    '/Index/unavailable/',
                    '/Blog/index'
                ]);
            break;

            default:
                return false;
            break;
        }
    }

    private function check_path($path, $permission)
    {
        if (in_array($path, $permission))
            return true;
        else
            return false;
    }
}
