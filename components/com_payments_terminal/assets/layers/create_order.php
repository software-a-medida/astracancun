<?php
defined('_EXEC') or die;

$this->dependencies->getDependencies([
    'js' => [
        PAYMENTS_TERMINAL_URI . 'assets/js/create_order.js'
    ]
]);
?>
<header class="header">
    <div class="container">
        <h2>{$lang.order_title}</h2>
    </div>
</header>

<main class="owl-carousel">
    <div class="item">
        <div class="page">
            <div class="section" style="margin-bottom: 0;">
                <h3 class="subtitle">{$lang.order_subtitle}</h3>

                <form name="create_order" class="row">
                    <div class="span3">
                        <div class="group-input">
                            <label>
                                <span>{$lang.order_quantity} <i>*</i></span>
                                <input name="quantity" type="number" min="1"/>
                                <p>{$lang.order_quantity_p}</p>
                            </label>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="group-input">
                            <label>
                                <span>{$lang.order_description} <i>*</i></span>
                                <input name="description" type="text" />
                                <p>{$lang.order_description_p}</p>
                            </label>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="group-input">
                            <label>
                                <span>{$lang.order_price} <i>*</i></span>
                                <input name="price" type="number" min="1" />
                                <p>{$lang.order_price_p}</p>
                            </label>
                        </div>
                    </div>

                    <div class="span12" style="margin: 30px 0 0;">
                        <div class="text-right">
                            <a href="{$url_clean_order}" class="btn">{$lang.order_clean}</a>
                            <button type="submit" class="btn btn-colored">{$lang.order_create}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
