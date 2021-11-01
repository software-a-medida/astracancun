<?php defined('_EXEC') or die;

/**
* @package valkyrie.layouts.index
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since August 01 - 18, 2018 <@create>
* @version 1.0.0
* @summary cm-valkyrie-platform-website-template
*
* @author Irving Martinez Santiago <Chief Software Development Officer, imartinez@codemonkey.com.mx>
* @since December 03 - 29, 2018 <@update>
* @version 1.1.0
* @summary (Proyecto) Se integró el maquetado de la GUI, las funcionalidades de Owl Carousel y las funcionalidades de los plugins de redes sociales
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

$this->dependencies->add(['css', '{$path.plugins}owlcarousel/assets/owl.carousel.min.css']);
$this->dependencies->add(['css', '{$path.plugins}owlcarousel/assets/owl.theme.default.min.css']);
$this->dependencies->add(['js', '{$path.js}pages/index.min.js']);
$this->dependencies->add(['js', '{$path.plugins}owlcarousel/owl.carousel.min.js']);
$this->dependencies->add(['other',
'<div id="fb-root"></div>
<script>(function(d, s, id)
{
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.2";
    fjs.parentNode.insertBefore(js, fjs);
}
(document, "script", "facebook-jssdk"));
</script>']);

?>

%{header}%
<section class="home cover">
    <div id="slideshow" class="owl-carousel owl-theme">
        {$lst_slideshow}
    </div>
    <div class="container">
        <div class="title">
            <h1>{$title}</h1>
            <span>{$slogan}</span>
        </div>
    </div>
</section>
<section class="about-us">
    <div class="container">
        {$about_description}
        <a href="/programs" class="btn btn-readmore">{$lang.programs}</a>
    </div>
</section>
<section class="videos-home">
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
<section class="allies">
    <div class="container">
        <div class="title">
            <h1>{$lang.allies}</h1>
        </div>
        <div id="allies" class="owl-carousel owl-theme">
            {$lst_allies}
        </div>
        <div class="space50"></div>
        <a href="/donations" class="btn btn-readmore">{$lang.ally}</a>
    </div>
</section>
<section class="blog home">
    <div class="container">
        <div class="title">
            <h1>{$lang.inform_yourself}</h1>
        </div>
        <div class="article-blogs">
            {$lst_blog}
        </div>
        <div class="space50"></div>
        <a href="/blog" class="btn btn-readmore">{$lang.more}</a>
    </div>
</section>
<section class="social-media">
    <div class="container row">
        <!-- <div class="title">
            <h1>{$lang.follow}</h1>
        </div> -->
        <div class="span4">
            <div class="item">
                <i class="fab fa-facebook-f"></i>
                <div class="fb-page"
                    data-href="https://www.facebook.com/{$_vkye_facebook}"
                    data-tabs="timeline"
                    data-width="300"
                    data-height="590"
                    data-small-header="false"
                    data-adapt-container-width="true"
                    data-hide-cover="false"
                    data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/{$_vkye_facebook}" class="fb-xfbml-parse-ignore">
                        <a href="https://www.facebook.com/{$_vkye_facebook}">ASTRA-CANCUN</a>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="item">
                <i class="fab fa-instagram"></i>
                <script language="javascript" src="http://i1.inwidgets.com/1-astracancun.js"></script>
            </div>
        </div>
        <div class="span4">
            <div class="item">
                <i class="fab fa-twitter"></i>
                <a class="twitter-timeline" href="https://twitter.com/AstraCancun?ref_src=twsrc%5Etfw" height="660px">Tweets by AstraCancun</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</section>
