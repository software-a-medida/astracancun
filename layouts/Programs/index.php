<?php defined('_EXEC') or die;

/**
* @package valkyrie.layouts.index
*
* @author Irving Martinez Santiago <Chief Software Development Officer, imartinez@codemonkey.com.mx>
* @since December 03 - 29, 2018 <@create>
* @version 1.1.0
* @summary (Proyecto)
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

$this->dependencies->add(['js', '{$path.js}pages/programs.min.js']);

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
        {$lst_programs}
    </div>
</section>
<section class="videos">
    <div class="container">
        <iframe
            width="100%"
            height="600px"
            src="{$video}"
            frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
        </iframe>
    </div>
</section>
