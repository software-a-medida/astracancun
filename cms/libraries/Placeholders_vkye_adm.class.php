<?php

defined('_EXEC') or die;

/**
* @package valkyrie.cms.core.libraries
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
* @copyright Copyright (C) Code Monkey S de RL <contact@codemonkey.com.mx, wwww.codemonkey.com.mx>. Todos los derechos reservados.
*/

class Placeholders_vkye_adm
{
    private $buffer;
    private $format;
    private $database;

    public function __construct($buffer)
    {
        $this->buffer = $buffer;
        $this->format = new Format();
        $this->database = new Medoo();
    }

    public function run()
    {
        $this->buffer = $this->main_header();
        $this->buffer = $this->placeholders();

        return $this->buffer;
    }

    private function main_header()
    {
        return $this->format->include_file($this->buffer, 'header');
    }

    private function placeholders()
    {
        $settings = Functions::get_decoded_query($this->database->select('settings', ['logotypes'])[0]);

        $replace = [
            '{$_vkye_logotype}' => $settings['logotypes']['color'],
            '{$_vkye_logotype_black}' => $settings['logotypes']['black'],
            '{$_vkye_logotype_white}' => $settings['logotypes']['white']
        ];

        return $this->format->replace($replace, $this->buffer);
    }
}
