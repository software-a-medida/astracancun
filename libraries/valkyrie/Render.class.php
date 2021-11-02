<?php
defined('_EXEC') or die;

class Render
{
    private $format;
    private $database;

    public function __construct()
	{
        $this->format = new Format();
        $this->database = new Medoo();
	}

    public function placeholders($string)
    {
        $settings = $this->database->select('settings', ['contact'])[0];

        $contact = json_decode($settings['contact'], true);

        $replace = [
            '{$vkye_lang}'       => Session::getValue('lang'),
            '{$vkye_title}'      => Language::getLang(_title, 'Titles'),
            '{$vkye_webpage}'    => Configuration::$webPage,
            '{$vkye_domain}'     => Security::protocol() . Configuration::$domain,
            '{$vkye_base}'       => $this->format->baseurl(),
            '{$vkye_phone}'      => $contact['phone']
        ];

        return $this->replace($replace, $string);
    }

    public function paths($string)
    {
        $ini = parse_ini_file($this->format->checkAdmin(PATH_ADMINISTRATOR_INCLUDES, PATH_INCLUDES) . 'paths.ini');

        foreach ($ini as $key => $value)
            $string = str_replace('{$path.' . $key . '}', $value, $string);

        return $string;
    }

    public function replace($arr, $string)
	{
		return $this->format->replace($arr, $string);
	}
}
