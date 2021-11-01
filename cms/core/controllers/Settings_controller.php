<?php

defined('_EXEC') or die;

/**
* @package valkyrie.cms.core.controllers
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
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since December 03 - 29, 2018 <@update>
* @version 1.1.0
* @summary (Proyecto)
*
* @copyright Copyright (C) Code Monkey <legal@codemonkey.com.mx, wwww.codemonkey.com.mx>. All rights reserved.
*/

class Settings_controller extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	/* Ajax 1: Edit logotypes
	** Ajax 2: Edit covers
	** Ajax 3: Edit backgrounds
	** Ajax 4: Edit contact
	** Ajax 5: Edit about
	** Ajax 6: Edit currency exchange
	** Ajax 7: Edit seo
	** Render: Settings page
	------------------------------------------------------------------------------- */
	public function index()
	{
		$settings = $this->model->get_settings();

		if (Format::exist_ajax_request() == true)
		{
			$action = $_POST['action'];

			if ($action == 'edit_logotype_color' OR $action == 'edit_logotype_black' OR $action == 'edit_logotype_white')
			{
				$query = $this->model->edit_logotypes($_POST['file'], $settings['logotypes'], explode('_', $action)[2]);

				if (!empty($query))
				{
					echo json_encode([
						'status' => 'success',
						'message' => 'Operación realizada correctamente'
					]);
				}
				else
				{
					echo json_encode([
						'status' => 'error',
						'message' => 'DATABASE OPERATION ERROR'
					]);
				}
			}

			if ($action == 'edit_cover_home' OR $action == 'edit_cover_programs' OR $action == 'edit_cover_donations' OR $action == 'edit_cover_blog' OR $action == 'edit_cover_about' OR $action == 'edit_cover_contact' OR $action == 'delete_cover_home')
			{
				$query = $this->model->edit_covers($_POST['file'], $settings['covers'], explode('_', $action)[2],  explode('_', $action)[0]);

				if (!empty($query))
				{
					echo json_encode([
						'status' => 'success',
						'message' => 'Operación realizada correctamente'
					]);
				}
				else
				{
					echo json_encode([
						'status' => 'error',
						'message' => 'DATABASE OPERATION ERROR'
					]);
				}
			}

			if ($action == 'edit_background_about_0' OR $action == 'edit_background_about_1' OR $action == 'edit_background_about_2')
			{
				$query = $this->model->edit_backgrounds($_POST['file'], $settings['backgrounds'], explode('_', $action)[2],  explode('_', $action)[3]);

				if (!empty($query))
				{
					echo json_encode([
						'status' => 'success',
						'message' => 'Operación realizada correctamente'
					]);
				}
				else
				{
					echo json_encode([
						'status' => 'error',
						'message' => 'DATABASE OPERATION ERROR'
					]);
				}
			}

			if ($action == 'edit_videos')
			{
				$video_home = (isset($_POST['video_home']) AND !empty($_POST['video_home'])) ? $_POST['video_home'] : null;
				$video_programs = (isset($_POST['video_programs']) AND !empty($_POST['video_programs'])) ? $_POST['video_programs'] : null;
				$video_donations = (isset($_POST['video_donations']) AND !empty($_POST['video_donations'])) ? $_POST['video_donations'] : null;
				$video_about_1 = (isset($_POST['video_about_1']) AND !empty($_POST['video_about_1'])) ? $_POST['video_about_1'] : null;
				$video_about_2 = (isset($_POST['video_about_2']) AND !empty($_POST['video_about_2'])) ? $_POST['video_about_2'] : null;
				$video_about_3 = (isset($_POST['video_about_3']) AND !empty($_POST['video_about_3'])) ? $_POST['video_about_3'] : null;
				$video_about_4 = (isset($_POST['video_about_4']) AND !empty($_POST['video_about_4'])) ? $_POST['video_about_4'] : null;

				$errors = [];

				if (!isset($video_home))
					array_push($errors, ['video_home', 'No deje este campo vacío']);

				if (!isset($video_programs))
					array_push($errors, ['video_programs', 'No deje este campo vacío']);

				if (!isset($video_donations))
					array_push($errors, ['video_donations', 'No deje este campo vacío']);

				if (!isset($video_about_1))
					array_push($errors, ['video_about_1', 'No deje este campo vacío']);

				if (!isset($video_about_2))
					array_push($errors, ['video_about_2', 'No deje este campo vacío']);

				if (!isset($video_about_3))
					array_push($errors, ['video_about_3', 'No deje este campo vacío']);

				if (!isset($video_about_4))
					array_push($errors, ['video_about_4', 'No deje este campo vacío']);

				if (empty($errors))
				{
					$settings['videos'] = [
						'home' => [
							$video_home
						],
						'programs' => [
							$video_programs
						],
						'donations' => [
							$video_donations
						],
						'about' => [
							$video_about_1,
							$video_about_2,
							$video_about_3,
							$video_about_4
						]
					];

					$query = $this->model->edit_videos($settings['videos']);

					if (!empty($query))
					{
						echo json_encode([
							'status' => 'success',
							'message' => 'Operación realizada correctamente'
						]);
					}
					else
					{
						echo json_encode([
							'status' => 'error',
							'message' => 'DATABASE OPERATION ERROR'
						]);
					}
				}
				else
				{
					echo json_encode([
						'status' => 'error',
						'errors' => $errors
					]);
				}
			}

			if ($action == 'edit_contact')
			{
				$contact_email = (isset($_POST['contact_email']) AND !empty($_POST['contact_email'])) ? $_POST['contact_email'] : null;
				$contact_phone = (isset($_POST['contact_phone']) AND !empty($_POST['contact_phone'])) ? $_POST['contact_phone'] : null;
				$contact_address = (isset($_POST['contact_address']) AND !empty($_POST['contact_address'])) ? $_POST['contact_address'] : null;
				$contact_social_media_facebook = (isset($_POST['contact_social_media_facebook']) AND !empty($_POST['contact_social_media_facebook'])) ? $_POST['contact_social_media_facebook'] : null;
				$contact_social_media_instagram = (isset($_POST['contact_social_media_instagram']) AND !empty($_POST['contact_social_media_instagram'])) ? $_POST['contact_social_media_instagram'] : null;
				$contact_social_media_twitter = (isset($_POST['contact_social_media_twitter']) AND !empty($_POST['contact_social_media_twitter'])) ? $_POST['contact_social_media_twitter'] : null;

				$errors = [];

				if (!isset($contact_email))
					array_push($errors, ['contact_email', 'No deje este campo vacío']);
				else if (Functions::check_email($contact_email) == false)
					array_push($errors, ['contact_email', 'Dato inválido']);

				if (!isset($contact_phone))
					array_push($errors, ['contact_phone', 'No deje este campo vacío']);

				if (!isset($contact_address))
					array_push($errors, ['contact_address', 'No deje este campo vacío']);

				if (empty($errors))
				{
					$settings['contact'] = [
						'email' => strtolower($contact_email),
						'phone' => $contact_phone,
						'social_media' => [
							'facebook' => $contact_social_media_facebook,
							'instagram' => $contact_social_media_instagram,
							'twitter' => $contact_social_media_twitter
						],
						'address' => $contact_address
					];

					$query = $this->model->edit_contact($settings['contact']);

					if (!empty($query))
					{
						echo json_encode([
							'status' => 'success',
							'message' => 'Operación realizada correctamente'
						]);
					}
					else
					{
						echo json_encode([
							'status' => 'error',
							'message' => 'DATABASE OPERATION ERROR'
						]);
					}
				}
				else
				{
					echo json_encode([
						'status' => 'error',
						'errors' => $errors
					]);
				}
			}

			if ($action == 'edit_about')
			{
				$about_description_es = (isset($_POST['about_description_es']) AND !empty($_POST['about_description_es'])) ? $_POST['about_description_es'] : null;
				$about_description_en = (isset($_POST['about_description_en']) AND !empty($_POST['about_description_en'])) ? $_POST['about_description_en'] : null;
				$about_mission_es = (isset($_POST['about_mission_es']) AND !empty($_POST['about_mission_es'])) ? $_POST['about_mission_es'] : null;
				$about_mission_en = (isset($_POST['about_mission_en']) AND !empty($_POST['about_mission_en'])) ? $_POST['about_mission_en'] : null;
				$about_vission_es = (isset($_POST['about_vission_es']) AND !empty($_POST['about_vission_es'])) ? $_POST['about_vission_es'] : null;
				$about_vission_en = (isset($_POST['about_vission_en']) AND !empty($_POST['about_vission_en'])) ? $_POST['about_vission_en'] : null;
				$about_values_es = (isset($_POST['about_values_es']) AND !empty($_POST['about_values_es'])) ? $_POST['about_values_es'] : null;
				$about_values_en = (isset($_POST['about_values_en']) AND !empty($_POST['about_values_en'])) ? $_POST['about_values_en'] : null;
				$about_history_es = (isset($_POST['about_history_es']) AND !empty($_POST['about_history_es'])) ? $_POST['about_history_es'] : null;
				$about_history_en = (isset($_POST['about_history_en']) AND !empty($_POST['about_history_en'])) ? $_POST['about_history_en'] : null;
				$about_organ_government_es = (isset($_POST['about_organ_government_es']) AND !empty($_POST['about_organ_government_es'])) ? $_POST['about_organ_government_es'] : null;
				$about_organ_government_en = (isset($_POST['about_organ_government_en']) AND !empty($_POST['about_organ_government_en'])) ? $_POST['about_organ_government_en'] : null;

				$errors = [];

				if (!isset($about_description_es))
					array_push($errors, ['about_description_es', 'No deje este campo vacío']);

				if (!isset($about_description_en))
					array_push($errors, ['about_description_en', 'No deje este campo vacío']);

				if (!isset($about_mission_es))
					array_push($errors, ['about_mission_es', 'No deje este campo vacío']);

				if (!isset($about_mission_en))
					array_push($errors, ['about_mission_en', 'No deje este campo vacío']);

				if (!isset($about_vission_es))
					array_push($errors, ['about_vission_es', 'No deje este campo vacío']);

				if (!isset($about_vission_en))
					array_push($errors, ['about_vission_en', 'No deje este campo vacío']);

				if (!isset($about_values_es))
					array_push($errors, ['about_values_es', 'No deje este campo vacío']);

				if (!isset($about_values_en))
					array_push($errors, ['about_values_en', 'No deje este campo vacío']);

				if (!isset($about_history_es))
					array_push($errors, ['about_history_es', 'No deje este campo vacío']);

				if (!isset($about_history_en))
					array_push($errors, ['about_history_en', 'No deje este campo vacío']);

				if (!isset($about_organ_government_es))
					array_push($errors, ['about_organ_government_es', 'No deje este campo vacío']);

				if (!isset($about_organ_government_en))
					array_push($errors, ['about_organ_government_en', 'No deje este campo vacío']);

				if (empty($errors))
				{
					$settings['about'] = [
						'description' => [
							'es' => $about_description_es,
							'en' => $about_description_en
						],
						'mission' => [
							'es' => $about_mission_es,
							'en' => $about_mission_en
						],
						'vission' => [
							'es' => $about_vission_es,
							'en' => $about_vission_en
						],
						'values' => [
							'es' => $about_values_es,
							'en' => $about_values_en
						],
						'history' => [
							'es' => $about_history_es,
							'en' => $about_history_en
						],
						'organ_government' => [
							'es' => $about_organ_government_es,
							'en' => $about_organ_government_en
						]
					];

					$query = $this->model->edit_about($settings['about']);

					if (!empty($query))
					{
						echo json_encode([
							'status' => 'success',
							'message' => 'Operación realizada correctamente'
						]);
					}
					else
					{
						echo json_encode([
							'status' => 'error',
							'message' => 'DATABASE OPERATION ERROR'
						]);
					}
				}
				else
				{
					echo json_encode([
						'status' => 'error',
						'errors' => $errors
					]);
				}
			}

			if ($action == 'edit_notices')
			{
				$notice_privacy_es = (isset($_POST['notice_privacy_es']) AND !empty($_POST['notice_privacy_es'])) ? $_POST['notice_privacy_es'] : null;
				$notice_privacy_en = (isset($_POST['notice_privacy_en']) AND !empty($_POST['notice_privacy_en'])) ? $_POST['notice_privacy_en'] : null;
				$notice_transparency_es = (isset($_POST['notice_transparency_es']) AND !empty($_POST['notice_transparency_es'])) ? $_POST['notice_transparency_es'] : null;
				$notice_transparency_en = (isset($_POST['notice_transparency_en']) AND !empty($_POST['notice_transparency_en'])) ? $_POST['notice_transparency_en'] : null;

				$errors = [];

				if (!isset($notice_privacy_es))
					array_push($errors, ['notice_privacy_es', 'No deje este campo vacío']);

				if (!isset($notice_privacy_en))
					array_push($errors, ['notice_privacy_en', 'No deje este campo vacío']);

				if (!isset($notice_transparency_es))
					array_push($errors, ['notice_transparency_es', 'No deje este campo vacío']);

				if (!isset($notice_transparency_en))
					array_push($errors, ['notice_transparency_en', 'No deje este campo vacío']);

				if (empty($errors))
				{
					$settings['notices'] = [
						'privacy' => [
							'es' => $notice_privacy_es,
							'en' => $notice_privacy_en
						],
						'transparency' => [
							'es' => $notice_transparency_es,
							'en' => $notice_transparency_en
						]
					];

					$query = $this->model->edit_notices($settings['notices']);

					if (!empty($query))
					{
						echo json_encode([
							'status' => 'success',
							'message' => 'Operación realizada correctamente'
						]);
					}
					else
					{
						echo json_encode([
							'status' => 'error',
							'message' => 'DATABASE OPERATION ERROR'
						]);
					}
				}
				else
				{
					echo json_encode([
						'status' => 'error',
						'errors' => $errors
					]);
				}
			}

			if ($action == 'edit_seo')
			{
				$seo_title_home_es = (isset($_POST['seo_title_home_es']) AND !empty($_POST['seo_title_home_es'])) ? $_POST['seo_title_home_es'] : null;
				$seo_title_home_en = (isset($_POST['seo_title_home_en']) AND !empty($_POST['seo_title_home_en'])) ? $_POST['seo_title_home_en'] : null;
				$seo_title_programs_es = (isset($_POST['seo_title_programs_es']) AND !empty($_POST['seo_title_programs_es'])) ? $_POST['seo_title_programs_es'] : null;
				$seo_title_programs_en = (isset($_POST['seo_title_programs_en']) AND !empty($_POST['seo_title_programs_en'])) ? $_POST['seo_title_programs_en'] : null;
				$seo_title_donations_es = (isset($_POST['seo_title_donations_es']) AND !empty($_POST['seo_title_donations_es'])) ? $_POST['seo_title_donations_es'] : null;
				$seo_title_donations_en = (isset($_POST['seo_title_donations_en']) AND !empty($_POST['seo_title_donations_en'])) ? $_POST['seo_title_donations_en'] : null;
				$seo_title_blog_es = (isset($_POST['seo_title_blog_es']) AND !empty($_POST['seo_title_blog_es'])) ? $_POST['seo_title_blog_es'] : null;
				$seo_title_blog_en = (isset($_POST['seo_title_blog_en']) AND !empty($_POST['seo_title_blog_en'])) ? $_POST['seo_title_blog_en'] : null;
				$seo_title_about_es = (isset($_POST['seo_title_about_es']) AND !empty($_POST['seo_title_about_es'])) ? $_POST['seo_title_about_es'] : null;
				$seo_title_about_en = (isset($_POST['seo_title_about_en']) AND !empty($_POST['seo_title_about_en'])) ? $_POST['seo_title_about_en'] : null;
				$seo_title_contact_es = (isset($_POST['seo_title_contact_es']) AND !empty($_POST['seo_title_contact_es'])) ? $_POST['seo_title_contact_es'] : null;
				$seo_title_contact_en = (isset($_POST['seo_title_contact_en']) AND !empty($_POST['seo_title_contact_en'])) ? $_POST['seo_title_contact_en'] : null;
				$seo_title_slogan_es = (isset($_POST['seo_title_slogan_es']) AND !empty($_POST['seo_title_slogan_es'])) ? $_POST['seo_title_slogan_es'] : null;
				$seo_title_slogan_en = (isset($_POST['seo_title_slogan_en']) AND !empty($_POST['seo_title_slogan_en'])) ? $_POST['seo_title_slogan_en'] : null;

				$seo_keywords_home_es = (isset($_POST['seo_keywords_home_es']) AND !empty($_POST['seo_keywords_home_es'])) ? $_POST['seo_keywords_home_es'] : null;
				$seo_keywords_home_en = (isset($_POST['seo_keywords_home_en']) AND !empty($_POST['seo_keywords_home_en'])) ? $_POST['seo_keywords_home_en'] : null;
				$seo_keywords_programs_es = (isset($_POST['seo_keywords_programs_es']) AND !empty($_POST['seo_keywords_programs_es'])) ? $_POST['seo_keywords_programs_es'] : null;
				$seo_keywords_programs_en = (isset($_POST['seo_keywords_programs_en']) AND !empty($_POST['seo_keywords_programs_en'])) ? $_POST['seo_keywords_programs_en'] : null;
				$seo_keywords_donations_es = (isset($_POST['seo_keywords_donations_es']) AND !empty($_POST['seo_keywords_donations_es'])) ? $_POST['seo_keywords_donations_es'] : null;
				$seo_keywords_donations_en = (isset($_POST['seo_keywords_donations_en']) AND !empty($_POST['seo_keywords_donations_en'])) ? $_POST['seo_keywords_donations_en'] : null;
				$seo_keywords_blog_es = (isset($_POST['seo_keywords_blog_es']) AND !empty($_POST['seo_keywords_blog_es'])) ? $_POST['seo_keywords_blog_es'] : null;
				$seo_keywords_blog_en = (isset($_POST['seo_keywords_blog_en']) AND !empty($_POST['seo_keywords_blog_en'])) ? $_POST['seo_keywords_blog_en'] : null;
				$seo_keywords_about_es = (isset($_POST['seo_keywords_about_es']) AND !empty($_POST['seo_keywords_about_es'])) ? $_POST['seo_keywords_about_es'] : null;
				$seo_keywords_about_en = (isset($_POST['seo_keywords_about_en']) AND !empty($_POST['seo_keywords_about_en'])) ? $_POST['seo_keywords_about_en'] : null;
				$seo_keywords_contact_es = (isset($_POST['seo_keywords_contact_es']) AND !empty($_POST['seo_keywords_contact_es'])) ? $_POST['seo_keywords_contact_es'] : null;
				$seo_keywords_contact_en = (isset($_POST['seo_keywords_contact_en']) AND !empty($_POST['seo_keywords_contact_en'])) ? $_POST['seo_keywords_contact_en'] : null;

				$seo_description_home_es = (isset($_POST['seo_description_home_es']) AND !empty($_POST['seo_description_home_es'])) ? $_POST['seo_description_home_es'] : null;
				$seo_description_home_en = (isset($_POST['seo_description_home_en']) AND !empty($_POST['seo_description_home_en'])) ? $_POST['seo_description_home_en'] : null;
				$seo_description_programs_es = (isset($_POST['seo_description_programs_es']) AND !empty($_POST['seo_description_programs_es'])) ? $_POST['seo_description_programs_es'] : null;
				$seo_description_programs_en = (isset($_POST['seo_description_programs_en']) AND !empty($_POST['seo_description_programs_en'])) ? $_POST['seo_description_programs_en'] : null;
				$seo_description_donations_es = (isset($_POST['seo_description_donations_es']) AND !empty($_POST['seo_description_donations_es'])) ? $_POST['seo_description_donations_es'] : null;
				$seo_description_donations_en = (isset($_POST['seo_description_donations_en']) AND !empty($_POST['seo_description_donations_en'])) ? $_POST['seo_description_donations_en'] : null;
				$seo_description_blog_es = (isset($_POST['seo_description_blog_es']) AND !empty($_POST['seo_description_blog_es'])) ? $_POST['seo_description_blog_es'] : null;
				$seo_description_blog_en = (isset($_POST['seo_description_blog_en']) AND !empty($_POST['seo_description_blog_en'])) ? $_POST['seo_description_blog_en'] : null;
				$seo_description_about_es = (isset($_POST['seo_description_about_es']) AND !empty($_POST['seo_description_about_es'])) ? $_POST['seo_description_about_es'] : null;
				$seo_description_about_en = (isset($_POST['seo_description_about_en']) AND !empty($_POST['seo_description_about_en'])) ? $_POST['seo_description_about_en'] : null;
				$seo_description_contact_es = (isset($_POST['seo_description_contact_es']) AND !empty($_POST['seo_description_contact_es'])) ? $_POST['seo_description_contact_es'] : null;
				$seo_description_contact_en = (isset($_POST['seo_description_contact_en']) AND !empty($_POST['seo_description_contact_en'])) ? $_POST['seo_description_contact_en'] : null;

				$errors = [];

				if (!isset($seo_title_home_es))
					array_push($errors, ['seo_title_home_es', 'No deje este campo vacío']);

				if (!isset($seo_title_home_en))
					array_push($errors, ['seo_title_home_en', 'No deje este campo vacío']);

				if (!isset($seo_title_programs_es))
					array_push($errors, ['seo_title_programs_es', 'No deje este campo vacío']);

				if (!isset($seo_title_programs_en))
					array_push($errors, ['seo_title_programs_en', 'No deje este campo vacío']);

				if (!isset($seo_title_donations_es))
					array_push($errors, ['seo_title_donations_es', 'No deje este campo vacío']);

				if (!isset($seo_title_donations_en))
					array_push($errors, ['seo_title_donations_en', 'No deje este campo vacío']);

				if (!isset($seo_title_blog_es))
					array_push($errors, ['seo_title_blog_es', 'No deje este campo vacío']);

				if (!isset($seo_title_blog_en))
					array_push($errors, ['seo_title_blog_en', 'No deje este campo vacío']);

				if (!isset($seo_title_about_es))
					array_push($errors, ['seo_title_about_es', 'No deje este campo vacío']);

				if (!isset($seo_title_about_en))
					array_push($errors, ['seo_title_about_en', 'No deje este campo vacío']);

				if (!isset($seo_title_contact_es))
					array_push($errors, ['seo_title_contact_es', 'No deje este campo vacío']);

				if (!isset($seo_title_contact_en))
					array_push($errors, ['seo_title_contact_en', 'No deje este campo vacío']);

				if (!isset($seo_title_slogan_es))
					array_push($errors, ['seo_title_slogan_es', 'No deje este campo vacío']);

				if (!isset($seo_title_slogan_en))
					array_push($errors, ['seo_title_slogan_en', 'No deje este campo vacío']);

				if (!isset($seo_keywords_home_es))
					array_push($errors, ['seo_keywords_home_es', 'No deje este campo vacío']);

				if (!isset($seo_keywords_home_en))
					array_push($errors, ['seo_keywords_home_en', 'No deje este campo vacío']);

				if (!isset($seo_keywords_programs_es))
					array_push($errors, ['seo_keywords_programs_es', 'No deje este campo vacío']);

				if (!isset($seo_keywords_programs_en))
					array_push($errors, ['seo_keywords_programs_en', 'No deje este campo vacío']);

				if (!isset($seo_keywords_donations_es))
					array_push($errors, ['seo_keywords_donations_es', 'No deje este campo vacío']);

				if (!isset($seo_keywords_donations_en))
					array_push($errors, ['seo_keywords_donations_en', 'No deje este campo vacío']);

				if (!isset($seo_keywords_blog_es))
					array_push($errors, ['seo_keywords_blog_es', 'No deje este campo vacío']);

				if (!isset($seo_keywords_blog_en))
					array_push($errors, ['seo_keywords_blog_en', 'No deje este campo vacío']);

				if (!isset($seo_keywords_about_es))
					array_push($errors, ['seo_keywords_about_es', 'No deje este campo vacío']);

				if (!isset($seo_keywords_about_en))
					array_push($errors, ['seo_keywords_about_en', 'No deje este campo vacío']);

				if (!isset($seo_keywords_contact_es))
					array_push($errors, ['seo_keywords_contact_es', 'No deje este campo vacío']);

				if (!isset($seo_keywords_contact_en))
					array_push($errors, ['seo_keywords_contact_en', 'No deje este campo vacío']);

				if (!isset($seo_description_home_es))
					array_push($errors, ['seo_description_home_es', 'No deje este campo vacío']);
				else if (strlen($seo_description_home_es) < 70)
					array_push($errors, ['seo_description_home_es', 'Ingrese mínimo 70 carácteres']);
				else if (strlen($seo_description_home_es) > 320)
					array_push($errors, ['seo_description_home_es', 'Ingrese máximo 320 carácteres']);

				if (!isset($seo_description_home_en))
					array_push($errors, ['seo_description_home_en', 'No deje este campo vacío']);
				else if (strlen($seo_description_home_en) < 70)
					array_push($errors, ['seo_description_home_en', 'Ingrese mínimo 70 carácteres']);
				else if (strlen($seo_description_home_en) > 320)
					array_push($errors, ['seo_description_home_en', 'Ingrese máximo 320 carácteres']);

				if (!isset($seo_description_programs_es))
					array_push($errors, ['seo_description_programs_es', 'No deje este campo vacío']);
				else if (strlen($seo_description_programs_es) < 70)
					array_push($errors, ['seo_description_programs_es', 'Ingrese mínimo 70 carácteres']);
				else if (strlen($seo_description_programs_es) > 320)
					array_push($errors, ['seo_description_programs_es', 'Ingrese máximo 320 carácteres']);

				if (!isset($seo_description_programs_en))
					array_push($errors, ['seo_description_programs_en', 'No deje este campo vacío']);
				else if (strlen($seo_description_programs_en) < 70)
					array_push($errors, ['seo_description_programs_en', 'Ingrese mínimo 70 carácteres']);
				else if (strlen($seo_description_programs_en) > 320)
					array_push($errors, ['seo_description_programs_en', 'Ingrese máximo 320 carácteres']);

				if (!isset($seo_description_donations_es))
					array_push($errors, ['seo_description_donations_es', 'No deje este campo vacío']);
				else if (strlen($seo_description_donations_es) < 70)
					array_push($errors, ['seo_description_donations_es', 'Ingrese mínimo 70 carácteres']);
				else if (strlen($seo_description_donations_es) > 320)
					array_push($errors, ['seo_description_donations_es', 'Ingrese máximo 320 carácteres']);

				if (!isset($seo_description_donations_en))
					array_push($errors, ['seo_description_donations_en', 'No deje este campo vacío']);
				else if (strlen($seo_description_donations_en) < 70)
					array_push($errors, ['seo_description_donations_en', 'Ingrese mínimo 70 carácteres']);
				else if (strlen($seo_description_donations_en) > 320)
					array_push($errors, ['seo_description_donations_en', 'Ingrese máximo 320 carácteres']);

				if (!isset($seo_description_blog_es))
					array_push($errors, ['seo_description_blog_es', 'No deje este campo vacío']);
				else if (strlen($seo_description_blog_es) < 70)
					array_push($errors, ['seo_description_blog_es', 'Ingrese mínimo 70 carácteres']);
				else if (strlen($seo_description_blog_es) > 320)
					array_push($errors, ['seo_description_blog_es', 'Ingrese máximo 320 carácteres']);

				if (!isset($seo_description_blog_en))
					array_push($errors, ['seo_description_blog_en', 'No deje este campo vacío']);
				else if (strlen($seo_description_blog_en) < 70)
					array_push($errors, ['seo_description_blog_en', 'Ingrese mínimo 70 carácteres']);
				else if (strlen($seo_description_blog_en) > 320)
					array_push($errors, ['seo_description_blog_en', 'Ingrese máximo 320 carácteres']);

				if (!isset($seo_description_about_es))
					array_push($errors, ['seo_description_about_es', 'No deje este campo vacío']);
				else if (strlen($seo_description_about_es) < 70)
					array_push($errors, ['seo_description_about_es', 'Ingrese mínimo 70 carácteres']);
				else if (strlen($seo_description_about_es) > 320)
					array_push($errors, ['seo_description_about_es', 'Ingrese máximo 320 carácteres']);

				if (!isset($seo_description_about_en))
					array_push($errors, ['seo_description_about_en', 'No deje este campo vacío']);
				else if (strlen($seo_description_about_en) < 70)
					array_push($errors, ['seo_description_about_en', 'Ingrese mínimo 70 carácteres']);
				else if (strlen($seo_description_about_en) > 320)
					array_push($errors, ['seo_description_about_en', 'Ingrese máximo 320 carácteres']);

				if (!isset($seo_description_contact_es))
					array_push($errors, ['seo_description_contact_es', 'No deje este campo vacío']);
				else if (strlen($seo_description_contact_es) < 70)
					array_push($errors, ['seo_description_contact_es', 'Ingrese mínimo 70 carácteres']);
				else if (strlen($seo_description_contact_es) > 320)
					array_push($errors, ['seo_description_contact_es', 'Ingrese máximo 320 carácteres']);

				if (!isset($seo_description_contact_en))
					array_push($errors, ['seo_description_contact_en', 'No deje este campo vacío']);
				else if (strlen($seo_description_contact_en) < 70)
					array_push($errors, ['seo_description_contact_en', 'Ingrese mínimo 70 carácteres']);
				else if (strlen($seo_description_contact_en) > 320)
					array_push($errors, ['seo_description_contact_en', 'Ingrese máximo 320 carácteres']);

				if (empty($errors))
				{
					$settings['seo'] = [
						'keywords' => [
							'home' => [
								'es' => $seo_keywords_home_es,
								'en' => $seo_keywords_home_en
							],
							'programs' => [
								'es' => $seo_keywords_programs_es,
								'en' => $seo_keywords_programs_en
							],
							'donations' => [
								'es' => $seo_keywords_donations_es,
								'en' => $seo_keywords_donations_en
							],
							'blog' => [
								'es' => $seo_keywords_blog_es,
								'en' => $seo_keywords_blog_en
							],
							'about' => [
								'es' => $seo_keywords_about_es,
								'en' => $seo_keywords_about_en
							],
							'contact' => [
								'es' => $seo_keywords_contact_es,
								'en' => $seo_keywords_contact_en
							]
						],
						'descriptions' => [
							'home' => [
								'es' => $seo_description_home_es,
								'en' => $seo_description_home_en
							],
							'programs' => [
								'es' => $seo_description_programs_es,
								'en' => $seo_description_programs_en
							],
							'donations' => [
								'es' => $seo_description_donations_es,
								'en' => $seo_description_donations_en
							],
							'blog' => [
								'es' => $seo_description_blog_es,
								'en' => $seo_description_blog_en
							],
							'about' => [
								'es' => $seo_description_about_es,
								'en' => $seo_description_about_en
							],
							'contact' => [
								'es' => $seo_description_contact_es,
								'en' => $seo_description_contact_en
							]
						],
						'titles' => [
							'home' => [
								'es' => $seo_title_home_es,
								'en' => $seo_title_home_en
							],
							'programs' => [
								'es' => $seo_title_programs_es,
								'en' => $seo_title_programs_en
							],
							'donations' => [
								'es' => $seo_title_donations_es,
								'en' => $seo_title_donations_en
							],
							'blog' => [
								'es' => $seo_title_blog_es,
								'en' => $seo_title_blog_en
							],
							'about' => [
								'es' => $seo_title_about_es,
								'en' => $seo_title_about_en
							],
							'contact' => [
								'es' => $seo_title_contact_es,
								'en' => $seo_title_contact_en
							],
							'slogan' => [
								'es' => $seo_title_slogan_es,
								'en' => $seo_title_slogan_en
							]
						]
					];

					$query = $this->model->edit_seo($settings['seo']);

					if (!empty($query))
					{
						echo json_encode([
							'status' => 'success',
							'message' => 'Operación realizada correctamente'
						]);
					}
					else
					{
						echo json_encode([
							'status' => 'error',
							'message' => 'DATABASE OPERATION ERROR'
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
		}
		else
		{
			define('_title', '{$lang.title}');

			$template = $this->view->render($this, 'index');

			$cover_home = '';

			foreach ($settings['covers']['home'] as $key => $value)
			{
				$cover_home .=
				'<figure data-preview>
	                <img src="{$path.uploads}' . $value . '">
	                <a data-action="delete_cover_home" data-id="' . $key . '"><i class="material-icons">delete</i></a>
	            </figure>';
			}

			$replace = [
				'{$logotype_color}' => '{$path.uploads}' . $settings['logotypes']['color'],
				'{$logotype_black}' => '{$path.uploads}' . $settings['logotypes']['black'],
				'{$logotype_white}' => '{$path.uploads}' . $settings['logotypes']['white'],
				'{$cover_home}' => $cover_home,
				'{$cover_programs}' => '{$path.uploads}' . $settings['covers']['programs'],
				'{$cover_donations}' => '{$path.uploads}' . $settings['covers']['donations'],
				'{$cover_blog}' => '{$path.uploads}' . $settings['covers']['blog'],
				'{$cover_about}' => '{$path.uploads}' . $settings['covers']['about'],
				'{$cover_contact}' => '{$path.uploads}' . $settings['covers']['contact'],
				'{$background_about_0}' => '{$path.uploads}' . $settings['backgrounds']['about'][0],
				'{$background_about_1}' => '{$path.uploads}' . $settings['backgrounds']['about'][1],
				'{$background_about_2}' => '{$path.uploads}' . $settings['backgrounds']['about'][2],
				'{$video_home}' => $settings['videos']['home'][0],
				'{$video_programs}' => $settings['videos']['programs'][0],
				'{$video_donations}' => $settings['videos']['donations'][0],
				'{$video_about_1}' => $settings['videos']['about'][0],
				'{$video_about_2}' => $settings['videos']['about'][1],
				'{$video_about_3}' => $settings['videos']['about'][2],
				'{$video_about_4}' => $settings['videos']['about'][3],
				'{$contact_email}' => $settings['contact']['email'],
				'{$contact_phone}' => $settings['contact']['phone'],
				'{$contact_address}' => $settings['contact']['address'],
				'{$contact_social_media_facebook}' => $settings['contact']['social_media']['facebook'],
				'{$contact_social_media_instagram}' => $settings['contact']['social_media']['instagram'],
				'{$contact_social_media_twitter}' => $settings['contact']['social_media']['twitter'],
				'{$about_description_es}' => $settings['about']['description']['es'],
				'{$about_description_en}' => $settings['about']['description']['en'],
				'{$about_mission_es}' => $settings['about']['mission']['es'],
				'{$about_mission_en}' => $settings['about']['mission']['en'],
				'{$about_vission_es}' => $settings['about']['vission']['es'],
				'{$about_vission_en}' => $settings['about']['vission']['en'],
				'{$about_values_es}' => $settings['about']['values']['es'],
				'{$about_values_en}' => $settings['about']['values']['en'],
				'{$about_history_es}' => $settings['about']['history']['es'],
				'{$about_history_en}' => $settings['about']['history']['en'],
				'{$about_organ_government_es}' => $settings['about']['organ_government']['es'],
				'{$about_organ_government_en}' => $settings['about']['organ_government']['en'],
				'{$notice_privacy_es}' => $settings['notices']['privacy']['es'],
				'{$notice_privacy_en}' => $settings['notices']['privacy']['en'],
				'{$notice_transparency_es}' => $settings['notices']['transparency']['es'],
				'{$notice_transparency_en}' => $settings['notices']['transparency']['en'],
				'{$seo_title_home_es}' => $settings['seo']['titles']['home']['es'],
				'{$seo_title_home_en}' => $settings['seo']['titles']['home']['en'],
				'{$seo_title_programs_es}' => $settings['seo']['titles']['programs']['es'],
				'{$seo_title_programs_en}' => $settings['seo']['titles']['programs']['en'],
				'{$seo_title_donations_es}' => $settings['seo']['titles']['donations']['es'],
				'{$seo_title_donations_en}' => $settings['seo']['titles']['donations']['en'],
				'{$seo_title_blog_es}' => $settings['seo']['titles']['blog']['es'],
				'{$seo_title_blog_en}' => $settings['seo']['titles']['blog']['en'],
				'{$seo_title_about_es}' => $settings['seo']['titles']['about']['es'],
				'{$seo_title_about_en}' => $settings['seo']['titles']['about']['en'],
				'{$seo_title_contact_es}' => $settings['seo']['titles']['contact']['es'],
				'{$seo_title_contact_en}' => $settings['seo']['titles']['contact']['en'],
				'{$seo_title_slogan_es}' => $settings['seo']['titles']['slogan']['es'],
				'{$seo_title_slogan_en}' => $settings['seo']['titles']['slogan']['en'],
				'{$seo_keywords_home_es}' => $settings['seo']['keywords']['home']['es'],
				'{$seo_keywords_home_en}' => $settings['seo']['keywords']['home']['en'],
				'{$seo_keywords_programs_es}' => $settings['seo']['keywords']['programs']['es'],
				'{$seo_keywords_programs_en}' => $settings['seo']['keywords']['programs']['en'],
				'{$seo_keywords_donations_es}' => $settings['seo']['keywords']['donations']['es'],
				'{$seo_keywords_donations_en}' => $settings['seo']['keywords']['donations']['en'],
				'{$seo_keywords_blog_es}' => $settings['seo']['keywords']['blog']['es'],
				'{$seo_keywords_blog_en}' => $settings['seo']['keywords']['blog']['en'],
				'{$seo_keywords_about_es}' => $settings['seo']['keywords']['about']['es'],
				'{$seo_keywords_about_en}' => $settings['seo']['keywords']['about']['en'],
				'{$seo_keywords_contact_es}' => $settings['seo']['keywords']['contact']['es'],
				'{$seo_keywords_contact_en}' => $settings['seo']['keywords']['contact']['en'],
				'{$seo_description_home_es}' => $settings['seo']['descriptions']['home']['es'],
				'{$seo_description_home_en}' => $settings['seo']['descriptions']['home']['en'],
				'{$seo_description_programs_es}' => $settings['seo']['descriptions']['programs']['es'],
				'{$seo_description_programs_en}' => $settings['seo']['descriptions']['programs']['en'],
				'{$seo_description_donations_es}' => $settings['seo']['descriptions']['donations']['es'],
				'{$seo_description_donations_en}' => $settings['seo']['descriptions']['donations']['en'],
				'{$seo_description_blog_es}' => $settings['seo']['descriptions']['blog']['es'],
				'{$seo_description_blog_en}' => $settings['seo']['descriptions']['blog']['en'],
				'{$seo_description_about_es}' => $settings['seo']['descriptions']['about']['es'],
				'{$seo_description_about_en}' => $settings['seo']['descriptions']['about']['en'],
				'{$seo_description_contact_es}' => $settings['seo']['descriptions']['contact']['es'],
				'{$seo_description_contact_en}' => $settings['seo']['descriptions']['contact']['en']
			];

			$template = $this->format->replace($replace, $template);

			echo $template;
		}
	}
}
