$(document).ready(function () {
    $.app.editorTinymce('[tinymce]')
    $.app.uploadImagePreview('#image_cover')
    $.app.uploadImagePreview('#sm_image_cover')

    $(document).on('imageIsValid', 'input[type="file"]', function (event) {
        let container = event.detail.container;
        let image = $('<figure/>', { class: 'm-0', style: 'height: 400px;' }).append(
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

    let form = $('form[name="aboutus"]').ajaxSubmit({
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
        let _ = new FormData($('form[name="aboutus"]')[0])

        _.append("description[es]", tinyMCE.editors[0].getContent({ format: 'html' }))
        _.append("description[en]", tinyMCE.editors[1].getContent({ format: 'html' }))

        form.send(_);
    });
});
