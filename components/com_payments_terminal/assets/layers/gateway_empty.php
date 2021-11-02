<?php defined('_EXEC') or die; ?>
<header class="header">
    <div class="container">
        <h2>{$lang.payment_title} <small>{$vkye_webpage}</small></h2>
    </div>
</header>

<main class="owl-carousel">
    <div class="item">
        <div class="page gateway_empty">
            <h3 class="subtitle">{$lang.payment_error_empty_title}</h3>
            <div class="content">
                {$lang.payment_error_empty_text}
            </div>
            <div class="text-right">
                <a href="{$vkye_domain}" class="btn btn-colored" data-ripple>{$lang.button_go_home}</a>
            </div>
        </div>
    </div>
</main>