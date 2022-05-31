$(document).ready(function () {
    $('#save').ajaxSubmit({
        url: 'index.php/media/upload',
        typeSend: 'click',
        formSubmit: $('form[name="upload_media"]'),
        textReDrawButton: true,
        httpError: function (request, error) {
            alertify.error(request.status + ': ' + request.statusText);
        },
        onError: function (response) {
            if (Array.isArray(response.data) && response.data.length >= 1) {
                for (let data of response.data) {
                    alertify.error(data.message);
                }
            } else {
                alertify.error(response.message);
            }
        },
        success: function (response) {
            if (Array.isArray(response.data) && response.data.length >= 1) {
                for (let data of response.data) {
                    let html = $('<div/>', { class: 'col-6 col-md-4 col-lg-6 col-xl-4 m-b-20', 'data-multimedia': '' }).append(
                        $('<div/>', { class: 'card m-b-30' }).append(
                            $('<figure/>', { class: 'elm-stretched m-b-0', style: 'height: 160px' }).append(
                                $('<a/>', { href: data.root + data.file, 'data-fancybox': 'media' }).append(
                                    $('<img/>', { class: 'card-img-top img-cover', src: data.root + data.thumb })
                                )
                            ),
                            $('<ul/>', { class: 'list-group list-group-flush' }).append(
                                $('<li/>', { class: 'list-group-item' }).append(
                                    $('<a/>', { href: data.root + data.file, class: 'card-link d-block', target: '_blank' }).append(
                                        $('<small/>', { text: ' Ver en otra ventana' }).prepend(
                                            $('<i/>', { class: 'mdi mdi-link-variant' }),
                                        )
                                    )
                                ),
                                $('<li/>', { class: 'list-group-item' }).append(
                                    $('<a/>', { href: 'javascript:copytoclipboard("' + data.root + data.file + '")', class: 'card-link d-block' }).append(
                                        $('<small/>', { text: ' Copiar link de acceso' }).prepend(
                                            $('<i/>', { class: 'mdi mdi-content-copy' })
                                        )
                                    )
                                ),
                                $('<li/>', { class: 'list-group-item' }).append(
                                    $('<a/>', { href: 'javascript:void(0);', class: 'btn btn-danger btn-block p-5', 'data-delete': data.id, text: ' Eliminar' }).prepend(
                                        $('<i/>', { class: 'mdi mdi-delete' })
                                    )
                                ),
                            )
                        )
                    );

                    let container = $('.upload_image_preview');
                    let image = $('<figure/>', { class: 'm-0' }).append(
                        $('<img/>', { class: 'img-fluid', src: $('.upload_image_preview').data('image-default') })
                    );

                    container.find('> figure').remove();
                    container.prepend(image);
                    $('[add-media]').prepend(html);

                    setTimeout(function () {
                        alertify.success(data.file + ' subido.');
                    }, 100);
                }
            }

            $('[name="data[]"]').val('');
        }
    });

    $(document).on('click', '[data-delete]', function (params) {
        let self = $(this);
        let message = '';
        let xhr_status = '';

        swal({
            text: 'Se eliminará el archivo multimedia.',
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
                    $.post('index.php/media/delete', { id: self.data('delete') }, function (data, status, jqXHR) {
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
                    text: 'Se eliminó el archivo multimedia.',
                    preConfirm: function () {
                        return new Promise(function (resolve) {
                            $.app.removeElementTarget(self.parents('[data-multimedia]'));

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
    })
});

function copytoclipboard(data) {
    const el = document.createElement('textarea');
    el.value = data;
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);

    alertify.success('Link copiado.');
}