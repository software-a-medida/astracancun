<?php defined('_EXEC') or die;

/**
* @package valkyrie.layouts.blog
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since August 01 - 18, 2018 <@create>
* @version 1.0.0
* @summary cm-valkyrie-platform-website-template
*
* @author Irving Martinez Santiago <Chief Software Development Officer, imartinez@codemonkey.com.mx>
* @since December 03 - 29, 2018 <@update>
* @version 1.1.0
* @summary (Proyecto) Se integró el maquetado de la GUI
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

$this->dependencies->add(['js', '{$path.js}pages/blog.min.js']);

?>

%{header}%
<section class="home cover min">
    <figure>
        <img src="{$path.uploads}{$cover}" alt="Cover">
    </figure>
    <div class="container">
        <div class="title">
            <h1>{$title}</h1>
        </div>
    </div>
</section>
<section class="blog">
    <div class="container">
        {$lst_blog}
    </div>
</section>
