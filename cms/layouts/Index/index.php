<?php

defined('_EXEC') or die;

/**
* @package valkyrie.cms.layouts.index
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since August 01 - 18, 2018 <@create>
* @version 1.0.0
* @summary cm-valkyrie-platform-website-template
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

$this->dependencies->add(['css', '']);
$this->dependencies->add(['js', '{$path.js}pages/index.min.js']);
$this->dependencies->add(['other', '']);

?>

%{header}%
<section class="main-container">
    <div class="title">
        <h1>Dashboard</h1>
    </div>
    <div class="content"></div>
</section>
