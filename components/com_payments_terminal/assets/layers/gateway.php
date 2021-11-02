<?php
defined('_EXEC') or die;

$this->dependencies->getDependencies([
    'css' => [
        '{$path.plugins}owl-carousel/assets/owl.carousel.min.css'
    ],
    'js' => [
        '{$path.plugins}owl-carousel/owl.carousel.min.js',
        PAYMENTS_TERMINAL_URI . 'assets/js/gateway.js'
    ]
]);
?>
<header class="header">
    <div class="container">
        <h2>{$lang.payment_title} <span>{$vkye_webpage}</span></h2>
    </div>
</header>


<main class="owl-carousel">
    <div class="item">
        <div id="page1" class="page">
            <div class="section">
                <h3 class="subtitle">{$lang.payment_gateway_purchase_information}</h3>

                <div class="table-responsive-vertical">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{$lang.payment_gateway_table_quantity}</th>
                                <th>{$lang.payment_gateway_table_description}</th>
                                <th>{$lang.payment_gateway_table_unitary_price}</th>
                                <th style="text-align: right;">{$lang.payment_gateway_table_price}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {$items}
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section">
                <h3 class="subtitle">{$lang.payment_method}</h3>

                <div style="padding: 0 20px;">
                    <label class="group-input-radio" disabled>
                        <input type="radio" name="payment_method" value="credit_card"/>
                        <p>{$lang.payment_credit_card}: </p>
                        <img src="https://cdn.codemonkey.com.mx/images/logotypes/mastercard.svg" alt="" height="30">
                        <img src="https://cdn.codemonkey.com.mx/images/logotypes/visa.svg" alt="" height="30">
                    </label>

                    <label class="group-input-radio">
                        <input type="radio" name="payment_method" value="paypal" checked/>
                        <p>{$lang.payment_paypal}: </p>
                        <img src="https://astracancun.org/images/paypal2.png" alt="" height="30">
                    </label>

                    <label class="group-input-radio" disabled>
                        <input type="radio" name="payment_method" value="cash"/>
                        <p>{$lang.payment_cash}: </p>
                        <img src="https://cdn.codemonkey.com.mx/images/logotypes/oxxopay.svg" alt="" height="30">
                    </label>

                    <label class="group-input-radio" disabled>
                        <input type="radio" name="payment_method" value="wire_transfer"/>
                        <p>{$lang.payment_spei}: </p>
                        <img src="https://cdn.codemonkey.com.mx/images/logotypes/spei.svg" alt="" height="30">
                    </label>
                </div>
            </div>
            <div class="section">
                <h3 class="subtitle">{$lang.payment_gateway_billing_data}</h3>

                <form name="personal_data" class="row disabled">
                    <div class="span4">
                        <div class="group-input">
                            <label>
                                <span>{$lang.input_name} <i>*</i></span>
                                <input name="name" type="text" size="20" />
                            </label>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="group-input">
                            <label>
                                <span>{$lang.input_lastname} <i>*</i></span>
                                <input name="lastname" type="text" />
                            </label>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="group-input">
                            <label>
                                <span>{$lang.input_phone} <i>*</i></span>
                                <input name="phone" type="number" min="0" />
                            </label>
                        </div>
                    </div>
                    <div class="span12">
                        <div class="group-input">
                            <label>
                                <span>{$lang.input_address} <i>*</i></span>
                                <input name="address" type="text" />
                            </label>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="group-input">
                            <label>
                                <span>{$lang.input_country} <i>*</i></span>
                                <input name="country" type="text" value="México" readonly>
                            </label>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="group-input">
                            <label>
                                <span>{$lang.input_state} <i>*</i></span>
                                <input name="state" type="text" />
                            </label>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="group-input">
                            <label>
                                <span>{$lang.input_city} <i>*</i></span>
                                <input name="city" type="text" />
                            </label>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="group-input">
                            <label>
                                <span>{$lang.input_postal_code} <i>*</i></span>
                                <input name="postal_code" type="text" />
                            </label>
                        </div>
                    </div>
                    <div class="span8">
                        <div class="group-input">
                            <label>
                                <span>{$lang.input_email} <i>*</i></span>
                                <input name="email" type="text" />
                            </label>
                        </div>
                    </div>
                </form>
            </div>

            <div class="section footer-buttons">
                <h6><strong>${$amount}</strong> {$currency}</h6>
                <div>
                    <a id="btn_process_payment" class="btn btn-colored">{$lang.button_payment}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="item">
        <!-- Tarjeta de crédito -->
        <div id="page2" class="page">
            Las tarjetas de crédito aún no estan disponibles.
        </div>
    </div>

    <div class="item">
        <!-- SPEI -->
        <div id="page5" class="page">
            Las transferencias bancarias, aún no estan disponibles.
        </div>
    </div>
</main>
