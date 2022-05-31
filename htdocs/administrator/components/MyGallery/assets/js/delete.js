$(document).ready(function () {
    $('[data-delete]').on('click', function () {
        let self = $(this);
        let message = '';
        let xhr_status = '';

        swal({
            text: 'Se eliminará la galería.',
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
                    $.post('index.php/gallery/delete', { id: self.data('delete') }, function (data, status, jqXHR) {
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
                    text: 'Se eliminó la galería.',
                    preConfirm: function () {
                        return new Promise(function (resolve) {
                            $.app.removeElementTarget(self.parents('[data-gallery]'));

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
