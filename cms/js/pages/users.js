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
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

$(document).ready(function()
{
    var id;

    /* Table
    ------------------------------------------------------------------------------- */
    $(document).find('table').DataTable({
        dom: 'Bfrtip',
        buttons: [

        ],
        'columnDefs': [
            {
                'orderable': true,
                'targets': '_all'
            },
            {
                'className': 'text-left',
                'targets': '_all'
            }
        ],
        'order': [
            [2,'asc']
        ],
        'searching': true,
        'info': true,
        'paging': true,
        'language': {

        }
    });

    /* Get
    ------------------------------------------------------------------------------- */
    $('[data-action="get"]').on('click', function()
    {
        id = $(this).data('id');

        $.ajax({
            url: '',
            type: 'POST',
            data: 'id=' + id + '&action=get',
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                if (response.status == 'success')
                {
                    $('input[name="fullname"]').val(response.data.fullname);
                    $('input[name="email"]').val(response.data.email);
                    $('input[name="username"]').val(response.data.username);
                    $('select[name="level"]').val(response.data.id_user_level);
                    $('input[name="avatar"]').parents('.uploader').find('figure[data-preview] > img').attr('src', '../uploads/' + ((response.data.avatar != null) ? response.data.avatar : '../images/empty.png'));
                    $('select[name="status"]').val(response.data.status);
                    $('[data-modal="datas"] header > h4').html('Detalles | Editar');
                    $('[data-modal="datas"]').addClass('view').animate({scrollTop: 0}, 0);

                    if ($(this).data('restore') == null)
                    {
                        $('input[name="fullname"]').attr('disabled', true);
                        $('input[name="email"]').attr('disabled', true);
                        $('input[name="username"]').attr('disabled', true);
                        $('input[name="password"]').val('');
                        $('input[name="password"]').attr('disabled', false);
                        $('select[name="level"]').attr('disabled', true);
                        $('input[name="avatar"]').attr('disabled', true);
                        $('select[name="status"]').attr('disabled', true);
                        $('[data-modal="datas"] main > form').attr('data-submit-action', 'restore');
                    }
                    else
                    {
                        $('input[name="fullname"]').attr('disabled', false);
                        $('input[name="email"]').attr('disabled', false);
                        $('input[name="username"]').attr('disabled', false);
                        $('input[name="password"]').val(response.data.password);
                        $('input[name="password"]').attr('disabled', true);
                        $('select[name="level"]').attr('disabled', false);
                        $('input[name="avatar"]').attr('disabled', false);
                        $('select[name="status"]').attr('disabled', false);
                        $('[data-modal="datas"] main > form').attr('data-submit-action', 'edit');
                    }
                }
                else
                {
                    $('[data-modal="alert"] main > p').html(response.message);
                    $('[data-modal="alert"]').addClass('view').animate({scrollTop: 0}, 0);
                }
            }
        });
    });

    /* Modal to create or edit
    ------------------------------------------------------------------------------- */
    $('[data-modal="datas"]').modal().onSuccess(function()
    {
        $('form[name="datas"]').submit();
    });

    $('[data-modal="datas"]').modal().onCancel(function()
    {
        $('input[name="fullname"]').attr('disabled', false);
        $('input[name="email"]').attr('disabled', false);
        $('input[name="username"]').attr('disabled', false);
        $('input[name="password"]').attr('disabled', false);
        $('select[name="level"]').attr('disabled', false);
        $('figure[data-preview] > img').attr('src', '../images/empty.png');
        $('input[name="avatar"]').attr('disabled', false);
        $('select[name="status"]').attr('disabled', false);
        $('[data-modal="datas"] header > h4').html('Nuevo');
        $('[data-modal="datas"] main > form').attr('data-submit-action', 'new');
        $('[data-modal="datas"] main > form')[0].reset();
        $('[data-modal="datas"] main > form [name]').parent().removeClass('error');
        $('[data-modal="datas"] main > form [name]').parent().find('p.error').remove();
    });

    /* Create or edit
    ------------------------------------------------------------------------------- */
    $('form[name="datas"]').on('submit', function(e)
    {
        e.preventDefault();

        var data = new FormData(this);

        data.append('id', id);
        data.append('action', $(this).data('submit-action'));

        $.ajax({
            url: '',
            type: 'POST',
            data: data,
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                checkFormValidations($(this), response, function()
                {
                    $('[data-modal="datas"]').removeClass('view').animate({scrollTop: 0}, 0);
                    $('[data-modal="success"] main > p').html(response.message);
                    $('[data-modal="success"]').addClass('view').animate({scrollTop: 0}, 0);
                });
            }
        });
    });

    /* Delete
    ------------------------------------------------------------------------------- */
    $('[data-action="delete"]').on('click', function()
    {
        id = $(this).data('id');
        $('[data-modal="delete"]').addClass('view').animate({scrollTop: 0}, 0);
    });

    $('[data-modal="delete"]').modal().onSuccess(function()
    {
        $.ajax({
            url: '',
            type: 'POST',
            data: 'id=' + id + '&action=delete',
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                $('[data-modal="delete"]').removeClass('view').animate({scrollTop: 0}, 0);

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
});
