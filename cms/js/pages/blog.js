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
           [4,'asc']
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
                   $('input[name="name_es"]').val(response.data.name.es);
                   $('input[name="name_en"]').val(response.data.name.en);
                   $('textarea[name="description_es"]').val(response.data.description.en);
                   $('textarea[name="description_en"]').val(response.data.description.en);
                   $('input[name="cover"]').parents('.uploader').find('figure[data-preview] > img').attr('src', '../uploads/' + response.data.cover);
                   $('select[name="author"]').val(response.data.id_user);
                   $('input[name="priority"]').val(response.data.priority);
                   $('input[name="seo_keywords_es"]').val(response.data.seo.keywords.es);
                   $('input[name="seo_keywords_en"]').val(response.data.seo.keywords.es);
                   $('input[name="seo_description_es"]').val(response.data.seo.description.es);
                   $('input[name="seo_description_en"]').val(response.data.seo.description.en);
                   $('[data-modal="datas"] header > h4').html('Detalles | Editar');
                   $('[data-modal="datas"] main > form').attr('data-submit-action', 'edit');
                   $('[data-modal="datas"]').addClass('view').animate({scrollTop: 0}, 0);
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
       $('figure[data-preview] > img').attr('src', '../images/empty.png');
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

       tinyMCE.triggerSave();

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

   /* Gallery
   ------------------------------------------------------------------------------- */
   $('[data-action="new"]').on('click', function()
   {
       $('input[name="new"]').click();
   });

   $('input[name="new"]').on('change', function()
   {
       if ($(this)[0].files[0].type.match($(this).attr('accept')))
       {
           var reader = new FileReader();

           reader.onload = function(e)
           {
               $.ajax({
                   url: '',
                   type: 'POST',
                   data: 'image=' + e.target.result + '&action=new',
                   processData: false,
                   cache: false,
                   dataType: 'json',
                   success: function(response)
                   {
                       if (response.status == 'success')
                       {
                           $('body').prepend('<div data-ajax-loader><div class="loader"></div></div>');
                           location.reload();
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
});
