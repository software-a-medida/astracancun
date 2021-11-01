<?php defined('_EXEC') or die;

/**
* @package valkyrie.layouts.contact
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since August 01 - 18, 2018 <@create>
* @version 1.0.0
* @summary cm-valkyrie-platform-website-template
*
* @author Irving Martinez Santiago <Chief Software Development Officer, imartinez@codemonkey.com.mx>
* @since December 03 - 29, 2018 <@update>
* @version 1.1.0
* @summary (Proyecto) Se integró el maquetado de la GUI y las funcionalidades de Google Maps
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

$this->dependencies->add(['js', '{$path.js}pages/contact.min.js']);
$this->dependencies->add(['other',
'<script type="text/javascript">
    var map;
    var marker;

    function initMap()
    {
        map = new google.maps.Map(document.getElementById("map"), {
            center: {lat: 21.1646457, lng: -86.8343684},
            zoom: 18,
            scrollwheel: false
        });

        var place = new google.maps.LatLng(21.1646457, -86.8343684);
        marker = new google.maps.Marker({
            position: place,
            title: "Astra, AC - Asociación de Ayuda a Niños con Trastornos en el Desarrollo, A.C.",
            draggable: true,
            animation: google.maps.Animation.DROP,
            map : map
        });
        marker.addListener("click", toggleBounce)
        google.maps.event.addListener(marker,"click", showInfo)
    }

    function showInfo()
    {
        map.setZoom(18);
        map.setCenter(marker.getPosition());
        var infowindow = new google.maps.InfoWindow({
            content: "<strong>Cancún, Q.Roo </strong><br>Astra, AC - Asociación de Ayuda a Niños con Trastornos en el Desarrollo, A.C."
        });
        infowindow.open(map,marker);
    }

    function toggleBounce()
    {
        if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
        } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        }
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLCea8Q6BtcTHwY3YFCiB0EoHE5KnsMUE&callback=initMap"></script>']);

?>

%{header}%
<section class="home cover min">
    <figure>
        <img src="{$path.uploads}{$cover}" alt="Cover">
    </figure>
    <div class="container">
        <div class="title">
            <h1>{$title}</h1>
        </div>
    </div>
</section>
<section class="contact">
    <div class="content">
        <form name="contact">
            <fieldset class="fields-group">
                <p class="warning"><span class="required-field">*</span>{$lang.required_fields}</p>
            </fieldset>
            <fieldset class="fields-group">
                <div class="text">
                    <h6><span class="required-field">*</span>{$lang.name}</h6>
                    <input type="text" name="fullname">
                </div>
            </fieldset>
            <fieldset class="fields-group">
                <div class="text">
                    <h6><span class="required-field">*</span>{$lang.email}</h6>
                    <input type="email" name="email">
                </div>
            </fieldset>
            <fieldset class="fields-group">
                <div class="text">
                    <h6>{$lang.phone}</h6>
                    <input type="text" name="phone">
                </div>
            </fieldset>
            <fieldset class="fields-group">
                <div class="text">
                    <h6><span class="required-field">*</span>{$lang.message}</h6>
                    <textarea name="message"></textarea>
                </div>
            </fieldset>
            <a href="" class="btn btn-colored" data-action="contact">{$lang.send}</a>
        </form>
    </div>
    <div class="map">
        <div id="map"></div>
        <div class="cover">
            <div class="contact-info">
                <h6><i class="fas fa-location-arrow"></i>{$address}</h6>
                <h6><i class="fas fa-envelope"></i>{$email}</h6>
                <h6><i class="fas fa-phone"></i>{$phone}</h6>
            </div>
            <div class="social-media">
                <a href="https://facebook.com/{$facebook}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://instagram.com/{$instagram}" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://twitter.com/{$twitter}" target="_blank"><i class="fab fa-twitter"></i></a>
                <div class="clear"></div>
            </div>
            <a class="view-map" data-action="viewMap">Ver mapa</a>
        </div>
        <div class="close-map">
            <a data-action="closeMap">Cerrar mapa</a>
        </div>
    </div>
    <div class="clear"></div>
</section>
