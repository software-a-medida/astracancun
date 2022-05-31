<?php

namespace BuriPHP\Administrator\Libraries;

/**
 *
 * @package BuriPHP.Libraries
 *
 * @since 1.0.0
 * @version 1.1.0
 * @license You can see LICENSE.txt
 *
 * @author David Miguel Gómez Macías < davidgomezmacias@gmail.com >
 * @copyright Copyright (C) CodeMonkey - Platform. All Rights Reserved.
 */

defined('_EXEC') or die;

use \BuriPHP\System\Libraries\{Format, Errors, Security};

class Routes
{
    private $settings_url;

    public function __construct($path, $settings_url, $component = null)
    {
        $this->path = $path;
        $this->settings_url = $settings_url;
        $this->component = $component;
    }

    public function on_change_start()
    {
        $this->getRequest();
        $this->petition();
    }

    public function on_change_end()
    {
        // TODO
    }

    /**
     * Reune la data enviada en un request.
     */
    private function getRequest(): void
    {
        if (!empty(file_get_contents("php://input"))) {
            $_ = json_decode(file_get_contents("php://input"), true);

            if (json_last_error() != JSON_ERROR_NONE)
                parse_str(file_get_contents("php://input"), $_);

            $_REQUEST = array_merge($_REQUEST, $_);
            unset($_);
        }

        if (isset($_FILES) && !empty($_FILES)) {
            $_REQUEST = array_merge($_REQUEST, $_FILES);
        }
    }

    /**
     * Procesa lo necesario para el uso de la API
     */
    private function petition(): void
    {
        if (isset($this->settings_url['petition'])) {
            switch ($this->settings_url['petition']) {
                case 'http':
                    Format::no_ajax();
                    break;

                case 'ajax':
                    header('Content-type: application/json');
                    if (Format::exist_ajax_request() == false) die();
                    break;
            }
        }
    }
}