$(document).ready(function () {
    $('[data-ajax-delete]').on('click', function () {
        let self = $(this);
        let message = '';
        let xhr_status = '';

        swal({
            text: '¿Está seguro de eliminar?',
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
                    $.post('index.php/services/delete', { id: self.data('ajax-delete') }, function (data, status, jqXHR) {
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
                            location.reload();

                            setTimeout(function () {
                                resolve();
                            }, 5000);
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
