<?php

defined('_EXEC') or die;

/**
* @package valkyrie.core.controllers
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
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

class Contact_controller extends Controller
{
	private $page;
	private $lang;

	public function __construct()
	{
		parent::__construct();

		$this->page = 'contact';
		$this->lang = Session::get_value('lang');
	}

	/* Ajax: Sending contant email
	** Render: Contact page
	------------------------------------------------------------------------------- */
	public function index()
	{
		$settings = $this->model->get_settings();

		if (Format::exist_ajax_request() == true)
		{
			$fullname = (isset($_POST['fullname']) AND !empty($_POST['fullname'])) ? $_POST['fullname'] : null;
			$email = (isset($_POST['email']) AND !empty($_POST['email'])) ? $_POST['email'] : null;
			$phone = (isset($_POST['phone']) AND !empty($_POST['phone'])) ? $_POST['phone'] : null;
			$message = (isset($_POST['message']) AND !empty($_POST['message'])) ? $_POST['message'] : null;

			$errors = [];

			if (!isset($fullname))
				array_push($errors, ['fullname', '{$lang.dont_leave_this_field_empty}']);

			if (!isset($email))
				array_push($errors, ['email', '{$lang.dont_leave_this_field_empty}']);
			else if (Functions::check_email($email) == false)
				array_push($errors, ['email', '{$lang.invalid_email}']);

			if (isset($phone) AND !is_numeric($phone))
				array_push($errors, ['phone', '{$lang.enter_only_numbers}']);

			if (!isset($message))
				array_push($errors, ['message', '{$lang.dont_leave_this_field_empty}']);

			if (empty($errors))
			{
				$header_mail  = 'MIME-Version: 1.0' . "\r\n";
				$header_mail .= 'Content-type: text/html; charset=utf-8' . "\r\n";
				$header_mail .= 'From: ' . Configuration::$web_page . ' <' . $settings['contact']['email'] . '>' . "\r\n";

				if ($this->lang == 'es')
					$subject_mail = '¡Gracias por ponerte en contacto con nosotros!';
				else if ($this->lang == 'en')
					$subject_mail = '¡Thank you for contacting us!';

				$body_mail =
				'<html>
					<head>
						<title>Contactanos</title>
					</head>
					<body>
						<article style="width:600px;padding:20px;box-sizing:border-box;background-color:#eee;">
							<header style="width:100%;padding:40px;box-sizing:border-box;border-bottom:1px solid #eee;background-color:#fff;">
								<figure style="width:520px;padding:0px;margin:0px;overflow:hidden;text-align:center;">
									<img style="width:300px;" src="https://' . Configuration::$domain . '/uploads/' . $settings['logotypes']['black'] . '" alt="Logotype" />
								</figure>
							</header>
							<aside style="width:100%;padding:40px;box-sizing:border-box;background-color:#fff;">
								<h4 style="margin:0px;margin-bottom:10px;padding:0px;font-size:18px;font-weight:600;color:#757575;">' . $fullname . '</h4>
								<h6 style="margin:0px;margin-bottom:30px;padding:0px;font-size:14px;font-weight:300;color:#757575;">' . $email . (isset($phone) ? ' ' . $phone : '') . '</h6>
								<p style="margin:0px;margin-bottom:30px;padding:0px;font-size:14px;font-weight:300;text-align:justify;color:#757575;">' . $message . '</p>
								<p style="margin:0px;padding:0px;font-size:14px;font-weight:300;text-align:justify;color:#757575;">' . $subject_mail . '</p>
							</aside>
							<footer style="width:100%;padding:40px;box-sizing:border-box;border-top:1px solid #eee;background-color:#fff;">
								<a style="margin:0px;padding:0px;font-size:14px;font-weight:300;text-align:center;color:#757575;">www.' . Configuration::$domain . '</a>
							</footer>
						 </article>
					</body>
				</html>';

			    mail($settings['contact']['email'], $subject_mail, $body_mail, $header_mail);
			    mail($email, $subject_mail, $body_mail, $header_mail);

				echo json_encode([
					'status' => 'success'
				]);
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

			$replace = [
				'{$seo_keywords}' => $settings['seo']['keywords'][$this->page][$this->lang],
				'{$seo_description}' => $settings['seo']['descriptions'][$this->page][$this->lang],
				'{$cover}' => $settings['covers'][$this->page],
				'{$title}' => $settings['seo']['titles'][$this->page][$this->lang],
				'{$address}' => $settings['contact']['address'],
				'{$email}' => $settings['contact']['email'],
				'{$phone}' => $settings['contact']['phone'],
				'{$facebook}' => $settings['contact']['social_media']['facebook'],
				'{$instagram}' => $settings['contact']['social_media']['instagram'],
				'{$twitter}' => $settings['contact']['social_media']['twitter']
			];

			$template = $this->format->replace($replace, $template);

			echo $template;
		}
	}
}
