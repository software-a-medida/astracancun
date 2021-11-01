<?php defined('_EXEC') or die;

/**
* @package valkyrie.layouts
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
* @author Irving Martinez Santiago <Chief Software Development Officer, imartinez@codemonkey.com.mx>
* @since December 03 - 29, 2018 <@update>
* @version 1.1.0
* @summary (Proyecto) Se agregaron los menús de programas y donaciones. Se agrego el boton de donar, se actualizó el maquetado del nav menu y se actualizó a dos banderas el cambio de multilenguaje
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

?>

<header class="main-header">
    <div class="container">
        <figure class="logotype">
            <a href="/"><img src="{$path.uploads}{$_vkye_logotype_white}" alt="Logotype"></a>
        </figure>
        <nav class="menu">
            <ul class="menu-top">
                <li class="donate"><a href="/donations"><i class="material-icons">favorite</i>{$lang.donate}</a></li>
                <li><a href="?<?php echo Language::get_lang_url('es'); ?>" <?php if (Session::get_value('lang') == 'es') { echo 'class="lang_active"'; } else { echo ''; } ?>>ES <img src="{$path.images}es.png" alt="Lang" /></a></li>
                <li><a href="?<?php echo Language::get_lang_url('en'); ?>" <?php if (Session::get_value('lang') == 'en') { echo 'class="lang_active"'; } else { echo ''; } ?>>EN <img src="{$path.images}en.png" alt="Lang" /></a></li>
            </ul>
            <ul class="menu-down">
                <li><a href="/">{$lang.home}</a></li>
                <li><a href="/programs">{$lang.programs}</a></li>
                <li><a href="/donations">{$lang.donations}</a></li>
                <li><a href="/about">{$lang.about}</a></li>
                <li><a href="/blog">{$lang.blog}</a></li>
                <li><a href="/contact">{$lang.contact}</a></li>
            </ul>
        </nav>
        <nav class="res-menu">
            <a href="" data-action="open-res-menu"><i class="material-icons">menu</i></a>
        </nav>
    </div>
</header>
