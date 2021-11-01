'use strict';

/**
* @package valkyrie.js
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since August 01 - 18, 2018 <@create>
* @version 1.0.0
* @summary cm-valkyrie-platform-website-template
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

$(document).ready(function()
{
    /* Open responsive menu
    ------------------------------------------------------------------------------- */
    navScrollDown($('header.main-header'), 'down', 0)

    /* Open responsive menu
    ------------------------------------------------------------------------------- */
    $('[data-action="open-res-menu"]').on('click', function()
    {
        $('header.main-header nav.menu').toggleClass('open');
    });
});
