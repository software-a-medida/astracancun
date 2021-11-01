'use strict';

/**
* @package valkyrie.pages.js
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since August 01 - 18, 2018 <@create>
* @version 1.0.0
* @summary cm-valkyrie-platform-website-template (This file was created empty)
*
* @author Irving Martinez Santiago <Chief Software Development Officer, imartinez@codemonkey.com.mx>
* @since December 03 - 29, 2018 <@update>
* @version 1.0.0
* @summary (Proyecto) Se agregaron las funcionalidades para los slideshows princial y de aliados.
*
* @copyright Copyright (C) Code Monkey S de RL <contact@codemonkey.com.mx, wwww.codemonkey.com.mx>. Todos los derechos reservados.
*/

$(document).ready(function()
{
    /* Main Slideshow
    ------------------------------------------------------------------------------- */
    $(document).find('#slideshow').owlCarousel({
        items: 1,
        loop: true,
        margin: 0,
        autoplay: true,
        autoplayTimeout: 4000,
        dots: false,
        nav: false
    });

    /* Allies Slideshow
    ------------------------------------------------------------------------------- */
    $(document).find('#allies').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 4000,
        dots: false,
        nav: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });
});
