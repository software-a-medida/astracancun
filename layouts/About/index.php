<?php defined('_EXEC') or die;

/**
* @package valkyrie.layouts.about
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

$this->dependencies->add(['js', '{$path.js}pages/about.min.js']);

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
<section class="about">
    <div class="boxes-d-h">
        <div class="container">
            <div class="title">
                <h1>{$lang.about_us}</h1>
            </div>
            <div class="description">
                {$description}
            </div>
            <div class="box-history">
                <div class="image" data-image-src="{$path.uploads}{$background1}"></div>
                <div class="content">
                    <h4>{$lang.history}</h4>
                    {$history}
                </div>
            </div>
            <div class="box-history right">
                <div class="content">
                    <h4>{$lang.governing_body}</h4>
                    {$organ_government}
                </div>
                <div class="image" data-image-src="{$path.uploads}{$background2}"></div>
            </div>
        </div>
    </div>
    <div class="boxes-t-b">
        <div class="container">
            <div class="three-boxes">
                <div class="box">
                    <h4 style="color:#fbc02d;">{$lang.mission}</h4>
                    {$mission}
                </div>
                <div class="box">
                    <h4 style="color:#fbc02d;">{$lang.vission}</h4>
                    {$vission}
                </div>
                <div class="box">
                    <h4 style="color:#fbc02d;">{$lang.values}</h4>
                    {$values}
                </div>
            </div>
        </div>
    </div>
    <div class="boxes-d-h">
        <div class="container">
            <ul class="m-timeline">
                {$lst_timeline}
            </ul>
        </div>
    </div>
    <div class="boxes-t-b">
        <div class="container">
            <div class="title">
                <h1>{$lang.team}</h1>
            </div>
            <div class="team">
                {$lst_team}
                <div class="clear"></div>
                <figure class="all-team">
                    <img src="{$path.uploads}{$background3}" alt="Cover">
                </figure>
            </div>
            <div class="notices">
                <p>{$lang.read_our} <a href="/privacy">{$lang.privacy}</a> | <a href="/transparency">{$lang.transparency}</a></p>
            </div>
        </div>
    </div>
</section>
<section class="videos about">
    <div class="container">
        <div class="title">
            <h1>{$lang.know-more}</h1>
        </div>
        <div class="item">
            <iframe
                width="560"
                height="315"
                src="{$video1}"
                frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
        <div class="item">
            <iframe
                width="560"
                height="315"
                src="{$video2}"
                frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
        <div class="item">
            <iframe
                width="560"
                height="315"
                src="{$video3}"
                frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
        <div class="item">
            <iframe
                width="560"
                height="315"
                src="{$video4}"
                frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
        <div class="clear"></div>
    </div>
</section>
