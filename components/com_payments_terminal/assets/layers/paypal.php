<?php
defined('_EXEC') or die;

$this->dependencies->getDependencies([
    'other' => [
        '<script type="text/javascript">
            $( document ).ready(function ()
            {
                $(\'form[name="paypal_form"]\').submit();

                $( document ).on(\'click\', \'#gotopaypal\', function()
                {
                    $(\'form[name="paypal_form"]\').submit();
                });
            });
        </script>'
    ]
]);
?>
<header class="header">
    <div class="container">
        <h2>{$lang.payment_redirect_title}</h2>
    </div>
</header>

<main class="owl-carousel">
    <div class="item">
        <div class="page paypal">
            <figure class="logo_payment">
                <img src="https://astracancun.org/images/paypal2.png" width="150"/>
            </figure>
            {$lang.payment_redirect_text}
            <form method="POST" name="paypal_form" action="{$paypal_url}">
                {$inputs_data_paypal}
            </form>
        </div>
    </div>
</main>
