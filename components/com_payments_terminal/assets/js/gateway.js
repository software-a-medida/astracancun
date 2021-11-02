"use strict";

$( document ).ready(function ()
{
    var myDocument = $(this);
    var owl = $('main.owl-carousel');
    var speedTransition = 500;

    owl.owlCarousel({
        autoplay: false,
        loop: false,
        margin: 0,
        nav: false,
        dots: false,
        mouseDrag: false,
        touchDrag: false,
        pullDrag: false,
        autoHeight: true,
        responsive: {
            0: {
                items: 1
            }
        }
    });

    // Page 1
    myDocument.on('change', '[name="payment_method"]', function ()
    {
        var self = $(this);

        if ( self.val() == 'paypal' )
            $('[name="personal_data"]').addClass('disabled');
        else
            $('[name="personal_data"]').removeClass('disabled');
    });

    myDocument.on('click', '#btn_process_payment', function ()
    {
        $('form[name="personal_data"]').submit();
    });

    myDocument.on('submit', 'form[name="personal_data"]', function ( event )
    {
        event.preventDefault();

        var self = $(this);
        var data = new FormData(this);

        data.append('step', 1);
        data.append('payment_method', $('#page1 input[name="payment_method"]:checked').val());

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
                    if ( response.redirect )
                        location.href = response.redirect;
                    else
                        owl.trigger('to.owl.carousel', [response.page, speedTransition]);
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

                owl.trigger('refresh.owl.carousel');
            }
        });
    });
});

$( document ).ready(function ()
{
    var myDocument = $(this);

    myDocument.on('click', '[disabled]', function ( event )
    {
        return false;
    });
});
