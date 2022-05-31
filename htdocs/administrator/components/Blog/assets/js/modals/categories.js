$(document).ready(function () {
    $.app.uploadImagePreview('#image_upload_categories')

    $(document).on('imageIsValid', 'input[type="file"]', function (event) {
        let container = event.detail.container;
        let image = $('<figure/>', { class: 'm-0' }).append(
            $('<img/>', { class: 'img-fluid', src: event.detail.image })
        );

        container.find('> figure').remove();
        container.prepend(image);
    });

    $(document).on('imageIsInvalid', 'input[type="file"]', function (event) {
        let container = event.detail.container;
        let image = $('<figure/>', { class: 'm-0' }).append(
            $('<img/>', { class: 'img-fluid', src: container.data('image-default') })
        );

        container.find('> figure').remove();
        container.prepend(image);
        $(this).val('');
    });
    
    function render_row(data) {
        let html = $("<tr/>").append(
            $("<td/>", { class: 'text-danger', text: data.title['es'] }),
            $("<td/>").append(
                $("<div/>", { class: 'content-cell' }).append(
                    $("<div/>", { class: 'button-items text-right' }).append(
                        $("<a/>", { class: 'btn btn-danger waves-effect waves-light', href: 'javascript:void(0);', 'data-ajax-delete': data.id }).append(
                            $("<i/>", { class: 'fa fa-trash' })
                        )
                    ),
                ),
            )
        );

        $('#table_categories tbody').append(html);

        if ($('select[name="category"]').length > 0) {
            $('select[name="category"]').append(new Option(data.title['es'], data.id))
        }
    }

    $.get('index.php/blog/categories/list', function (data) {
        if (data.status == 'OK') {
            for (let value of Object.entries(data.list)) {
                render_row(value[1]);
            }

            if ($('select[name="category"][data-value]').length > 0) {
                let category_value = $('select[name="category"][data-value]').data('value');
                $('select[name="category"][data-value]').find('option[value="' + category_value + '"]').attr("selected", true);
            }
        }
    });

    $('#categories form[name="create"]').ajaxSubmit({
        url: 'index.php/blog/categories/create',
        textReDrawButton: true,
        onError: function (response) {
            alertify.error(response.message);
        },
        success: function (response) {
            render_row(response.data);

            $('#categories form input,#categories form textarea').val('');
            $('#categories form p.error').remove();
            $('#categories form label.error').removeClass('error');

            let container = $('.upload_image_preview');
            let image = $('<figure/>', { class: 'm-0' }).append(
                $('<img/>', { class: 'img-fluid', src: $('.upload_image_preview').data('image-default') })
            );

            container.find('> figure').remove();
            container.prepend(image);

            alertify.success('Categoría agregada.');
        }
    });

    $(document).on('click', '#categories [data-ajax-delete]', function () {
        let self = $(this);
        let message = '';
        let xhr_status = '';

        swal({
            text: '¿Desea continuar?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#54cc96',
            cancelButtonColor: '#ff5560',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
            showLoaderOnConfirm: true,
            allowOutsideClick: false,
            preConfirm: function () {
                return new Promise(function (resolve) {
                    $.post('index.php/blog/categories/delete', { id: self.data('ajax-delete') }, function (data) {
                        if (data.status == 'OK') {
                            xhr_status = 'OK';
                        }
                        else {
                            xhr_status = 'error';
                            message = (!data.message) ? 'Error' : data.message;
                        }

                        setTimeout(function () {
                            resolve();
                        }, 500);
                    });
                });
            }
        }).then(function () {
            if (xhr_status == 'OK') {
                swal({
                    type: 'success',
                    text: 'Se eliminó.',
                    preConfirm: function () {
                        return new Promise(function (resolve) {
                            $.app.removeElementTarget(self.parents('tr'));

                            if ($('select[name="category"]').length > 0) {
                                $('select[name="category"] option[value="' + self.data('ajax-delete') + '"]').remove();
                            }

                            resolve();
                        });
                    }
                });
            }
            else {
                swal({
                    type: 'error',
                    text: 'Error',
                    html: message
                });
            }

        });
    });
});