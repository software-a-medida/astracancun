<?php
defined('_EXEC') or die;

$this->dependencies->getDependencies([
    'css' => [
        PAYMENTS_TERMINAL_URI . 'assets/css/oxxopay_print.css'
    ]
]);
?>
<header class="header">
    <div class="container">
        <h2>Pago por Oxxo</h2>
    </div>
</header>

<main class="owl-carousel">
    <div class="item">
        <div class="page">
            <h3 class="subtitle">{$lang.payment_pay_oxxopay_title}</h3>
            <div class="content">
                {$lang.payment_pay_oxxopay_text}
                <div class="ticket_oxxopay">
                    <div class="header">
                        <div class="reminder">{$vkye_webpage}</div>
                        <div class="info">
                            <div class="brand">
                                <img src="https://cdn.codemonkey.com.mx/images/logotypes/oxxopay.svg" alt="OXXOPay">
                            </div>
                            <div class="ammount">
                                <h3>{$lang.payment_amount_total}</h3>
                                <h2>$ {$totalAmount} <sup>MXN</sup></h2>
                                <p>{$lang.payment_oxxo_fee}</p>
                            </div>
                        </div>
                        {$referenceHtml}
                    </div>
                    <div class="instructions">
                        <h3>Instrucciones</h3>
                        <ol>
                            <li>{$lang.instructions_oxxopay_1}</li>
                            <li>{$lang.instructions_oxxopay_2}</li>
                            <li>{$lang.instructions_oxxopay_3}</li>
                            <li>{$lang.instructions_oxxopay_4}</li>
                            <li>{$lang.instructions_oxxopay_5}</li>
                        </ol>
                        <div class="footnote">{$lang.payment_oxxopay_note}</div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-colored" onclick="window.print()" data-ripple>{$lang.button_print}</a>
                <a href="{$vkye_domain}" class="btn btn-colored" data-ripple>{$lang.button_go_home}</a>
            </div>
        </div>
    </div>
</main>
