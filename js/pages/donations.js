'use strict';

/**
* @package valkyrie.pages.js
*
* @author Irving Martinez Santiago <Chief Software Development Officer, imartinez@codemonkey.com.mx>
* @since December 03 - 29, 2018 <@create>
* @version 1.0.0
* @summary (Proyecto)
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

$(document).ready(function()
{
    /* Stories slideshow
    ------------------------------------------------------------------------------- */
    $(document).find('#stories').owlCarousel({
        items: 1,
        loop: true,
        margin: 0,
        autoplay: true,
        autoplayTimeout: 10000,
        dots: true,
        nav: true
    });

    /* Donation
    ------------------------------------------------------------------------------- */
    $('[data-modal="beca"]').modal().onSuccess(function()
    {
        $('form[name="beca"]').submit();
    });

    $('[data-modal="patrocina"]').modal().onSuccess(function()
    {
        $('form[name="patrocina"]').submit();
    });

    $('[data-modal="apadrina"]').modal().onSuccess(function()
    {
        $('form[name="apadrina"]').submit();
    });

    $('[data-modal="especie"]').modal().onSuccess(function()
    {
        $('form[name="especie"]').submit();
    });

    $('[data-modal="dinero"]').modal().onSuccess(function()
    {
        $('form[name="dinero"]').submit();
    });

    $('[data-modal="tiempo"]').modal().onSuccess(function()
    {
        $('form[name="tiempo"]').submit();
    });

    $('[data-modal="beca"]').modal().onCancel(function()
    {
        $('[data-modal="beca"] main > form')[0].reset();
    });

    $('[data-modal="patrocina"]').modal().onCancel(function()
    {
        $('[data-modal="patrocina"] main > form')[0].reset();
    });

    $('[data-modal="apadrina"]').modal().onCancel(function()
    {
        $('[data-modal="apadrina"] main > form')[0].reset();
    });

    $('[data-modal="especie"]').modal().onCancel(function()
    {
        $('input[name="others"]').parent().parent().addClass('hidden');
        $('[data-modal="especie"] main > form')[0].reset();
    });

    $('[data-modal="dinero"]').modal().onCancel(function()
    {
        $('input[name="others"]').parent().parent().addClass('hidden');
        $('[data-modal="dinero"] main > form')[0].reset();
    });

    $('[data-modal="tiempo"]').modal().onCancel(function()
    {
        $('input[name="others"]').parent().parent().addClass('hidden');
        $('[data-modal="tiempo"] main > form')[0].reset();
    });

    $('form[name="beca"]').on('submit', function(e)
    {
        e.preventDefault();

        var self = $(this);
        var data = self.serialize();

        $.ajax({
            url: '',
            type: 'POST',
            data: data + '&action=beca',
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                checkFormValidations(self, response, function()
                {
                    alert(response.message);
                    $('body').prepend('<div data-ajax-loader><div class="loader"></div></div>');
                    location.reload();
                });
            }
        });
    });

    $('form[name="patrocina"]').on('submit', function(e)
    {
        e.preventDefault();

        var self = $(this);
        var data = self.serialize();

        $.ajax({
            url: '',
            type: 'POST',
            data: data + '&action=patrocina',
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                checkFormValidations(self, response, function()
                {
                    alert(response.message);
                    $('body').prepend('<div data-ajax-loader><div class="loader"></div></div>');
                    location.reload();
                });
            }
        });
    });

    $('form[name="apadrina"]').on('submit', function(e)
    {
        e.preventDefault();

        var self = $(this);
        var data = self.serialize();

        $.ajax({
            url: '',
            type: 'POST',
            data: data + '&action=apadrina',
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                checkFormValidations(self, response, function()
                {
                    alert(response.message);
                    $('body').prepend('<div data-ajax-loader><div class="loader"></div></div>');
                    location.reload();
                });
            }
        });
    });

    $('form[name="especie"]').on('submit', function(e)
    {
        e.preventDefault();

        var self = $(this);
        var data = self.serialize();

        $.ajax({
            url: '',
            type: 'POST',
            data: data + '&action=especie',
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                checkFormValidations(self, response, function()
                {
                    alert(response.message);
                    $('body').prepend('<div data-ajax-loader><div class="loader"></div></div>');
                    location.reload();
                });
            }
        });
    });

    $('form[name="dinero"]').on('submit', function(e)
    {
        e.preventDefault();

        var self = $(this);
        var data = self.serialize();

        $.ajax({
            url: '',
            type: 'POST',
            data: data + '&action=dinero',
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                checkFormValidations(self, response, function()
                {
                    $('body').prepend('<div data-ajax-loader><div class="loader"></div></div>');
                    window.location.href = response.path;
                });
            }
        });
    });

    $('form[name="tiempo"]').on('submit', function(e)
    {
        e.preventDefault();

        var self = $(this);
        var data = self.serialize();

        $.ajax({
            url: '',
            type: 'POST',
            data: data + '&action=tiempo',
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                checkFormValidations(self, response, function()
                {
                    alert(response.message);
                    $('body').prepend('<div data-ajax-loader><div class="loader"></div></div>');
                    location.reload();
                });
            }
        });
    });

    $('input[name="donation"]').on('change', function()
    {
        if ($(this).val() == 'others' || $(this).val() == 'hotel')
        {
            if ($(this).is(':checked'))
                $('input[name="others"]').parent().parent().removeClass('hidden');
            else
                $('input[name="others"]').parent().parent().addClass('hidden');
        }
        else
            $('input[name="others"]').parent().parent().addClass('hidden');
    });
});
