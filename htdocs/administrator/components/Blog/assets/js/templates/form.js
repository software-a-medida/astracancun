$(document).ready(function () {
    $.app.editorTinymce('[tinymce]')
    $.app.uploadImagePreview('#image_cover')
    $.app.uploadImagePreview('#sm_image_cover')

    $(document).on('keyup', '[data-base-url]', function () {
        let self = $(this);
        let value = self.val();
        let target = self.data('base-url');

        let ajax = $('[name="title"]').ajaxSubmit({
            url: 'index.php/blog/tools?t=get_url',
            typeSend: 'manual',
            data: {
                string: value
            },
            onError: function (response) {
                alertify.error(response.message);
            },
            success: function (response) {
                $(target).text(response.url);
            }
        });

        ajax.send();
    });

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
});
