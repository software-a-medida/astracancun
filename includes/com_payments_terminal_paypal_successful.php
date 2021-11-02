<?php

$settings = $this->database->select('settings', ['logotypes','contact']);
$logotype = json_decode($settings['logotypes'], true)['logotype_black'];
$email = json_decode($settings['contact'], true)['email'];

if ($ticket['lang'] == 'es')
{
    $e_title = 'Dona en dinero';
    $e_name = 'Nombre';
    $e_email = 'Correo electrónico';
    $e_phone = 'Telefono';
    $e_observations = 'Observaciones';
    $e_not_available = 'No disponible';
    $e_donation = 'Donación';
    $e_message_1 = 'Tu donativo nos ayuda a ayudar ! Gracias por confiar en nosotros !';
}
else if ($ticket['lang'] == 'en')
{
    $e_title = 'Dona en dinero';
    $e_name = 'Name';
    $e_email = 'Email';
    $e_phone = 'Phone';
    $e_observations = 'Observations';
    $e_not_available = 'No available';
    $e_donation = 'Donation';
    $e_message_1 = 'Your donation helps us help! Thanks for trusting us !';
}

$body_mail =
'<html>
    <head>
        <title>' . $e_title . '</title>
    </head>
    <body>
        <article style="width:600px;padding:20px;box-sizing:border-box;background-color:#eee;">
            <header style="width:100%;padding:40px;box-sizing:border-box;border-bottom:1px solid #eee;background-color:#fff;">
                <figure style="width:520px;padding:0px;margin:0px;overflow:hidden;text-align:center;">
                    <img style="width:300px;" src="https://' . Configuration::$domain . '/uploads/' . $logotype . '" alt="Logotype" />
                </figure>
            </header>
            <aside style="width:100%;padding:40px;box-sizing:border-box;background-color:#fff;">
                <h4 style="margin:0px;margin-bottom:10px;padding:0px;font-size:18px;font-weight:600;color:#757575;">' . $e_title . '</h4>
                <p style="margin:0px;margin-bottom:10px;padding:0px;font-size:14px;font-weight:300;text-align:justify;color:#757575;">' . $e_name . ': ' . $ticket['name'] . '</p>
                <p style="margin:0px;margin-bottom:10px;padding:0px;font-size:14px;font-weight:300;text-align:justify;color:#757575;">' . $e_email . ': ' . $ticket['email'] . '</p>
                <p style="margin:0px;margin-bottom:10px;padding:0px;font-size:14px;font-weight:300;text-align:justify;color:#757575;">' . $e_phone . ': ' . (!empty($ticket['phone']) ? $ticket['phone'] : $e_not_available) . '</p>
                <p style="margin:0px;margin-bottom:10px;padding:0px;font-size:14px;font-weight:300;text-align:justify;color:#757575;">' . $e_observations . ': ' . (!empty($ticket['observations']) ? $ticket['observations'] : $e_not_available) . '</p>
                <p style="margin:0px;margin-bottom:30px;padding:0px;font-size:14px;font-weight:300;text-align:justify;color:#757575;">' . $e_donation . ': $ ' . $ticket['donation']['amount'] . ' MXN (PayPal)</p>
                <p style="margin:0px;padding:0px;font-size:14px;font-weight:300;text-align:justify;color:#757575;">' . $e_message_1 . '</p>
            </aside>
            <footer style="width:100%;padding:40px;box-sizing:border-box;border-top:1px solid #eee;background-color:#fff;">
                <a style="margin:0px;padding:0px;font-size:14px;font-weight:300;text-align:center;color:#757575;">www.' . Configuration::$domain . '</a>
            </footer>
         </article>
    </body>
</html>';

$component = new Components();
$component->loadComponent('phpmailer');

send_email(
    [
        $ticket['email'] => $ticket['name']
    ],
    FALSE,
    FALSE,
    FALSE,
    FALSE,
    $e_message_1,
    $body_mail,
    FALSE
);

send_email(
    [
        $email => $ticket['name']
    ],
    FALSE,
    FALSE,
    FALSE,
    FALSE,
    $e_message_1,
    $body_mail,
    FALSE
);

header('Location: /' . $ticket['lang'] . '/index/thanks');
