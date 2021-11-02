"use strict";

$( document ).ready(function ()
{
    var MyDocument = $(this);

    MyDocument.on('submit', 'form[name="create_order"]', function ( event )
    {
        event.preventDefault();

        var self = $(this);
        var data = new FormData(this);

        $.ajax({
            type: "POST",
            data: data,
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'json',
            success: function ( response )
            {
                $('label.error').removeClass('error');
                $('label > p.error').remove();

                if ( response.status == 'success' )
                {
                    location.href = response.redirect;
                }
                else
                {
                    if ( response.labels && response.labels.length > 0 )
                    {
                        $.each(response.labels, function (i, label)
                        {
                            var a = self.find('input[name="'+ label[0] +'"]').parents('label');
                            a.addClass('error').append('<p class="error">'+ label[1] +'</p>');
                        });

                        $('label.error :input:visible:enabled:first').focus();
                    }
                }
            }
        });
    });
});
