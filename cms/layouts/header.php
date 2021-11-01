<?php

defined('_EXEC') or die;

/**
* @package valkyrie.cms.layouts
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
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since December 03 - 29, 2018 <@update>
* @version 1.1.0
* @summary (Proyecto) Se integró el menú principal
*
* @copyright Copyright (C) Code Monkey S de RL <contact@codemonkey.com.mx, wwww.codemonkey.com.mx>. Todos los derechos reservados.
*/

?>

<header class="topbar">
    <nav class="res-menu">
        <a data-action="open-res-menu"><i class="material-icons logged">menu</i></a>
    </nav>
    <figure class="logotype">
        <img src="{$path.uploads}{$_vkye_logotype_black}" alt="Logotype" />
    </figure>
    <nav class="menu">
        <a class="logged"><i class="material-icons logged">lens</i><?php echo Session::get_value('_vkye_username') ?></a>
        <a href="https://<?php echo Configuration::$domain ?>/" target="_blank"><i class="material-icons">language</i><span>Ir a mi sitio web</span></a>
        <a href="index.php?c=system&m=logout"><i class="material-icons">lock</i><span>Cerrar sesión</span></a>
    </nav>
    <div class="clear"></div>
</header>
<header class="sidebar">
    <a href="index.php?c=programs"><i class="material-icons">home</i><span>Programas</span></a>
    <a href="index.php?c=blog"><i class="material-icons">textsms</i><span>Blog</span></a>
    <a><i class="material-icons">settings</i><span>Configuraciones</span></a>
    <div class="submenu">
        <a href="index.php?c=settings"><i class="material-icons">keyboard_arrow_right</i><span>Configuraciones generales</span></a>
        <a href="index.php?c=allies"><i class="material-icons">keyboard_arrow_right</i><span>Aliados</span></a>
        <a href="index.php?c=team"><i class="material-icons">keyboard_arrow_right</i><span>Equipo</span></a>
        <a href="index.php?c=donations"><i class="material-icons">keyboard_arrow_right</i><span>Donaciones</span></a>
        <a href="index.php?c=stories"><i class="material-icons">keyboard_arrow_right</i><span>Historias</span></a>
        <a href="index.php?c=timeline"><i class="material-icons">keyboard_arrow_right</i><span>Line de tiempo</span></a>
    </div>
    <a href="index.php?c=users"><i class="material-icons">supervisor_account</i><span>Usuarios</span></a>
</header>
