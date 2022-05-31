$(document).ready(function () {
    let form = $('form[name="create"]').ajaxSubmit({
        typeSend: 'manual',
        buttonSubmit: $('#publish'),
        textReDrawButton: false,
        onError: function (response) {
            alertify.error(response.message);
        },
        success: function (response) {
            swal({
                text: 'Publicado.',
                type: 'success',
                showLoaderOnConfirm: true,
                allowOutsideClick: false,
                preConfirm: function () {
                    return new Promise(function (resolve) {
                        window.location.href = response.redirect;

                        setTimeout(function () {
                            resolve();
                        }, 5000);
                    });
                }
            });
        }
    });

    $(document).on('click', '#publish', function () {
        let _ = new FormData($('form[name="create"]')[0])

        _.append('description', tinyMCE.activeEditor.getContent({ format: 'html' }))

        form.send(_);
    });
});
