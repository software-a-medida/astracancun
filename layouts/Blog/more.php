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
* @summary (Proyecto) Se integró el maquetado de la GUI y las funcionalidades de FancyBox
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

$this->dependencies->add(['css', '{$path.plugins}fancybox/source/jquery.fancybox.css']);
$this->dependencies->add(['js', '{$path.js}pages/blog.min.js']);
$this->dependencies->add(['js', '{$path.plugins}fancybox/source/jquery.fancybox.js']);
$this->dependencies->add(['js', '{$path.plugins}fancybox/source/jquery.fancybox.pack.js']);
$this->dependencies->add(['other',
'<script type="text/javascript">

    $(".fancybox-thumb").fancybox({
        prevEffect	: "none",
        nextEffect	: "none",
        helpers	:
        {
            thumbs	:
            {
                width	: 50,
                height	: 50
            }
        }
   });

    $(".fancybox-media").fancybox({
        openEffect  : "elastic",
        closeEffect : "none",
        helpers :
        {
            media : {}
        }
    });
</script>']);

?>

%{header}%
<section class="home cover min">
    <figure>
        <img src="{$path.uploads}{$cover}" alt="Cover">
    </figure>
    <div class="container">
        <div class="title">
            <h1 class="cursive">{$name}</h1>
        </div>
    </div>
</section>
<section class="article-description">
    <div class="container">
        <div class="author">
            <figure>
                <img src="{$avatar}" alt="Avatar">
            </figure>
            <span>{$lang.author}: @{$author} | {$lang.publish}: {$date}</span>
        </div>
        <div class="description">
            {$description}
            {$lst_gallery}
        </div>
        <div class="clear"></div>
    </div>
</section>
