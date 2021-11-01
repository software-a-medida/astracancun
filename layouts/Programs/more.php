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

$this->dependencies->add(['css', '{$path.plugins}fancybox/source/jquery.fancybox.css']);
$this->dependencies->add(['js', '{$path.js}pages/programs.js']);
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

    </div>
</section>
<section class="program-description">
    <div class="container">
        <div class="author">
            <h1>{$name}</h1>
            <img src="{$path.images}certificate.png" alt="Certificate">
        </div>
        <div class="description">
            {$description}
            {$lst_gallery}
        </div>
        <div class="clear"></div>
    </div>
</section>
