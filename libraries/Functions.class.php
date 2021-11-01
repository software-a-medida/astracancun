<?php

defined('_EXEC') or die;

/**
* @package valkyrie.libraries
*
* @author Gersón Aarón Gómez Macías <Chief Technology Officer, ggomez@codemonkey.com.mx>
* @since December 03 - 30, 2018 <1.0.1> <@create>
* @version 1.0.1
* @summary cm-valkyrie-platform-website-template
*
* @copyright Copyright (C) Code Monkey S de RL <contact@codemonkey.com.mx, wwww.codemonkey.com.mx>. Todos los derechos reservados.
*/

class Functions
{
    public static function get_date()
	{
        date_default_timezone_set(Configuration::$time_zone);
		return date('Y-m-d');
	}

    public static function get_hour()
	{
        date_default_timezone_set(Configuration::$time_zone);
		return date('h:i:s', time());
	}

    public static function get_date_hour()
	{
        date_default_timezone_set(Configuration::$time_zone);
		return date('Y-m-d h:i:s', time());
	}

    public static function get_shortened_text($text, $length)
	{
		return (strlen(strip_tags($text)) > $length) ? substr(strip_tags($text), 0, $length) . '...' : substr(strip_tags($text), 0, $length);
    }

    public static function get_currency_exchange_conversion()
    {
        // $database = new Medoo;
        //
        // $currency_exchange = $database->select('settings', ['currency_exchange']);
        // $currency_exchange = json_decode($currency_exchange[0]['currency_exchange'], true);
        //
        // $total = $amount * $currency_exchange[$to];
        //
        // return $total;
    }

    public static function get_decoded_query($query)
    {
        foreach ($query as $key => $value)
        {
            if (is_array($query[$key]))
            {
                foreach ($query[$key] as $subkey => $subvalue)
                    $query[$key][$subkey] = (is_array(json_decode($query[$key][$subkey], true)) AND (json_last_error() == JSON_ERROR_NONE)) ? json_decode($query[$key][$subkey], true) : $query[$key][$subkey];
            }
            else
                $query[$key] = (is_array(json_decode($query[$key], true)) AND (json_last_error() == JSON_ERROR_NONE)) ? json_decode($query[$key], true) : $query[$key];
        }

        return $query;
    }

    public static function check_access($users_levels)
    {
        $access = false;

		foreach ($users_levels as $value)
		{
			if (Session::get_value('_vkye_level') == $value)
				$access = true;
		}

        return $access;
    }

    public static function check_email($email)
    {
        return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false;
    }

    public static function uploader($file, $upload_directory, $valid_extensions, $maximum_file_size)
	{
        if (is_array($file))
        {
            $components = new Components;

            $components->load_component('uploader');

            $uploader = new Uploader;

            $uploader->set_file_name($file['name']);
            $uploader->set_file_temporal_name($file['tmp_name']);
            $uploader->set_file_type($file['type']);
            $uploader->set_file_size($file['size']);
            $uploader->set_upload_directory($upload_directory);
            $uploader->set_valid_extensions($valid_extensions);
            $uploader->set_maximum_file_size($maximum_file_size);

            $file = $uploader->upload_file();

            if ($file['status'] == 'success')
                $file = $file['file'];
            else
                $file = null;
        }
        else
        {
            $security = new Security();

            $src = str_replace(' ', '+', $file);

            list($a, $src) = explode(';', $src);
    		list($a, $src) = explode(',', $src);
    		$src = base64_decode($src);
    		$name = $security->random_string(16) . '.' . $valid_extensions[0];
    		$file = $upload_directory . $name;
    		$success = file_put_contents($file, $src);

            if (!empty($name))
                $file = $name;
            else
                $file = null;
        }

		return $file;
	}

    public static function undoloader($file, $upload_directory)
    {
        if (!empty($file))
        {
            if (is_array($file))
            {
                foreach ($file as $value)
                    unlink($upload_directory . $value);
            }
            else
                unlink($upload_directory . $file);
        }
    }
}
