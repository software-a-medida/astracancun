'use strict';

/**
* @package valkyrie.js.pages
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since August 01 - 18, 2018 <@create>
* @version 1.0.0
* @summary cm-valkyrie-platform-website-template
*
* @author Irving Martinez Santiago <Chief Software Development Officer, imartinez@codemonkey.com.mx>
* @since December 03 - 29, 2018 <@update>
* @version 1.0.0
* @summary (Proyecto) Se agregaron las funcionalidades para el Google Maps
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

$(document).ready(function()
{
    /* Sending contact email
	------------------------------------------------------------------------------- */
    $('[data-action="contact"]').on('click', function()
    {
        $('form[name="contact"]').submit();
    });

    $('form[name="contact"]').on('submit', function(e)
    {
        e.preventDefault();

        var self = $(this);
        var data = self.serialize();

        $.ajax({
            url: '',
            type: 'POST',
            data: data,
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                checkValidateFormAjax(self, response, function()
                {
                    $('body').prepend('<div data-loader-ajax><div class="loader-01"></div></div>');
                    location.reload();
                });
            }
        });
    });

    /* Map
	------------------------------------------------------------------------------- */
    $('[data-action="viewMap"]').on('click', function()
    {
        $('section.contact > div.map > div.cover').addClass('view-map');
        $('section.contact > div.map > div.close-map').addClass('view-map');
    });

    $('[data-action="closeMap"]').on('click', function()
    {
        $('section.contact > div.map > div.cover').removeClass('view-map');
        $('section.contact > div.map > div.close-map').removeClass('view-map');
    });
});
