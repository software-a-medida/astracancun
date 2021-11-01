<?php

defined('_EXEC') or die;

/**
* @package valkyrie.cms.layouts
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since August 01 - 18, 2018 <@create>
* @version 1.0.0
* @summary cm-valkyrie-platform-website-template
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since December 01 - 15, 2018 <@update>
* @version 1.1.0
* @summary cm-valkyrie-platform-website-template
*
* @author Irving Martinez Santiago <Chief Software Development Officer, imartinez@codemonkey.com.mx>
* @since December 03 - 29, 2018 <@update>
* @version 1.1.0
* @summary (Proyecto) Se agrego el boton para donar
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

?>
        <footer class="main-footer">
            <figure>
                <img src="{$path.uploads}{$_vkye_logotype}" alt="Logotype">
            </figure>
            <span>{$vkye_webpage}</span>
            <span>Copyright (C) {$lang.all_rights_reserved} <a href="/privacy">{$lang.privacy}</a> | <a href="/transparency">{$lang.transparency}</a></span>
            <span>{$lang.developed_by} <a href="https://codemonkey.com.mx/" target="_blank">Code Monkey</a></span>
            <div class="social-media">
                <span><a href="https://facebook.com/{$_vkye_facebook}" target="_blank"><i class="fab fa-facebook-f"></i></a></span>
                <span><a href="https://instagram.com/{$_vkye_instagram}" target="_blank"><i class="fab fa-instagram"></i></a></span>
                <span><a href="https://twitter.com/{$_vkye_twitter}" target="_blank"><i class="fab fa-twitter"></i></a></span>
                <span class="donate"><a href="/donations"><i class="fas fa-heart"></i>{$lang.donate}</a></span>
            </div>
        </footer>
        <script src="{$path.js}jquery-2.1.4.min.js"></script>
        <script src="{$path.js}valkyrie.min.js"></script>
        <script src="{$path.js}cm-scripts.min.js"></script>
        <script src="{$path.js}scripts.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> <!-- Font awenson icons -->
        {$dependencies.js}
        {$dependencies.other}
    </body>
</html>
