'use strict';

/* CLICK
------------------------------------------------------------------------------*/
var VK_CLICK = (!document.ontouchstart ? 'click' : 'touchend');

/* Acciones en el DOM
------------------------------------------------------------------------------*/
$( document ).ready(function ()
{
    var MyDocument = $( this );

    // Remueve todos los elementos abiertos como menus, dropdows con la clase "open"
    MyDocument.on(VK_CLICK, 'html,body', function () { $('*.open').removeClass('open'); });
    // Elimina la accion del click a elementos sin un link o con el atributo "disabled"
    MyDocument.on(VK_CLICK, '[href=""],[disabled]', function () { return false; });

    /*
    * Dropdown Menu
    */
    MyDocument.on(VK_CLICK, '.dropmenu > button', function ( event )
    {
        event.stopPropagation();
        $('.dropmenu > .dropdown.open').removeClass('open');

        var self = $( this );
        var dropmenu = self.parent();
        var dropdown = dropmenu.find('> .dropdown');

        dropdown.addClass('open');
        dropdown.find('a:not([href])').on(VK_CLICK, function ( event ) { event.stopPropagation(); });
    });
    /** END **/



    /*
    * Modal
    */
    MyDocument.on(VK_CLICK, '[data-button-modal]', function ()
    {
        var self = $( this );
        var target = self.data('button-modal');
        var modal = MyDocument.find('[data-modal="'+ target +'"]');

        $('body').addClass('noscroll');
        modal.addClass('view').animate({ scrollTop: 0 }, 300);
    });

    $('[data-modal]').each(function ()
    {
        var self = $( this );
        var content = self.find('> div.content');
        var closeOnOverlay = self.data('close-on-overlay');
        var buttonClose = self.find('[button-close]');
        var buttonCancel = self.find('[button-cancel]');

        content.on(VK_CLICK, function ( event ) { event.stopPropagation(); });

        if ( closeOnOverlay === true )
            self.on(VK_CLICK, function () { close(); });

        buttonClose.on(VK_CLICK, function () { close(); });

        buttonCancel.on(VK_CLICK, function ()
        {
            self.find('label.error').removeClass('error');
            self.find('p.pre-error').hide().removeClass('error');
            self.find('p.error:not(p.pre-error)').remove();
            self.find('div.image-preview').removeAttr('style');
        });

        function close ()
        {
            $('body').removeClass('noscroll');
            self.removeClass('view');
        }
    });
    /** END **/



    /*
    * SmoothScroll
    */
    MyDocument.on(VK_CLICK, '[smooth-scroll]', function ( event )
    {
        if ( location.pathname.replace(/^\//, "") === this.pathname.replace(/^\//, "") && location.hostname === this.hostname )
        {
            var element = $(this.hash);
                element = element.length ? element : $("[name=" + this.hash.slice(1) + "]");

            if ( element.length )
            {
                $("html,body").animate({scrollTop: element.offset().top}, 1000);
                return false;
            }
        }
    });
    /** END **/
});

/* FUNCIONES
------------------------------------------------------------------------------*/
/**
* @name Modal
* @description Ventanas modal
*
* @return var myModal
*   @description El propio elemento modal en jQuery
*
*   @return element
*
* @return function close()
*   @description accion para cerrar el modal
*
*   @return null.
*
* @return function onCancel()
*   @description accion para cancelar el modal
*   @param function callback
*
*   @return null
*
* @return function onSuccess()
*   @description accion para cuando existe un exito
*   @param function callback
*
*   @return null
*/
$.fn.modal = function ()
{
    var self = $( this );
    var buttonCancel = self.find('[button-cancel]');
    var buttonSuccess = self.find('[button-success]');

    var modal = {
        myModal: self,
        close: function ()
        {
            $('body').removeClass('noscroll');
            self.removeClass('view');
        },
        onCancel: function ( callback )
        {
            buttonCancel.on(VK_CLICK, function ()
            {
                if ( callback != null )
                    callback();

                modal.close();
            });
        },
        onSuccess: function ( callback )
        {
            buttonSuccess.on(VK_CLICK, function ()
            {
                if ( callback != null )
                    callback( modal );
            });
        }
    }

    return modal;
};
/** END **/



/**
* @name Parallax
* @description Efecto parallax para un elemento en el DOM
* @param int velocidad de movimiento
* @param string (up|down) direccion de movimiento.
*
* @return null
*/
$.fn.parallax = function ( speed, direction )
{
    var self = $( this );
    var config = {};
    var MyDocument = $( document );
    var touchSupported = ( ( 'ontouchstart' in window ) || window.DocumentTouch && document instanceof DocumentTouch );

    config.parallax = self.find('[data-parallax]');
    config.pixelsTop = self.offset().top;
    config.startParallax = config.pixelsTop - $( window ).height();
    config.speed = speed ? speed : 5;
    config.direction = direction == 'up' ? '-' : '';

    MyDocument
        .each(function () { scroller(); })
        .on('scroll', function () { scroller(); });

    if ( touchSupported )
        MyDocument.on('touchmove', function () { scroller(); });

    function scroller()
    {
        if ( MyDocument.scrollTop() >= config.startParallax )
        {
            var scroll = ( ( MyDocument.scrollTop() - config.startParallax ) / config.speed );

            config.parallax.css({
                '-webkit-transform': 'translate(0px, '+ config.direction + scroll +'px)',
                'transform': 'translate(0px, '+ config.direction + scroll +'px)'
            });
        }
        else
        {
            config.parallax.css({
                '-webkit-transform': 'translate(0px, 0px)',
                'transform': 'translate(0px, 0px)'
            });
        }
    }
}
/** END **/



/**
* @name ScrollDown
* @description Agrega una clase al momento de hacer scrolldown en un elemento establecido, si no se establece usara el documento.
* @param $class string clase a colocar al momento de cumplir la distancia de scroll
* @param $distance int distancia que debe cumplir
* @param $container element|null elemento que tomara de referencia para el scroll, si no se coloca usara el documento
*
* @return null;
*/
$.fn.scrollDown = function ( $class, $distance, $container )
{
    var self = $(this);

    if ( !$container )
        $container = $( document );

    $container
        .each(function () { scroller() })
        .on("scroll", function () { scroller() });

    function scroller ()
    {
        if ( $container.scrollTop() > $distance )
            self.addClass($class);
        else
            self.removeClass($class);
    }
}
/** END **/
