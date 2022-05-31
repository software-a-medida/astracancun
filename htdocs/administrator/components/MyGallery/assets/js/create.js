$(document).ready(function () {
    $('#save').ajaxSubmit({
        typeSend: 'click',
        formSubmit: $('form[name="create"]'),
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
                        window.location.href = response.redirect;

                        setTimeout(function () {
                            resolve();
                        }, 5000);
                    });
                }
            });
        }
    });
});
