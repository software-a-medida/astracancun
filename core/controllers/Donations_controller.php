<?php

defined('_EXEC') or die;

/**
* @package valkyrie.core.controllers
*
* @author Irving Martinez Santiago <Chief Software Development Officer, imartinez@codemonkey.com.mx>
* @since December 03 - 29, 2018 <@create>
* @version 1.1.0
* @summary (Proyecto)
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

class Donations_controller extends Controller
{
	private $page;
	private $lang;

	public function __construct()
	{
		parent::__construct();

		$this->page = 'donations';
		$this->lang = Session::get_value('lang');
	}

	/* Ajax: No ajax
	** Render: Donations page
	------------------------------------------------------------------------------- */
	public function index()
	{
		$settings = $this->model->get_settings();

		if (Format::exist_ajax_request() == true)
		{
			$action = $_POST['action'];

			$name = (isset($_POST['name']) AND !empty($_POST['name'])) ? $_POST['name'] : null;
			$email = (isset($_POST['email']) AND !empty($_POST['email'])) ? $_POST['email'] : null;
			$phone = (isset($_POST['phone']) AND !empty($_POST['phone'])) ? $_POST['phone'] : null;
			$observations = (isset($_POST['observations']) AND !empty($_POST['observations'])) ? $_POST['observations'] : null;
			$donation = (isset($_POST['donation']) AND !empty($_POST['donation'])) ? $_POST['donation'] : null;
			$others = (isset($_POST['others']) AND !empty($_POST['others'])) ? $_POST['others'] : null;

			$errors = [];

			if (!isset($name))
				array_push($errors, ['name','{$lang.dont_leave_this_field_empty}']);

			if (!isset($email))
				array_push($errors, ['email','{$lang.dont_leave_this_field_empty}']);
			else if (Functions::check_email($email) == false)
				array_push($errors, ['email','{$lang.invalid_email}']);

			if ($action == 'especie' AND !isset($donation) OR $action == 'dinero' AND !isset($donation) OR $action == 'tiempo' AND !isset($donation))
				array_push($errors, ['donation','{$lang.dont_leave_this_field_empty}']);

			if ($action == 'especie' AND $donation == 'others' AND !isset($others) OR $action == 'especie' AND $donation == 'hotel' AND !isset($others) OR $action == 'dinero' AND $donation == 'others' AND !isset($others) OR $action == 'tiempo' AND $donation == 'others' AND !isset($others))
				array_push($errors, ['others','{$lang.dont_leave_this_field_empty}']);
			else if ($action == 'dinero' AND $donation == 'others' AND !is_numeric($others))
				array_push($errors, ['others','{$lang.invalid_data}']);
			else if ($action == 'dinero' AND $donation == 'others' AND $others < $settings['donate_min_amount'])
				array_push($errors, ['others','{$lang.enter-min}: $ ' . $settings['donate_min_amount'] . ' MXN']);

			if ($action == 'tiempo' AND !isset($observations))
				array_push($errors, ['observations','{$lang.dont_leave_this_field_empty}']);

			if (empty($errors))
			{
				if ($action == 'especie' AND $donation != 'others' AND $donation != 'hotel' OR $action == 'dinero' AND $donation != 'others' OR $action == 'tiempo' AND $donation != 'others')
					$donation = $this->model->get_donation_by_id($donation);

				if ($action == 'beca' OR $action == 'patrocina' OR $action == 'apadrina' OR $action == 'especie' OR $action == 'tiempo')
				{
					$header_mail  = 'MIME-Version: 1.0' . "\r\n";
					$header_mail .= 'Content-type: text/html; charset=utf-8' . "\r\n";
					$header_mail .= 'From: ' . Configuration::$web_page . ' <' . $settings['contact']['email'] . '>' . "\r\n";

					if ($this->lang == 'es')
					{
						if ($action == 'beca')
							$e_title = 'Beca a un alumno';
						else if ($action == 'patrocina')
							$e_title = 'Patrocina un atleta';
						else if ($action == 'apadrina')
							$e_title = 'Apadrina un artista';
						else if ($action == 'especie')
							$e_title = 'Dona en especie';
						else if ($action == 'tiempo')
							$e_title = 'Dona en tiempo';

						$e_name = 'Nombre';
						$e_email = 'Correo electrónico';
						$e_phone = 'Telefono';
						$e_observations = 'Observaciones';
						$e_not_available = 'No disponible';
						$e_donation = 'Donación';
						$e_message_1 = 'Hemos recibido su información, en breve un miembro de nuestro equipo se pondrá en contacto con usted para concluir.';
						$e_message_2 = 'Gracias por confiar en nosotros';
					}
					else if ($this->lang == 'en')
					{
						if ($action == 'beca')
							$e_title = 'Scholarship to a student';
						else if ($action == 'patrocina')
							$e_title = 'Sponsor an athlete';
						else if ($action == 'apadrina')
							$e_title = 'Sponsor an artist';
						else if ($action == 'especie')
							$e_title = 'Donate in kind';
						else if ($action == 'tiempo')
							$e_title = 'Donate in time';

						$e_name = 'Name';
					    $e_email = 'Email';
					    $e_phone = 'Phone';
					    $e_observations = 'Observations';
					    $e_not_available = 'No available';
					    $e_donation = 'Donation';
						$e_message_1 = 'We have received your information, soon a member of our team will contact you to conclude.';
						$e_message_2 = 'Thanks for trusting us';
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
										<img style="width:300px;" src="https://' . Configuration::$domain . '/uploads/' . $settings['logotypes']['black'] . '" alt="Logotype" />
									</figure>
								</header>
								<aside style="width:100%;padding:40px;box-sizing:border-box;background-color:#fff;">
									<h4 style="margin:0px;margin-bottom:10px;padding:0px;font-size:18px;font-weight:600;color:#757575;">' . $e_title . '</h4>';

					$body_mail .=
					'				<p style="margin:0px;margin-bottom:10px;padding:0px;font-size:14px;font-weight:300;text-align:justify;color:#757575;">' . $e_name . ': ' . $name . '</p>
									<p style="margin:0px;margin-bottom:10px;padding:0px;font-size:14px;font-weight:300;text-align:justify;color:#757575;">' . $e_email . ': ' . $email . '</p>
									<p style="margin:0px;margin-bottom:10px;padding:0px;font-size:14px;font-weight:300;text-align:justify;color:#757575;">' . $e_phone . ': ' . (!empty($phone) ? $phone : $e_not_available) . '</p>
									<p style="margin:0px;margin-bottom:10px;padding:0px;font-size:14px;font-weight:300;text-align:justify;color:#757575;">' . $e_observations . ': ' . (!empty($observations) ? $observations : $e_not_available) . '</p>';

					if ($action == 'especie' OR $action == 'tiempo')
						$body_mail .= '<p style="margin:0px;margin-bottom:30px;padding:0px;font-size:14px;font-weight:300;text-align:justify;color:#757575;">' . $e_donation . ': ' . (($donation == 'others' OR $donation == 'hotel') ? $others : $donation['description'][$this->lang]) . '</p>';

					$body_mail .=
					'				<p style="margin:0px;margin-bottom:30px;padding:0px;font-size:14px;font-weight:300;text-align:justify;color:#757575;">' . $e_message_1 . '</p>
									<p style="margin:0px;padding:0px;font-size:14px;font-weight:300;text-align:justify;color:#757575;">' . $e_message_2 . '</p>
								</aside>
								<footer style="width:100%;padding:40px;box-sizing:border-box;border-top:1px solid #eee;background-color:#fff;">
									<a style="margin:0px;padding:0px;font-size:14px;font-weight:300;text-align:center;color:#757575;">www.' . Configuration::$domain . '</a>
								</footer>
							 </article>
					    </body>
					</html>';

				    mail($settings['contact']['email'], $e_title, $body_mail, $header_mail);
				    mail($email, $e_title, $body_mail, $header_mail);

					echo json_encode([
						'status' => 'success',
						'message' => $e_message_2 . '. ' . $e_message_1
					]);
				}

				if ($action == 'dinero')
				{
					if ($donation != 'others')
						$amount = intval($donation['description'][$this->lang]);
					else
						$amount = intval($others);

					$payment = [
						'data' => [
							'name' => $name,
							'email' => $email,
							'phone' => $phone,
							'observations' => $observations,
							'donation' => [
								'id' => ($donation != 'others') ? $donation['id_donation'] : null,
								'amount' => $amount
							],
							'lang' => $this->lang
						],
						'payment' => [
							[
								'item_name' => 'Donacion $ ' . $amount . ' MXN',
								'amount' => $amount,
								'quantity' => 1,
								'item_number' => $this->security->random_string(10)
							]
						]
					];

					echo json_encode([
						'status' => 'success',
						'path' => 'https://payment.astracancun.org/' . $this->lang . '/index/index/' . json_encode($payment)
					]);
				}
			}
			else
			{
				echo json_encode([
					'status' => 'error',
					'message' => $errors
				]);
			}
		}
		else
		{
			define('_title', '{$lang.' . $this->page . '} | ' . Configuration::$web_page . ' | ' . $settings['seo']['keywords'][$this->page][$this->lang]);

			$template = $this->view->render($this, 'index');

			$especie = $this->model->get_donations_by_type('especie');

			$lst_especie = '';

			foreach ($especie as $value)
				$lst_especie .= '<label><input type="radio" name="donation" value="' . $value['id_donation'] . '"><span>' . $value['description'][$this->lang] . '</span></label>';

			$dinero = $this->model->get_donations_by_type('dinero');

			$lst_dinero = '';

			foreach ($dinero as $value)
				$lst_dinero .= '<label><input type="radio" name="donation" value="' . $value['id_donation'] . '"><span>$ ' . $value['description'][$this->lang] . ' MXN</span><img src="{$path.images}paypal1.png" alt="PayPal"></label>';

			$tiempo = $this->model->get_donations_by_type('tiempo');

			$lst_tiempo = '';

			foreach ($tiempo as $value)
				$lst_tiempo .= '<label><input type="radio" name="donation" value="' . $value['id_donation'] . '"><span>' . $value['description'][$this->lang] . '</span></label>';

			$allies = $this->model->get_allies();

			$lst_allies = '';

			if (!empty($allies))
			{
				foreach ($allies as $value)
				{
					$lst_allies .=
					'<div class="item">
			            <figure>';

					if (!empty($value['website']))
					{
						$lst_allies .=
						'<a href="https://' . $value['website'] . '" target="_blank">
							<img src="{$path.uploads}' . $value['logotype'] . '" alt="Logotype" />
						</a>';
					}
					else
					{
						$lst_allies .=
						'<img src="{$path.uploads}' . $value['logotype'] . '" alt="Logotype" />';
					}

					$lst_allies .=
			        '    </figure>
			        </div>';
				}
			}

			$stories = $this->model->get_stories();

			$lst_stories = '';

			if (!empty($stories))
			{
				foreach ($stories as $value)
				{
					$lst_stories .=
					'<div class="item">
		                <figure>
		                    <img src="{$path.uploads}' . $value['cover'] . '" alt="Cover">
		                </figure>
		                <p>' . $value['description'][$this->lang] . '</p>
		                <h4>' . $value['name'][$this->lang] . '</h4>
		            </div>';
				}
			}

			$replace = [
				'{$seo_keywords}' => $settings['seo']['keywords'][$this->page][$this->lang],
				'{$seo_description}' => $settings['seo']['descriptions'][$this->page][$this->lang],
				'{$cover}' => $settings['covers'][$this->page],
				'{$title}' => $settings['seo']['titles'][$this->page][$this->lang],
				'{$lst_especie}' => $lst_especie,
				'{$lst_dinero}' => $lst_dinero,
				'{$lst_tiempo}' => $lst_tiempo,
				'{$lst_allies}' => $lst_allies,
				'{$lst_stories}' => $lst_stories,
				'{$video}' => $settings['videos'][$this->page][0],
				'{$donate_min_amount}' => $settings['donate_min_amount']
			];

			$template = $this->format->replace($replace, $template);

			echo $template;
		}
	}
}
