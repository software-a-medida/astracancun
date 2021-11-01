'use strict';

/**
* @package valkyrie.cms.js
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since August 01 - 18, 2018 <@create>
* @version 1.0.0
* @summary cm-valkyrie-platform-website-template (This files was created empty)
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

$(document).ready(function()
{
    if (typeof tinymce != "undefined")
    {
        tinymce.init({
            selector: "textarea.tinymce",
            plugins : "image link preview",
            toolbar: false,
            height: 300,
        });
    }
});
