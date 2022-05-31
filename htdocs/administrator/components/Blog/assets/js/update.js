$(document).ready(function () {
    let form = $('form[name="update"]').ajaxSubmit({
        typeSend: 'manual',
        textReDrawButton: true,
        onError: function (response) {
            alertify.error(response.message);
        },
        success: function (response) {
            swal({
                text: 'Se actualizó.',
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

    $(document).on('click', '#save', function () {
        let _ = new FormData($('form[name="update"]')[0])

        _.append('description', tinyMCE.activeEditor.getContent({ format: 'html' }))

        form.send(_);
    });
});
