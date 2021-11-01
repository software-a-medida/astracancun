'use strict';

/**
* @package valkyrie.cms.js.pages
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since August 01 - 18, 2018 <@create>
* @version 1.0.0
* @summary cm-valkyrie-platform-website-template
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since December 01 - 15, 2018 <@update>
* @version 1.1.0
* @summary cm-valkyrie-platform-website-template
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since December 03 - 29, 2018 <@update>
* @version 1.1.0
* @summary (Proyecto)
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

$(document).ready(function()
{
    /* Cover home
    ------------------------------------------------------------------------------- */
    $('a[data-action="edit_cover_home"]').on('click', function()
    {
        $('input[data-action="edit_cover_home"]').click();
    });

    $('input[data-action="edit_cover_home"]').on('change', function()
    {
        if ($(this)[0].files[0].type.match($(this).attr('accept')))
        {
            var reader = new FileReader();

            reader.onload = function(e)
            {
                $.ajax({
                    url: '',
                    type: 'POST',
                    data: 'file=' + e.target.result + '&action=edit_cover_home',
                    processData: false,
                    cache: false,
                    dataType: 'json',
                    success: function(response)
                    {
                        if (response.status == 'success')
                        {
                            $('[data-modal="success"] main > p').html(response.message);
                            $('[data-modal="success"]').addClass('view').animate({scrollTop: 0}, 0);
                        }
                        else
                        {
                            $('[data-modal="alert"] main > p').html(response.message);
                            $('[data-modal="alert"]').addClass('view').animate({scrollTop: 0}, 0);
                        }
                    }
                });
            }

            reader.readAsDataURL($(this)[0].files[0]);
        }
        else
        {
            $('[data-modal="alert"] main > p').html('Archivo no permitido');
            $('[data-modal="alert"]').addClass('view').animate({scrollTop: 0}, 0);
        }
    });

    $('a[data-action="delete_cover_home"]').on('click', function()
    {
        var file = $(this).data('id');

        $.ajax({
            url: '',
            type: 'POST',
            data: 'file=' + file + '&action=delete_cover_home',
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                if (response.status == 'success')
                {
                    $('[data-modal="success"] main > p').html(response.message);
                    $('[data-modal="success"]').addClass('view').animate({scrollTop: 0}, 0);
                }
                else
                {
                    $('[data-modal="alert"] main > p').html(response.message);
                    $('[data-modal="alert"]').addClass('view').animate({scrollTop: 0}, 0);
                }
            }
        });
    });

    /* Modal to edit videos
    ------------------------------------------------------------------------------- */
    $('[data-modal="edit_videos"]').modal().onSuccess(function()
    {
        $('form[name="edit_videos"]').submit();
    });

    /* Edit videos
    ------------------------------------------------------------------------------- */
    $('form[name="edit_videos"]').on('submit', function(e)
    {
        e.preventDefault();

        var self = $(this);
        var data = self.serialize();

        $.ajax({
            url: '',
            type: 'POST',
            data: data + '&action=edit_videos',
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                checkFormValidations(self, response, function()
                {
                    $('[data-modal="edit_contact"]').removeClass('view').animate({scrollTop: 0}, 0);

                    $('[data-modal="success"] main > p').html(response.message);
                    $('[data-modal="success"]').addClass('view').animate({scrollTop: 0}, 0);
                });
            }
        });
    });

    /* Modal to edit contact
    ------------------------------------------------------------------------------- */
    $('[data-modal="edit_contact"]').modal().onSuccess(function()
    {
        $('form[name="edit_contact"]').submit();
    });

    /* Edit contact
    ------------------------------------------------------------------------------- */
    $('form[name="edit_contact"]').on('submit', function(e)
    {
        e.preventDefault();

        var self = $(this);
        var data = self.serialize();

        $.ajax({
            url: '',
            type: 'POST',
            data: data + '&action=edit_contact',
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                checkFormValidations(self, response, function()
                {
                    $('[data-modal="edit_contact"]').removeClass('view').animate({scrollTop: 0}, 0);

                    $('[data-modal="success"] main > p').html(response.message);
                    $('[data-modal="success"]').addClass('view').animate({scrollTop: 0}, 0);
                });
            }
        });
    });

    /* Modal to edit about
    ------------------------------------------------------------------------------- */
    $('[data-modal="edit_about"]').modal().onSuccess(function()
    {
        $('form[name="edit_about"]').submit();
    });

    /* Edit about
    ------------------------------------------------------------------------------- */
    $('form[name="edit_about"]').on('submit', function(e)
    {
        e.preventDefault();

        tinyMCE.triggerSave();

        var self = $(this);
        var data = self.serialize();

        $.ajax({
            url: '',
            type: 'POST',
            data: data + '&action=edit_about',
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                checkFormValidations(self, response, function()
                {
                    $('[data-modal="edit_about"]').removeClass('view').animate({scrollTop: 0}, 0);

                    $('[data-modal="success"] main > p').html(response.message);
                    $('[data-modal="success"]').addClass('view').animate({scrollTop: 0}, 0);
                });
            }
        });
    });

    /* Modal to edit notices
    ------------------------------------------------------------------------------- */
    $('[data-modal="edit_notices"]').modal().onSuccess(function()
    {
        $('form[name="edit_notices"]').submit();
    });

    /* Edit notices
    ------------------------------------------------------------------------------- */
    $('form[name="edit_notices"]').on('submit', function(e)
    {
        e.preventDefault();

        tinyMCE.triggerSave();

        var self = $(this);
        var data = self.serialize();

        $.ajax({
            url: '',
            type: 'POST',
            data: data + '&action=edit_notices',
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                checkFormValidations(self, response, function()
                {
                    $('[data-modal="edit_contact"]').removeClass('view').animate({scrollTop: 0}, 0);

                    $('[data-modal="success"] main > p').html(response.message);
                    $('[data-modal="success"]').addClass('view').animate({scrollTop: 0}, 0);
                });
            }
        });
    });

    /* Modal to edit seo
    ------------------------------------------------------------------------------- */
    $('[data-modal="edit_seo"]').modal().onSuccess(function()
    {
        $('form[name="edit_seo"]').submit();
    });

    /* Edit seo
    ------------------------------------------------------------------------------- */
    $('form[name="edit_seo"]').on('submit', function(e)
    {
        e.preventDefault();

        var self = $(this);
        var data = self.serialize();

        $.ajax({
            url: '',
            type: 'POST',
            data: data + '&action=edit_seo',
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                checkFormValidations(self, response, function()
                {
                    $('[data-modal="edit_seo"]').removeClass('view').animate({scrollTop: 0}, 0);

                    $('[data-modal="success"] main > p').html(response.message);
                    $('[data-modal="success"]').addClass('view').animate({scrollTop: 0}, 0);
                });
            }
        });
    });
});
