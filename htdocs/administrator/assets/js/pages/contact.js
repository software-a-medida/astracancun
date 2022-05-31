$(document).ready(function () {
    $('input[type="tel"]').inputmask("(999) 999-9999");

    $.app.uploadImagePreview('#image_cover')
    $.app.uploadImagePreview('#sm_image_cover')

    $(document).on('imageIsValid', 'input[type="file"]', function (event) {
        let container = event.detail.container;
        let image = $('<figure/>', { class: 'm-0', style: 'height: 300px;' }).append(
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

    let form = $('form[name="contact"]').ajaxSubmit({
        typeSend: 'manual',
        textReDrawButton: true,
        onError: function (response) {
            alertify.error(response.message);
        },
        success: function (response) {
            swal({
                text: 'Guardado.',
                type: 'success',
                showLoaderOnConfirm: true,
                allowOutsideClick: false,
                preConfirm: function () {
                    return new Promise(function (resolve) {
                        resolve();
                    });
                }
            });
        }
    });

    $(document).on('click', '#save', function () {
        let _ = new FormData($('form[name="contact"]')[0])

        form.send(_);
    });
});
